<?php
echo $this->Html->css('bootstrap.min');

$bill = $currentBill["Bill"];
$statusBill = $currentBill["StatusBill"];
$table = $currentBill["Table"];

//pr($currentBill);
?>

<h3 class="text-center">Recibo</h3>
<h4 class="text-left">Data: <?php echo date('d/m/Y'); ?></h4>

<div class="table-responsive">
    <table class="table">
        <tr class="warning">
            <td>Mesa:</td>
            <td><?php echo h($table['name']); ?></td>
        </tr>
        <tr class="warning">
            <td>Total</td>
            <td>R$ 123,45</td>
        </tr>
    </table>
</div>

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <tr class="">
                <td>Código</td>
                <td>Valor (R$)</td>
                <td>Pedido</td>
            </tr>
            <tr class="">
                <td>999999</td>
                <td>R$ 12,34</td>
                <td>askdfj laskdflkasjdf lkasjdfl kasdlfk asdlkf</td>
            </tr>




            <?php
            /* PENDING ORDERS */
            $arrBill = [];
            foreach ($pendingOrders as $order) {
                if ($order['Order']['stage_id'] == 5) {
                    continue;
                }

                $quantity = $order['Order']['quantity'];
                $product = $order['Products']['name'];
                $productValue = $order['Products']['sell_price'] * $order['Order']['quantity'];

                $hidden = '<input type="hidden" name="order[]" value="' . $order['Order']['id'] . '" />';

                if (isset($arrBill[$product])) {
                    $arrBill[$product]['quantity'] += $quantity;
                    $arrBill[$product]['value'] += $productValue;
                    $arrBill[$product]['hidden'] = $arrBill[$product]['hidden'] . " " . $hidden;
                } else {
                    $arrBill[$product]['quantity'] = $quantity;
                    $arrBill[$product]['value'] = $productValue;
                    $arrBill[$product]['hidden'] = $hidden;
                }
            }

            $total = 0;
            foreach ($arrBill as $product => $arrProduct) {
                $quantity = $this->MyFormat->format_show($arrProduct['quantity']);
                $productValue = $arrProduct['value'];

                $value = $this->MyFormat->format_show($productValue, 2);
                $total += $productValue;
                ?>

                <li class="list-group-item">
                    <?php echo $quantity . ' - ' . $product; ?>
                    <span class="pull-right">
                        <?php echo $value; ?>
                        <?php echo $arrProduct['hidden']; ?>
                    </span>
                </li>
                <?php
            }
            ?>
            <?php
            /* COMPLETED ORDERS */
            $arrBill = [];
            foreach ($completedOrders as $order) {
                if ($order['Order']['stage_id'] == 5) {
                    continue;
                }

                $quantity = $order['Order']['quantity'];
                $product = $order['Products']['name'];
                $productValue = $order['Products']['sell_price'] * $order['Order']['quantity'];

                $hidden = '<input type="hidden" name="order[]" value="' . $order['Order']['id'] . '" />';

                if (isset($arrBill[$product])) {
                    $arrBill[$product]['quantity'] += $quantity;
                    $arrBill[$product]['value'] += $productValue;
                    $arrBill[$product]['hidden'] = $arrBill[$product]['hidden'] . " " . $hidden;
                } else {
                    $arrBill[$product]['quantity'] = $quantity;
                    $arrBill[$product]['value'] = $productValue;
                    $arrBill[$product]['hidden'] = $hidden;
                }
            }

            $total = 0;
            foreach ($arrBill as $product => $arrProduct) {
                $quantity = $this->MyFormat->format_show($arrProduct['quantity']);
                $productValue = $arrProduct['value'];

                $value = $this->MyFormat->format_show($productValue, 2);
                $total += $productValue;
                ?>
                <s>
                    <li class="list-group-item">
                        <?php echo $quantity . ' - ' . $product; ?>
                        <span class="pull-right">
                            <?php echo $value; ?>
                            <?php echo $arrProduct['hidden']; ?>
                        </span>
                    </li>
                </s>
                <?php
            }
            ?>
            <?php
            foreach ($payments as $payment) {

                //hide payments from items
                if ($payment['Payment']['subtotal'] > 0) {
                    continue;
                }

                $total -= $payment['Payment']['payd_value'];
                ?>
                <div class="col-xs-12 text-right">
                    -<?php echo $this->MyFormat->format_show($payment['Payment']['payd_value'], 2); ?>
                </div>
                <?php
            }
            ?>


        </table>
    </div>
</div>

<div class="col-xs-12 text-right">
    <strong>
        TOTAL: <?php echo $this->MyFormat->format_show($total, 2); ?>
    </strong>
</div>