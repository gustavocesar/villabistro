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
			<?php echo h($auditDelta['AuditDelta']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Audit'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($auditDelta['Audit']['id'], array('controller' => 'audits', 'action' => 'view', $auditDelta['Audit']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Property Name'); ?></td>
		<td class="col-lg-9">
			<?php echo h($auditDelta['AuditDelta']['property_name']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Old Value'); ?></td>
		<td class="col-lg-9">
			<?php echo h($auditDelta['AuditDelta']['old_value']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('New Value'); ?></td>
		<td class="col-lg-9">
			<?php echo h($auditDelta['AuditDelta']['new_value']); ?>
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


