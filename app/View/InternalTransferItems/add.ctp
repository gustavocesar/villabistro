<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel" style="color: #ffffff !important; text-shadow: 0 1px #175bbe;">
        <?php echo '<i class="fa fa-plus"></i>&nbsp;' . __('Add'); ?>
    </h4>
</div>

<?php echo $this->Form->create('InternalTransferItem', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>

<div class="modal-body">

    <div class="responseModalMessage">
        <?php echo $this->Flash->render(); ?>
    </div>

    <?php echo $this->Form->input('internal_transfer_id', ['type' => 'hidden', 'value' => $internalTransferId]); ?>

    <div class="form-group">
        <?php echo $this->Form->input('product_id', ['class' => 'form-control', 'div' => false, 'empty'=>[''=>'--'], 'label' => ['class' => 'control-label']]); ?>
    </div>

    <div class="form-group">
        <label class="control-label" for="InternalTransferItemQuantity"><?= __("quantity") ?></label>
        <?php
        echo $this->Form->input('quantity', [
            'label' => false,
            'class' => 'form-control ',
            'value' => "",
            'type' => 'text',
            'div' => ['class' => 'input-group'],
            'between' => '<div class="input-group-addon"><i class="fa fa-balance-scale"></i></div>'
        ]);
        ?>
    </div>

    <div class="modal-footer">
        <?php echo $this->Form->button(__('Close'), ['id=' => 'btnCloseModal', 'type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']); ?>
        <?php echo $this->Form->submit(__('Submit'), ['value' => __('Submit'), 'id' => 'btnSaveModal', 'div' => false, 'class' => 'btn btn-primary']); ?>
    </div>

</div>

<?php echo $this->Form->end(); ?>

<?= $this->Html->script('models/internalTransferItems'); ?>