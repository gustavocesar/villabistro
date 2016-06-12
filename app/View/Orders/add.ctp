<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php echo '<i class="fa fa-plus"></i>&nbsp;' . __('Add'); ?>
    </div>
    <div class="panel-body pan">
        <?php echo $this->Form->create('Order', ['inputDefaults'=>['error'=>['attributes'=>['class'=>'alert alert-danger custom-required']]]]); ?>
        <div class="form-body pal">

            	
		<div class="form-group">
		<?php echo $this->Form->input('user_id', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('product_id', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('quantity', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('stage_id', ['class'=>'form-control', 'empty' => ['' => '--'], 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('bill_id', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('status_order_id', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('observation', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
		<div class="form-group">
		<?php echo $this->Form->input('kitchen_order', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>
		</div>
	

        </div>
        <div class="form-actions text-right pal">
            	<?php echo $this->Form->submit(__('Submit'), ['value' => __('Submit'), 'class' => 'pull-left btn btn-primary']); ?>
            	<?php echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
        </div>
        <div class="clearfix"></div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

