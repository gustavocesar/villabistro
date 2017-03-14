<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel" style="color: #ffffff !important; text-shadow: 0 1px #175bbe;">
        <?php echo '<i class="fa fa-plus"></i>&nbsp;' . __('Add Address'); ?>
    </h4>
</div>


<?php echo $this->Form->create('Address', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>

<div class="modal-body">

    <div class="responseModalMessage">
        <?php echo $this->Flash->render(); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
    </div>

    <?php echo $this->Form->input('user_id', ['type' => 'hidden']); ?>

    <div class="form-group">
        <?php echo $this->Form->input('name', ['class' => 'form-control', 'placeholder' => 'Casa, Apartamento, Trabalho', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
    </div>

    <div class="form-group">
        <?php
        $options = [
            'Sim' => 'Sim',
            'Não' => 'Não'
        ];

        echo $this->Form->input('is_primary', ['class' => 'form-control', 'options' => $options, 'div' => false, 'label' => ['class' => 'control-label']]);
        ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('zip_code', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
    </div>

    <div class="form-group">
        <span class="col-sm-3" style="padding-left: 0px;">
            <?php echo $this->Form->input('state_id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label', 'text' => 'Estado/Cidade']]); ?>
        </span>
        <span class="col-sm-9">
            <?php echo $this->Form->input('city', ['class' => 'form-control', 'placeholder' => __('City'), 'div' => false, 'label' => ['class' => 'control-label', 'text' => '&nbsp;']]); ?>
        </span>
    </div>

    <div class="form-group">
        <span class="col-sm-3" style="padding-left: 0px;">
            <?php echo $this->Form->input('public_place', ['class' => 'form-control', 'placeholder' => __('Public Place'), 'div' => false, 'label' => ['class' => 'control-label']]); ?>
        </span>
        <span class="col-sm-9">
            <?php echo $this->Form->input('number', ['class' => 'form-control', 'placeholder' => 'S/N', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
        </span>
    </div>

    <div class="clearfix"></div>

    <div class="form-group">
        <?php echo $this->Form->input('neighborhood', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('reference', ['class' => 'form-control', 'placeholder' => 'Próximo ao...', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('observation', ['class' => 'form-control', 'rows' => 2, 'div' => false, 'label' => ['class' => 'control-label']]); ?>
    </div>

    <div class="modal-footer">
        <?php echo $this->Form->button(__('Close'), ['id=' => 'btnCloseModal', 'type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']); ?>
        <?php echo $this->Form->submit(__('Submit'), ['value' => __('Submit'), 'id' => 'btnSaveModal', 'div' => false, 'class' => 'btn btn-primary']); ?>
    </div>
</div>

<?php echo $this->Form->end(); ?>

<?php
echo $this->Form->input('url-get-location', [
    'type' => 'hidden',
    'value' => $this->Html->url([
        'controller' => 'addresses',
        'action' => 'location_by_zip_code'
    ])
]);
?>

<?= $this->Html->script('models/addresses'); ?>