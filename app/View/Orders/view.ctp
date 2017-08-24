<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-search"></i>&nbsp;' . __('View'); ?></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Id'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($order['Order']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('User'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($order['User']['name'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Product'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($order['Product']['name'], array('controller' => 'products', 'action' => 'view', $order['Product']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Quantity'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($order['Order']['quantity']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Stage'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($order['Stage']['name'], array('controller' => 'stages', 'action' => 'view', $order['Stage']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Bill'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($order['Bill']['id'], array('controller' => 'bills', 'action' => 'view', $order['Bill']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Status Order'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($order['StatusOrder']['name'], array('controller' => 'status_orders', 'action' => 'view', $order['StatusOrder']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Observation'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($order['Order']['observation']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Kitchen Order'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($order['Order']['kitchen_order']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['Order']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['Order']['modified']))); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-actions text-right pal">
                <?php echo $this->Html->link(__('Back'), ['action' => 'orders_board'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>




<p>&nbsp;</p>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-violet">
            <div class="panel-heading"><?php echo __('Related Stocks'); ?></div>
            <div class="panel-body">
                <?php if (!empty($order['Stock'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th><?php echo __('Id'); ?></th>
                                    <th><?php echo __('Location Id'); ?></th>
                                    <th><?php echo __('Product Id'); ?></th>
                                    <th><?php echo __('Order Id'); ?></th>
                                    <th><?php echo __('Quantity'); ?></th>
                                    <th><?php echo __('Value'); ?></th>
                                    <th><?php echo __('Entry Note Item Id'); ?></th>
                                    <th><?php echo __('Internal Transfer Item Id'); ?></th>
                                    <th><?php echo __('Created'); ?></th>
                                    <th><?php echo __('Modified'); ?></th>
                                </tr>
                            </thead>
                            <?php foreach ($order['Stock'] as $stock): ?>
                                <tr>
                                    <td><?php echo $stock['id']; ?></td>
                                    <td><?php echo $stock['Location']['name']; ?></td>
                                    <td><?php echo $stock['Product']['name']; ?></td>
                                    <td><?php echo $stock['order_id']; ?></td>
                                    <td><?php echo $stock['quantity']; ?></td>
                                    <td><?php echo $stock['value']; ?></td>
                                    <td><?php echo $stock['entry_note_item_id']; ?></td>
                                    <td><?php echo $stock['internal_transfer_item_id']; ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
