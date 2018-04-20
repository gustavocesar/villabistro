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
			<?php echo h($accountingAccount['AccountingAccount']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Name'); ?></td>
		<td class="col-lg-9">
			<?php echo h($accountingAccount['AccountingAccount']['name']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Status'); ?></td>
		<td class="col-lg-9">
			<?php echo h($accountingAccount['AccountingAccount']['status']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Nature'); ?></td>
		<td class="col-lg-9">
			<?php echo h($accountingAccount['AccountingAccount']['nature']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Created'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($accountingAccount['AccountingAccount']['created']))); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Modified'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($accountingAccount['AccountingAccount']['modified']))); ?>
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


