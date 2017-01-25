
<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '<span class="fa fa-plus"></span>&nbsp' . __('Add'), ['action' => 'add'], ['class' => 'btn btn-primary btn-block', 'escape' => false]
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
                                <th><?php echo $this->Paginator->sort('table_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('bill_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('payment_method_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('subtotal'); ?></th>
                                <th><?php echo $this->Paginator->sort('payd_value'); ?></th>
                                <th><?php echo $this->Paginator->sort('payback'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payments as $payment): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'payments',
                                            'action' => 'view',
                                            $payment['Payment']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'payments',
                                            'action' => 'edit',
                                            $payment['Payment']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'payments',
                                            'action' => 'delete',
                                            $payment['Payment']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $payment['Payment']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($payment['Payment']['id']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($payment['Table']['name'], array('controller' => 'tables', 'action' => 'view', $payment['Table']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($payment['Bill']['id'], array('controller' => 'bills', 'action' => 'view', $payment['Bill']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($payment['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $payment['PaymentMethod']['id'])); ?>
                                    </td>
                                    <td><?php echo h($payment['Payment']['subtotal']); ?></td>
                                    <td><?php echo h($payment['Payment']['payd_value']); ?></td>
                                    <td><?php echo h($payment['Payment']['payback']); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($payment['Payment']['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($payment['Payment']['modified']))); ?></td>
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
