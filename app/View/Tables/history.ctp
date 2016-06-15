<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <?php
        if (!isset($bills) || !$bills) {
            ?>
            <tr>
                <td colspan="9" class="text-center">
                    <h5>Nenhum Registro Encontrado</h5>
                </td>
            </tr>
            <?php
        } else {
            ?>
            <thead>
                <tr>
                    <th class="text-center"><?php echo __("Bill") ?></th>
                    <th class="text-center"><?php echo __("Product") ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($bills as $_bill) {
                    $bill = $_bill['Bill'];
                    $statusBill = $_bill['StatusBill'];
                    $orders = $_bill['Order'];
                    $payments = $_bill['Payment'];

                    $allItems = array_merge($orders, $payments);
                    $sortArray = [];
                    foreach ($allItems as $key => $row) {
                        $sortArray[$key] = $row['created'];
                    }
                    array_multisort($sortArray, SORT_DESC, $allItems);

                    foreach ($allItems as $item) {
                        ?>
                        <tr>
                            <?php
                            if (isset($item['payd_value'])) { //payment
                                ?>
                                <td class="text-right"><?php echo h($bill['id']); ?></td>
                                <td class="text-right" colspan=""><?php echo h($item['payd_value']); ?></td>
                                <?php
                            } else { //order
                                ?>
                                <td class="text-right"><?php echo h($bill['id']); ?></td>
                                <td class="text-right"><?php echo h($item['product_id']); ?></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>