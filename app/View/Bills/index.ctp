
<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '&nbsp;<span class="fa fa-plus"></span>&nbsp' . __('Add') . '&nbsp;', ['action' => 'add'], ['class' => 'btn btn-primary btn-block', 'escape' => false]
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
                                <th><?php echo $this->Paginator->sort('status_bill_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('table_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('identifier'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bills as $bill): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'bills',
                                            'action' => 'view',
                                            $bill['Bill']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'bills',
                                            'action' => 'edit',
                                            $bill['Bill']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'bills',
                                            'action' => 'delete',
                                            $bill['Bill']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $bill['Bill']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($bill['Bill']['id']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($bill['StatusBill']['name'], array('controller' => 'status_bills', 'action' => 'view', $bill['StatusBill']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($bill['Table']['name'], array('controller' => 'tables', 'action' => 'view', $bill['Table']['id'])); ?>
                                    </td>
                                    <td><?php echo h($bill['Bill']['identifier']); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($bill['Bill']['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($bill['Bill']['modified']))); ?></td>
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
