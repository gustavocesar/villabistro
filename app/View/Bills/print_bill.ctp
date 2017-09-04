<?php
echo $this->Html->css('bootstrap.min');

$statusBill = $bill["StatusBill"];
$table = $bill["Table"];
?>

<table class="table print-bill-table">
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

<table class="table print-bill-table">
    <tr class="">
        <td class="text-left"><strong>Produto</strong></td>
        <td class="text-right"><strong>Qtd</strong></td>
        <td class="text-right"><strong>Valor Unitário</strong></td>
        <td class="text-right"><strong>Total</strong></td>
    </tr>
    <?php
    $total = 0;

    /* PENDING ORDERS */
    foreach ($pendingOrderProducts as $productId => $arrProduct) {
        $product = $arrProduct['Products'];
        $quantity = $arrProduct['quantity'];

        $productCode = $product['id'];
        $productFormatedCode =  str_pad($productCode, 4, '0', STR_PAD_LEFT);
        $productName = $product['name'];
        $productValue = $product['sell_price'];
        $productTotal = $productValue * $quantity;

        $total += $productTotal;
        ?>
        <tr>
            <td class="text-left"><?= $productFormatedCode." - ". $productName; ?></td>
            <td class="text-right"><?= str_pad($quantity, 2, '0', STR_PAD_LEFT); ?></td>
            <td class="text-right"><?php echo h($this->MyFormat->format_show($productValue, 2)); ?></td>
            <td class="text-right"><?php echo h($this->MyFormat->format_show($productTotal, 2)); ?></td>
        </tr>
        <?php
    }

    /* COMPLETED ORDERS */
    foreach ($completedOrderProducts as $productId => $arrProduct) {
        $product = $arrProduct['Products'];
        $quantity = $arrProduct['quantity'];

        $productCode = $product['id'];
        $productFormatedCode =  str_pad($productCode, 4, '0', STR_PAD_LEFT);
        $productName = $product['name'];
        $productValue = $product['sell_price'];
        $productTotal = $productValue * $quantity;

        $total += $productTotal;
        ?>
        <tr>
            <td class="text-left"><del><?= $productFormatedCode." - ". $productName; ?></del></td>
            <td class="text-right"><del><?= str_pad($quantity, 2, '0', STR_PAD_LEFT); ?></del></td>
            <td class="text-right"><del><?php echo h($this->MyFormat->format_show($productValue, 2)); ?></del></td>
            <td class="text-right"><del><?php echo h($this->MyFormat->format_show($productTotal, 2)); ?></del></td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="text-right"><strong>TOTAL</strong></td>
        <td class="text-right"><strong><?php echo h($this->MyFormat->format_show($total, 2)); ?></strong></td>
    </tr>

    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="text-right"><strong>VALOR PAGO</strong></td>
        <td class="text-right"><strong><?php echo h($this->MyFormat->format_show($totalPayments * (-1), 2)); ?></strong></td>
    </tr>

    <tr class="warning">
        <?php
        $subtotal = $total - $totalPayments;
        if ($statusBill['finish'] == 'Sim') {
            $subtotal = 0;
        }
        ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="text-right"><strong>A PAGAR</strong></td>
        <td class="text-right"><strong><?php echo h($this->MyFormat->format_show($subtotal, 2)); ?></strong></td>
    </tr>

</table>