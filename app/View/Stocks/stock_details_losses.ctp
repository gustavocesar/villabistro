<?php
$locationId = $location['Location']['id'];
$productId = $product['Product']['id'];

$arrResult = $this->requestAction(
        ['controller' => 'stocks', 'action' => 'getStockQuantityByProduct', $productId, $locationId], ['return']
);

if (isset($arrResult['0']['0']['TotalQuantity'])) {
    $currentQuantity = $arrResult['0']['0']['TotalQuantity'];
} else {
    $currentQuantity = "0";
}
?>

<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '<span class="fa fa-arrow-left"></span>&nbsp' . __('Back'), ['action' => 'stock_control'], ['class' => 'btn btn-yellow btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;'; ?>
                <?php echo $location['Location']['name']; ?>
                &nbsp;
                <i class="fa fa-chevron-right"></i>
                &nbsp;
                <?php echo $product['Product']['name']; ?>
                &nbsp;
                (<?php echo $unit['Unit']['initials']; ?>)
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __("Date"); ?></th>
                                <th><?php echo __("Time"); ?></th>
                                <th><?php echo __("Referency"); ?></th>
                                <th class="text-right"><?php echo __("Moved Quantity"); ?></th>
                                <th class="text-right"><?php echo __("Balance"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--
                            <tr>
                                <td colspan="3" class="text-right">
                                    <strong>
                            <?php // echo __("Current Balance");?>
                                    </strong>
                                </td>
                                <td class="text-right">
                                    <strong>
                            <?php // echo h($this->MyFormat->format_show($currentQuantity));?>
                                    </strong>
                                </td>
                            </tr>
                            -->
                            <?php
                            $i = 0;
                            foreach ($stocks as $stock):
                                ?>
                                <tr>
                                    <?php
//                                    pr($stock);
                                    ?>
                                    <td><?php echo h(date('d/m/Y', strtotime($stock['Stock']['finished']))); ?></td>
                                    <td><?php echo h(date('H:i:s', strtotime($stock['Stock']['finished']))); ?></td>
                                    <td><?php echo h($stock['Stock']['reference']); ?></td>

                                    <td class="text-right">
                                        <?php echo h($this->MyFormat->format_show($stock['Stock']['quantity'])); ?>
                                    </td>

                                    <td class="text-right">
                                        <?php
                                        if (isset($stocks[$i-1]['Stock']['quantity'])) {
                                            $prevQuantity = $stocks[$i-1]['Stock']['quantity'];
                                        } else {
                                            $prevQuantity = 0;
                                        }
                                        
                                        if (isset($balance)) {
                                            $balance = $balance - $prevQuantity;
                                        } else {
                                            $balance = $currentQuantity;
                                        }

                                        echo h($this->MyFormat->format_show($balance));
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
