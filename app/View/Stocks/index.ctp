
<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '&nbsp;<span class="fa fa-plus"></span>&nbsp' . __('Add'). '&nbsp;', ['action' => 'add'], ['class' => 'btn btn-primary btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;' . __('List'); ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('location_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('quantity'); ?></th>
                                <th><?php echo $this->Paginator->sort('value'); ?></th>
                                <th><?php echo $this->Paginator->sort('entry_note_item_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('internal_transfer_item_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('order_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stocks as $stock): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'stocks',
                                            'action' => 'view',
                                            $stock['Stock']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'stocks',
                                            'action' => 'edit',
                                            $stock['Stock']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'stocks',
                                            'action' => 'delete',
                                            $stock['Stock']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $stock['Stock']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($stock['Stock']['id']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($stock['Location']['name'], array('controller' => 'locations', 'action' => 'view', $stock['Location']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($stock['Product']['name'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
                                    </td>
                                    <td><?php echo h($stock['Stock']['quantity']); ?></td>
                                    <td><?php echo h($stock['Stock']['value']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($stock['EntryNoteItem']['id'], array('controller' => 'entry_note_items', 'action' => 'view', $stock['EntryNoteItem']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($stock['InternalTransferItem']['id'], array('controller' => 'internal_transfer_items', 'action' => 'view', $stock['InternalTransferItem']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($stock['Order']['id'], array('controller' => 'orders', 'action' => 'view', $stock['Order']['id'])); ?>
                                    </td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['Stock']['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['Stock']['modified']))); ?></td>
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
