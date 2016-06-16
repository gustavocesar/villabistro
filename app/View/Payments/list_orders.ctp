<?php
echo $this->Html->script('/checked-list-group/list-group');
?>

<input type="hidden" id="table" name="table" value="<?= $table['Table']['id'] ?>" />

<div class="row">
    <div class="col-xs-12">
        <ul id="check-list-box" class="list-group checked-list-box">
            <a class="btn btn-default" href="javascript:;" id="mark-all">
                <span class="fa fa-check-square-o"></span>&nbsp;Inverter Seleção
            </a>

            <div class="col-sm-2 pull-right">
                <p>
                    <?php
                    echo $this->Html->link(
                            '<span class="fa fa-arrow-left"></span>&nbsp' . __('Back'), ['controller' => 'tables', 'action' => 'table_details', $table['Table']['id']], ['class' => 'btn btn-yellow pull-right', 'escape' => false]
                    )
                    ?>
                </p>
            </div>

            <div class="clearfix"></div>
            <br />
            <?php
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

            <div class="col-xs-12 text-right">
                <strong>
                    TOTAL: <?php echo $this->MyFormat->format_show($total, 2); ?>
                </strong>
            </div>
        </ul>
        <div class="clearfix"></div>
        <br />
        <?php
        echo $this->Html->link(
                '<span class="fa fa-usd"></span>&nbsp' . __('Pay'), '', [
            'id' => 'btnPay',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'class' => 'btn btn-success btn-lg btn-block',
            'escape' => false
                ]
        );
        ?>
    </div>
</div>

<?= $this->Html->script('models/payments'); ?>

<script type="text/javascript">
    $("#btnPay").click(function () {
        var orders = '';
        $("#check-list-box li.active input[name*='order']").each(function () {
            orders += $(this).val() + ';';
        });
        var link = '<?php echo $this->Html->url(['controller' => 'payments', 'action' => 'add', $table['Table']['id']]); ?>/' + orders;
        $(this).attr('href', link);
    });
</script>