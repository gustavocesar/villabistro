<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;' . __('Products'); ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo __("Product"); ?></th>
                                <th class="text-center"><?php echo __("Status"); ?></th>
                                <th class="text-right"><?php echo __("Minimum Stock"); ?></th>
                                <th class="text-right"><?php echo __("Quantity (In Stock)"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arrListStock as $stock): ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check-square-o"></i>', [
                                            'controller' => 'stocks',
                                            'action' => 'stock_details',
                                            $stock['Stock']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<span class="fa fa-sliders"></span>', $this->Html->url([
                                                    'controller' => 'stocks',
                                                    'action' => 'modal_edit',
                                                    $stock['Stock']['id']
                                                        ], true), [
                                            'data-toggle' => 'modal',
                                            'data-target' => '#modal',
                                            'escape' => false
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td class="text-left"><?php echo h($stock['Products']['name'] . " ({$stock['Units']['initials']})"); ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($stock['0']['TotalQuantity'] == 0) {
                                            ?>
                                            <span class="label label-danger">Esgotado</span>
                                            <?php
                                        } elseif ($stock['0']['TotalQuantity'] > $stock['Products']['minimum_stock']) {
                                            ?>
                                            <span class="label label-success">Em Estoque</span>
                                            <?php
                                        } elseif ($stock['0']['TotalQuantity'] < 0) {
                                            ?>
                                            <span class="label label-danger">Negativo</span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="label label-warning">Na Reserva</span>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($stock['Products']['minimum_stock'])); ?></td>
                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($stock['0']['TotalQuantity'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
