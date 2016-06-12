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
                                <?php echo h($bill['Bill']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Status Bill'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($bill['StatusBill']['name'], array('controller' => 'status_bills', 'action' => 'view', $bill['StatusBill']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Table'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($bill['Table']['name'], array('controller' => 'tables', 'action' => 'view', $bill['Table']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Identifier'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($bill['Bill']['identifier']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($bill['Bill']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($bill['Bill']['modified']))); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-actions text-right pal">
                <?php echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>




<p>&nbsp;</p>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-violet">
            <div class="panel-heading"><?php echo __('Related Orders'); ?></div>
            <div class="panel-body">
                <?php if (!empty($bill['Order'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('User Id'); ?></th>
                                <th><?php echo __('Product Id'); ?></th>
                                <th><?php echo __('Quantity'); ?></th>
                                <th><?php echo __('Stage Id'); ?></th>
                                <th><?php echo __('Bill Id'); ?></th>
                                <th><?php echo __('Status Order Id'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                            </tr>
                            <?php foreach ($bill['Order'] as $order): ?>
                                <tr>
                                    <td><?php echo $order['id']; ?></td>
                                    <td><?php echo $order['User']['name']; ?></td>
                                    <td><?php echo $order['Product']['name']; ?></td>
                                    <td><?php echo $order['quantity']; ?></td>
                                    <td><?php echo $order['Stage']['name']; ?></td>
                                    <td><?php echo $order['bill_id']; ?></td>
                                    <td><?php echo $order['StatusOrder']['name']; ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
