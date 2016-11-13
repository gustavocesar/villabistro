<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '<span class="fa fa-arrow-left"></span>&nbsp' . __('Back'), ['controller' => 'tables', 'action' => 'table_details', $table['Table']['id']], ['class' => 'btn btn-yellow pull-right', 'escape' => false]
            )
            ?>
        </p>
    </div>
</div>

<br />

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
                                <th><?php echo $this->Paginator->sort('open date'); ?></th>
                                <th><?php echo $this->Paginator->sort('last change'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bills as $bill): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-print"></i>', [
                                                'controller' => 'bills',
                                                'action' => 'print_bill',
                                                $bill['Bill']['id']
                                            ], [
                                                'escape' => false, 'title' => __('View'), 'target' => '_blank'
                                            ]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                            '<i class="fa fa-pencil"></i>', [
                                                'controller' => 'bills',
                                                'action' => 'edit',
                                                $bill['Bill']['id']
                                            ], [
                                                'escape' => false, 'title' => __('Edit')
                                            ]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($bill['Bill']['id']); ?></td>
                                    <td><?php echo h($bill['StatusBill']['name']); ?></td>
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
