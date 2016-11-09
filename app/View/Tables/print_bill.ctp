<?php
echo $this->Html->css('bootstrap.min');

$bill = $currentBill["Bill"];
$statusBill = $currentBill["StatusBill"];
$table = $currentBill["Table"];
?>

<div class="container">
    <h3 class="text-center">Recibo</h3>
    <h4 class="text-left">Mesa: <?php echo h($table['name']); ?></h4>
    <h4 class="text-left">Data: <?php echo date('d/m/Y'); ?></h4>

    <div class="table-responsive">
        <table class="table">
            <tr class="">
                <td class="text-center"><strong>Código</strong></td>
                <td class="text-right"><strong>Valor (R$)</strong></td>
                <td>&nbsp;</td>
                <td><strong>Pedido</strong></td>
            </tr>
            <?php
            $total = 0;

            /* PENDING ORDERS */
            foreach ($pendingOrders as $order) {
                if ($order['Order']['stage_id'] == 5) {
                    continue;
                }

                $productCode = $order['Products']['id'];
                $productName = $order['Products']['name'];
                $productValue = $order['Products']['sell_price'];

                $total += $productValue;
                ?>
                <tr>
                    <td class="text-center"><?= $productCode; ?></td>
                    <td class="text-right"><?php echo h($this->MyFormat->format_show($productValue)); ?></td>
                    <td>&nbsp;</td>
                    <td><?= $productName; ?></td>
                </tr>
                <?php
            }

            /* COMPLETED ORDERS */
            foreach ($completedOrders as $order) {
                if ($order['Order']['stage_id'] == 5) {
                    continue;
                }

                $productCode = $order['Products']['id'];
                $productName = $order['Products']['name'];
                $productValue = $order['Products']['sell_price'];
                ?>
                <tr>
                    <td class="text-center"><del><?= $productCode; ?></del></td>
                    <td class="text-right"><del><?php echo h($this->MyFormat->format_show($productValue)); ?></del></td>
                    <td>&nbsp;</td>
                    <td><del><?= $productName; ?></del></td>
                </tr>
                <?php
            }

            /* PAYMENTS */
            foreach ($payments as $payment) {

                if ($payment['Payment']['subtotal'] > 0.00) {
                    //payment of a item (pagamento de item)
                    $paymentValue = $payment['Payment']['subtotal'];
                } else {
                    //payment of a value (abatimento da conta)
                    $paymentValue = $payment['Payment']['payd_value'];
                }

                $total -= $paymentValue;
                ?>
                <div class="col-xs-12 text-right">
                    -<?php echo $this->MyFormat->format_show($paymentValue, 2); ?>
                </div>
                <?php
            }
            ?>

            <tr class="warning">
                <td class="text-right"><strong>TOTAL</strong></td>
                <td class="text-right"><strong><?php echo h($this->MyFormat->format_show($total, 3)); ?></strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

        </table>
    </div>
</div>