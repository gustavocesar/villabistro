<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php
        if (strpos($action, 'add') !== false) {
            echo "<?php echo '<i class=\"fa fa-plus\"></i>&nbsp;' . __('Add'); ?>\n";
        } else {
            echo "<?php echo '<i class=\"fa fa-pencil\"></i>&nbsp;' . __('Edit'); ?>\n";
        }
        ?>
    </div>
    <div class="panel-body pan">
        <?php echo "<?php echo \$this->Form->create('{$modelClass}', ['inputDefaults'=>['error'=>['attributes'=>['class'=>'alert alert-danger custom-required']]]]); ?>\n"; ?>
        <div class="form-body pal">

            <?php
            echo "\t\n";
            foreach ($fields as $field) {
                if (strpos($action, 'add') !== false && $field === $primaryKey) {
                    continue;
                } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                    echo "\t\t<div class=\"form-group\">\n";
                    echo "\t\t<?php echo \$this->Form->input('{$field}', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>\n";
                    echo "\t\t</div>\n";
                }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                    echo "\t\t<div class=\"form-group\">\n";
                    echo "\t\t<?php echo \$this->Form->input('{$assocName}', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']]); ?>\n";
                    echo "\t\t</div>\n";
                }
            }
            echo "\t\n";
            ?>

        </div>
        <div class="form-actions text-right pal">
            <?php echo "\t<?php echo \$this->Form->submit(__('Submit'), ['value' => __('Submit'), 'class' => 'pull-left btn btn-primary']); ?>\n"; ?>
            <?php echo "\t<?php echo \$this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>\n"; ?>
        </div>
        <div class="clearfix"></div>
        <?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
    </div>
</div>

