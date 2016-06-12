<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php echo '<i class="fa fa-plus"></i>&nbsp;' . __('Add'); ?>
    </div>
    <div class="panel-body pan">
        <?php echo $this->Form->create('Product', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>
        <div class="form-body pal">
            <div class="form-group">
                <?php echo $this->Form->input('name', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('subcategory_id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('unit_id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('status', ['options' => ['Ativo' => 'Ativo', 'Inativo' => 'Inativo'], 'class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>

            <div class="form-group">
            <label class="control-label" for="ProductCostPrice"><?=__("cost_price")?></label>
            <?php
            echo $this->Form->input('cost_price', [
                'label' => false,
                'class'=>'form-control twoDigitsDouble',
                'value'=> '',
                'type'=>'text',
                'div'=> ['class' => 'input-group'],
                'between' => '<div class="input-group-addon">R$</div>'
            ]);
            ?>
            </div>

            <div class="form-group">
            <label class="control-label" for="ProductSellPrice"><?=__("sell_price")?></label>
            <?php
            echo $this->Form->input('sell_price', [
                'label' => false,
                'class'=>'form-control twoDigitsDouble',
                'value'=> '',
                'type'=>'text',
                'div'=> ['class' => 'input-group'],
                'between' => '<div class="input-group-addon">R$</div>'
            ]);
            ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('avaliable_to_order', ['options' => ['' => '--', 'Sim' => 'Sim', 'Não' => 'Não'], 'class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('stockable', ['options' => ['' => '--', 'Sim' => 'Sim', 'Não' => 'Não'], 'class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('minimum_stock', ['class' => 'form-control threeDigitsDouble', 'type' => 'text', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('description', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
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

<?= $this->Html->script('models/products'); ?>