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
			<?php echo h($address['Address']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('User'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($address['User']['name'], array('controller' => 'users', 'action' => 'view', $address['User']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Status Address'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($address['StatusAddress']['name'], array('controller' => 'status_addresses', 'action' => 'view', $address['StatusAddress']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Name'); ?></td>
		<td class="col-lg-9">
			<?php echo h($address['Address']['name']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Zip Code'); ?></td>
		<td class="col-lg-9">
			<?php echo h($address['Address']['zip_code']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('State'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($address['State']['name'], array('controller' => 'states', 'action' => 'view', $address['State']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('City'); ?></td>
		<td class="col-lg-9">
			<?php echo h($address['Address']['city']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Public Place'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($address['PublicPlace']['name'], array('controller' => 'public_places', 'action' => 'view', $address['PublicPlace']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Number'); ?></td>
		<td class="col-lg-9">
			<?php echo h($address['Address']['number']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Is Primary'); ?></td>
		<td class="col-lg-9">
			<?php echo h($address['Address']['is_primary']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Reference'); ?></td>
		<td class="col-lg-9">
			<?php echo h($address['Address']['reference']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Observation'); ?></td>
		<td class="col-lg-9">
			<?php echo h($address['Address']['observation']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Created'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['Address']['created']))); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Modified'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['Address']['modified']))); ?>
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


