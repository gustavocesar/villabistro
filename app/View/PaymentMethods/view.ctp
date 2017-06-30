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
			<?php echo h($paymentMethod['PaymentMethod']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Name'); ?></td>
		<td class="col-lg-9">
			<?php echo h($paymentMethod['PaymentMethod']['name']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Status Payment Method'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($paymentMethod['StatusPaymentMethod']['name'], array('controller' => 'status_payment_methods', 'action' => 'view', $paymentMethod['StatusPaymentMethod']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Sequence'); ?></td>
		<td class="col-lg-9">
			<?php echo h($paymentMethod['PaymentMethod']['sequence']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Created'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($paymentMethod['PaymentMethod']['created']))); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Modified'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($paymentMethod['PaymentMethod']['modified']))); ?>
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
                <div class="panel-heading"><?php echo __('Related Payments'); ?></div>
                <div class="panel-body">
                    <?php if (!empty($paymentMethod['Payment'])): ?>
                    <table class="table table-hover">
                        <tr>
                            		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Table Id'); ?></th>
		<th><?php echo __('Bill Id'); ?></th>
		<th><?php echo __('Payment Method Id'); ?></th>
		<th><?php echo __('Subtotal'); ?></th>
		<th><?php echo __('Payd Value'); ?></th>
		<th><?php echo __('Payback'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
                        </tr>
                        	<?php foreach ($paymentMethod['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['id']; ?></td>
			<td><?php echo $payment['table_id']; ?></td>
			<td><?php echo $payment['bill_id']; ?></td>
			<td><?php echo $payment['payment_method_id']; ?></td>
			<td><?php echo $payment['subtotal']; ?></td>
			<td><?php echo $payment['payd_value']; ?></td>
			<td><?php echo $payment['payback']; ?></td>
			<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($payment['created']))); ?></td>
			<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($payment['modified']))); ?></td>
		</tr>
	<?php endforeach; ?>
                    </table>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    