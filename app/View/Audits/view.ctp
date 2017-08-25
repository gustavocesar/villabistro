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
			<?php echo h($audit['Audit']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Event'); ?></td>
		<td class="col-lg-9">
			<?php echo h($audit['Audit']['event']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Model'); ?></td>
		<td class="col-lg-9">
			<?php echo h($audit['Audit']['model']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Json Object'); ?></td>
		<td class="col-lg-9">
			<?php echo h($audit['Audit']['json_object']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Description'); ?></td>
		<td class="col-lg-9">
			<?php echo h($audit['Audit']['description']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Created'); ?></td>
		<td class="col-lg-9">
			<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($audit['Audit']['created']))); ?>
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


