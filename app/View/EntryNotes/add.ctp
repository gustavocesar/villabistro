<?= $this->Html->script('/jquery-timepicker/jquery.timepicker'); ?>
<?= $this->Html->css('/jquery-timepicker/jquery.timepicker'); ?>

<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php echo '<i class="fa fa-plus"></i>&nbsp;' . __('Add'); ?>
    </div>
    <div class="panel-body pan">
        <?php echo $this->Form->create('EntryNote', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>
        <div class="form-body pal">
            <div class="form-group">
                <?php echo $this->Form->input('supplier_id', ['class' => 'form-control', 'div' => false, 'empty' => ['' => '--'], 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('status_entry_note_id', ['readonly' => 'readonly', 'disabled' => 'disabled', 'class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('fiscal_note', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>

            <div class="control-group">
                <?php
                $options = [
                    'id' => 'entry_date',
                    'type' => 'text',
                    'class' => 'form-control',
                    'div' => ['class' => 'form-group'],
                    'label' => ['class' => 'control-label'],
                    'value' => date('d/m/Y')
                ];

                echo $this->Form->input("entry_date", $options);
                echo $this->Html->div('datepicker', ' ', array('id' => 'datepicker'));
                ?>
            </div>

            <div class="form-group">
                <?php
                $options2 = [
                    'id' => 'entry_hour',
                    'type' => 'text',
                    'class' => 'form-control',
                    'div' => false,
                    'label' => [
                        'class' => 'control-label'
                    ],
                    'value' => date('H:i')
                ];
                echo $this->Form->input('entry_hour', $options2);
                ?>
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

<script type="text/javascript">
    $(document).ready(function () {

        $("#entry_date").click(function () {
            $("#datepicker").datepicker({
                dateFormat: 'dd/mm/yy',
                autoclose: true,
                onSelect: function (dateText, inst) {
                    $('#entry_date').val(dateText);
                    $("#datepicker").datepicker("destroy");
                }
            });
        });

        $("#entry_hour").timepicker({
            timeFormat: 'H:i'
        });

    });
</script>