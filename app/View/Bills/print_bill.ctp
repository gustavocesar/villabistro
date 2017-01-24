<?php
echo $this->Html->css('bootstrap.min');

$statusBill = $bill["StatusBill"];
$table = $bill["Table"];
?>

<table class="table">
    <tr>
        <td class="text-left no-border">
            <strong>Mesa: <?php echo h($table['name']); ?></strong>
        </td>
        <td class="text-center no-border">
            <a href="#" class="btn" onclick="javascript:window.top.close();" title="Fechar Esta Aba">
                <span class="fa fa-times"></span>
            </a>
            <strong><u>RECIBO</u></strong>
            <a href="#" class="btn" onclick="javascript:printPage();" title="Imprimir">
                <span class="fa fa-print"></span>
            </a>
        </td>
        <td class="text-right no-border">
            <strong>Comanda: <?php echo h($bill['Bill']['id']); ?></strong>
        </td>
    </tr>
    <tr>
        <td class="text-left no-border">
            <strong>Data: <?php echo date('d/m/Y'); ?></strong>
        </td>
        <td class="text-center no-border">
            <strong>&nbsp;</strong>
        </td>
        <td class="text-right no-border">
            <strong>Situação: <?php echo h($statusBill['name']); ?></strong>
        </td>
    </tr>
</table>

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

        $total += $productValue;
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
    $totalPayments = 0;
    foreach ($payments as $payment) {

        if ($payment['Payment']['subtotal'] > 0.00) {
            //payment of a item (pagamento de item)
            $paymentValue = $payment['Payment']['subtotal'];
        } else {
            //payment of a value (abatimento da conta)
            $paymentValue = $payment['Payment']['payd_value'];
        }

        $totalPayments += $paymentValue;
        ?>
        <div class="col-xs-12 text-right">
            -<?php echo $this->MyFormat->format_show($paymentValue, 2); ?>
        </div>
        <?php
    }
    ?>

    <tr>
        <td class="text-right"><strong>TOTAL</strong></td>
        <td class="text-right"><strong><?php echo h($this->MyFormat->format_show($total, 3)); ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td class="text-right"><strong>VALOR PAGO</strong></td>
        <td class="text-right"><strong><?php echo h($this->MyFormat->format_show($totalPayments * (-1), 3)); ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <tr class="warning">
        <td class="text-right"><strong>A PAGAR</strong></td>
        <?php
        $subtotal = $total - $totalPayments;
        if ($statusBill['finish'] == 'Sim') {
            $subtotal = 0;
        }
        ?>
        <td class="text-right"><strong><?php echo h($this->MyFormat->format_show($subtotal, 3)); ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

</table>