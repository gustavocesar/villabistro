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
                                <th class="text-right"><?php echo __("Requested Quantity"); ?></th>
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
                                    </td>
                                    <td>
                                        <?php echo h($stock['Products']['name'] . " ({$stock['Units']['initials']})"); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($stock['0']['TotalValue'] > 0) {
                                            ?>
                                            <span class="label label-warning">A receber</span>
                                            <?php
                                        } else { 
                                            ?>
                                            &nbsp;
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

<div class="row">
    <div class="col-lg-12">
        <ul class="pagination mtm mbm">
            <?php
            echo $this->Paginator->prev(
                    '«', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'disabled', 'tag' => 'li']
            );
            echo $this->Paginator->numbers(
                    ['separator' => '', 'tag' => 'li', 'currentClass' => 'disabled', 'currentTag' => 'a']
            );
            echo $this->Paginator->next(
                    '»', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'next disabled', 'tag' => 'li']
            );
            ?>
        </ul>
    </div>
</div>
