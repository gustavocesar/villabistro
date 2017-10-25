<table class="table">
    <caption>
        <a href="#" class="btn" onclick="javascript:window.top.close();" title="Fechar Esta Aba">
            <span class="fa fa-times"></span>
        </a>
        <?php echo __("Received Payments"); ?>
        <a href="#" class="btn" onclick="javascript:printPage();" title="Imprimir">
            <span class="fa fa-print"></span>
        </a>
    </caption>
    <tr>
        <td class="text-right no-border">
            <strong>Início:</strong>
        </td>
        <td class="text-left no-border">
            <strong><?php echo $startDate;?></strong>
        </td>
    </tr>
    <tr>
        <td class="text-right no-border">
            <strong>Fim:</strong>
        </td>
        <td class="text-left no-border">
            <strong><?php echo $finishDate;?></strong>
        </td>
    </tr>
</table>

<table class="table">
    <thead>
        <tr>
            <th><?php echo __("Payment Method");?></th>
            <th class="text-right"><?php echo __("Total");?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;

        foreach ($payments as $payment) {
            $paymentMethod = $payment['PaymentMethod']['name'];
            $sum = $payment[0];
            
            $total += $sum['Total'];
            ?>
            <tr>
                <td><?php echo h($paymentMethod);?></td>
                <td class="text-right"><?php echo h($this->MyFormat->format_show($sum['Total'], 2));?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td class="text-center"><strong><?php echo h("Total Geral");?></strong></td>
            <td class="text-right"><?php echo h($this->MyFormat->format_show($total, 2));?></td>
        </tr>
    </tbody>
</table>
