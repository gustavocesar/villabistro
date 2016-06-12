
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
                                <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('quantity'); ?></th>
                                <th><?php echo $this->Paginator->sort('stage_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('bill_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('status_order_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'orders',
                                            'action' => 'view',
                                            $order['Order']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'orders',
                                            'action' => 'edit',
                                            $order['Order']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($order['Order']['id']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($order['User']['name'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($order['Product']['name'], array('controller' => 'products', 'action' => 'view', $order['Product']['id'])); ?>
                                    </td>
                                    <td><?php echo h($order['Order']['quantity']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($order['Stage']['name'], array('controller' => 'stages', 'action' => 'view', $order['Stage']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($order['Bill']['id'], array('controller' => 'bills', 'action' => 'view', $order['Bill']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($order['StatusOrder']['name'], array('controller' => 'status_orders', 'action' => 'view', $order['StatusOrder']['id'])); ?>
                                    </td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['Order']['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['Order']['modified']))); ?></td>
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
