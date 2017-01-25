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
			<?php echo h($statusPaymentMethod['StatusPaymentMethod']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Name'); ?></td>
		<td class="col-lg-9">
			<?php echo h($statusPaymentMethod['StatusPaymentMethod']['name']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Created'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($statusPaymentMethod['StatusPaymentMethod']['created']))); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Modified'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($statusPaymentMethod['StatusPaymentMethod']['modified']))); ?>
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
                <div class="panel-heading"><?php echo __('Related Payment Methods'); ?></div>
                <div class="panel-body">
                    <?php if (!empty($statusPaymentMethod['PaymentMethod'])): ?>
                    <table class="table table-hover">
                        <tr>
                            		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status Payment Method Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
                        </tr>
                        	<?php foreach ($statusPaymentMethod['PaymentMethod'] as $paymentMethod): ?>
		<tr>
			<td><?php echo $paymentMethod['id']; ?></td>
			<td><?php echo $paymentMethod['name']; ?></td>
			<td><?php echo $paymentMethod['status_payment_method_id']; ?></td>
			<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($paymentMethod['created']))); ?></td>
			<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($paymentMethod['modified']))); ?></td>
		</tr>
	<?php endforeach; ?>
                    </table>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    