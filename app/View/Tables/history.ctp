<?php
//pr($items);
?>
<div class="row">

    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '&nbsp;<span class="fa fa-plus"></span>&nbsp' . __('Add Order') . '&nbsp;', ['controller' => 'orders', 'action' => 'order_wizard', $table['Table']['id']], ['class' => 'btn btn-primary btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '<span class="fa fa-arrow-left"></span>&nbsp' . __('Back'), ['controller' => 'tables', 'action' => 'table_details', $table['Table']['id']], ['class' => 'btn btn-yellow btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <?php
            if (!isset($items) || !$items) {
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
                        <th class="text-center"><?php echo __("Quantity") ?></th>
                        <th class="text-center"><?php echo __("Product") ?></th>
                        <th class="text-center"><?php echo __("Stage") ?></th>
                        <th class="text-center"><?php echo __("Attendant") ?></th>
                        <th class="text-center"><?php echo __("Status") ?></th>
                        <th class="text-center"><?php echo __("Value") ?></th>
                        <th class="text-center"><?php echo __("Created") ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $afterBill = null;
                    foreach ($items as $item) {
                        $itemBill = $item[0];
                        $isOrder   = $itemBill['origin'] == 'order';
                        $isPayment = $itemBill['origin'] == 'payment';

                        $qtdOrders = @array_sum($itemBill['qtd_orders']);
                        $qtdPayments = @array_sum($itemBill['qtd_payments']);

                        ?>
                        <tr>
                            <?php
                            if ($afterBill != $itemBill['bill']) {
                                ?>
                                <td class="text-right" rowspan="<?= $qtdOrders + $qtdPayments ?>" style="vertical-align: middle"><?php echo h($itemBill['bill']); ?></td>
                                <?php
                            }
                            ?>

                            <?php
                            if ($isPayment) {
                                $colspan = 'colspan="5"';
                                $itemBill['value'] = $itemBill['value'] * (-1);
                                ?>
                                <td class="text-right" <?=$colspan?>><?php echo __('Payment'); ?></td>
                                <?php
                            } else {
                                ?>
                                <td class="text-right"><?php echo h($this->MyFormat->format_show($itemBill['quantity'])); ?></td>
                                <td class="text-right"><?php echo h($itemBill['product']); ?></td>
                                <td class="text-center"><?php echo h($itemBill['stage']); ?></td>
                                <td class="text-center"><?php echo h($itemBill['attendant']); ?></td>
                                <td class="text-center"><?php echo h($itemBill['status_order']); ?></td>
                                <?php
                            }
                            ?>
                            <td class="text-right"><?php echo h($this->MyFormat->format_show($itemBill['value'], 2)); ?></td>
                            <td class="text-center"><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($itemBill['created']))); ?></td>
                        </tr>
                        <?php
                        $afterBill = $itemBill['bill'];
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>