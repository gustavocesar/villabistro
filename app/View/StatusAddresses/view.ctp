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
			<?php echo h($statusAddress['StatusAddress']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Name'); ?></td>
		<td class="col-lg-9">
			<?php echo h($statusAddress['StatusAddress']['name']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Created'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($statusAddress['StatusAddress']['created']))); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Modified'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($statusAddress['StatusAddress']['modified']))); ?>
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
                <div class="panel-heading"><?php echo __('Related Addresses'); ?></div>
                <div class="panel-body">
                    <?php if (!empty($statusAddress['Address'])): ?>
                    <table class="table table-hover">
                        <tr>
                            		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Status Address Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Zip Code'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Public Place Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Is Primary'); ?></th>
		<th><?php echo __('Reference'); ?></th>
		<th><?php echo __('Observation'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
                        </tr>
                        	<?php foreach ($statusAddress['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['id']; ?></td>
			<td><?php echo $address['user_id']; ?></td>
			<td><?php echo $address['status_address_id']; ?></td>
			<td><?php echo $address['name']; ?></td>
			<td><?php echo $address['zip_code']; ?></td>
			<td><?php echo $address['state_id']; ?></td>
			<td><?php echo $address['city']; ?></td>
			<td><?php echo $address['public_place_id']; ?></td>
			<td><?php echo $address['number']; ?></td>
			<td><?php echo $address['is_primary']; ?></td>
			<td><?php echo $address['reference']; ?></td>
			<td><?php echo $address['observation']; ?></td>
			<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['created']))); ?></td>
			<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['modified']))); ?></td>
		</tr>
	<?php endforeach; ?>
                    </table>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    