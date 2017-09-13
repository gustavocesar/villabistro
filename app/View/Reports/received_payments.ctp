<?= $this->Html->script('/jquery-timepicker/jquery.timepicker'); ?>
<?= $this->Html->css('/jquery-timepicker/jquery.timepicker'); ?>

<?php echo $this->Form->create('SalesPeriod', ['target' => '_blank', 'inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <div class="control-group">
                <?php
                $options = [
                    'id' => 'start_date',
                    'type' => 'text',
                    'class' => 'form-control date-picker',
                    'div' => ['class' => 'form-group'],
                    'label' => ['class' => 'control-label'],
                    'value' => date('d/m/Y')
                ];

                echo $this->Form->input("start_date", $options);
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="control-group">
                <?php
                $options2 = [
                    'id' => 'start_hour',
                    'type' => 'text',
                    'class' => 'form-control time-picker',
                    'div' => false,
                    'label' => [
                        'class' => 'control-label'
                    ],
                    'value' => date('H:i')
                ];
                echo $this->Form->input('start_hour', $options2);
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <div class="control-group">
                <?php
                $options = [
                    'id' => 'finish_date',
                    'type' => 'text',
                    'class' => 'form-control date-picker',
                    'div' => ['class' => 'form-group'],
                    'label' => ['class' => 'control-label'],
                    'value' => date('d/m/Y')
                ];

                echo $this->Form->input("finish_date", $options);
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="control-group">
                <?php
                $options2 = [
                    'id' => 'finish_hour',
                    'type' => 'text',
                    'class' => 'form-control time-picker',
                    'div' => false,
                    'label' => [
                        'class' => 'control-label'
                    ],
                    'value' => date('H:i')
                ];
                echo $this->Form->input('finish_hour', $options2);
                ?>
            </div>
        </div>
    </div>
</div>

<div class="form-actions text-right pal">
    <?php echo $this->Form->submit(__('Print'), ['value' => __('Print'), 'class' => 'pull-left btn btn-primary']); ?>
    <?php echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
</div>
<div class="clearfix"></div>
<?php echo $this->Form->end(); ?>
