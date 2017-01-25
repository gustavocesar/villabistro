<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel" style="color: #ffffff !important; text-shadow: 0 1px #175bbe;">
        <?php echo '<i class="fa fa-usd"></i>&nbsp;' . __('Payment'); ?>
    </h4>
</div>

<?php
echo $this->Form->create('Payment', [
    'inputDefaults' => [
        'url' => ['controller' => 'payments', 'action' => 'add', $table['Table']['id'], $stringOrders],
        'error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]
    ]
]);
?>

<div class="modal-body">

    <div class="responseModalMessage">
        <?php echo $this->Flash->render(); ?>
    </div>

    <div class="form-body pal">

        <?php
        $arrBill = [];
        $subtotal = 0;
        foreach ($orders as $order) {
            $subtotal += $order['Product']['sell_price'] * $order['Order']['quantity'];
            ?>
            <?php
        }
        ?>

        <?php echo $this->Form->input('table_id', ['type' => 'hidden', 'value' => $table['Table']['id']]); ?>

        <div class="form-group">
            <label class="control-label" for="PaymentSubtotal"><?= __("Selected Total") ?></label>
            <?php
            echo $this->Form->input('label-subtotal', [
                'label' => false,
                'class' => 'form-control',
                'disabled' => 'disabled',
                'value' => number_format($subtotal, 2, ',', '.'),
                'type' => 'text',
                'div' => ['class' => 'input-group'],
                'between' => '<div class="input-group-addon">R$</div>'
            ]);
            echo $this->Form->input('subtotal', [
                'label' => false,
                'type' => 'hidden',
                'value' => number_format($subtotal, 2, ',', '.')
            ]);
            ?>
        </div>

        <div class="form-group">
            <label class="control-label" for="PaymentPaydValue"><?= __("payd_value") ?></label>
            <?php
            echo $this->Form->input('payd_value', [
                'label' => false,
                'class' => 'form-control',
                'value' => '',
                'type' => 'text',
                'required' => 'required',
                'div' => ['class' => 'input-group'],
                'between' => '<div class="input-group-addon">R$</div>'
            ]);
            ?>
        </div>

        <div class="form-group">
            <label class="control-label" for="PaymentPayback"><?= __("payback") ?></label>
            <?php
            echo $this->Form->input('label-payback', [
                'label' => false,
                'class' => 'form-control',
                'disabled' => 'disabled',
                'value' => '',
                'type' => 'text',
                'div' => ['class' => 'input-group'],
                'between' => '<div class="input-group-addon">R$</div>'
            ]);
            echo $this->Form->input('payback', [
                'label' => false,
                'type' => 'hidden',
                'value' => ''
            ]);
            ?>
        </div>

        <div class="radio">
            <!--<label class="control-label" for="payment_method_id"><?php echo __("Payment Method");?></label>-->
            <?php
            /*
              $this->Form->input('payment_method_id', ['class'=>'form-control', 'div'=>false, 'label'=>['class'=>'control-label']])
             */
            foreach ($paymentMethods as $paymentMethod) {
                ?>
                <?php
                echo $this->Form->input('payment_method_id', ['class' => 'form-control', 'div' => false, 'label' => false]);
                ?>
                <?php
            }
            ?>
        </div>

        <!--
        <div class="radio">
            <label>
                <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                Option one is this and that&mdash;be sure to include why it's great
            </label>
        </div>
        <div class="radio">
            <label>
                <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                Option two can be something else and selecting it will deselect option one
            </label>
        </div>
        <div class="radio disabled">
            <label>
                <input name="optionsRadios" id="optionsRadios3" value="option3" disabled="" type="radio">
                Option three is disabled
            </label>
        </div>
        -->

        <div class="modal-footer">
            <?php echo $this->Form->button(__('Close'), ['id=' => 'btnCloseModal', 'type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']); ?>
            <?php echo $this->Form->submit(__('Submit'), ['value' => __('Submit'), 'id' => 'btnSaveModal', 'div' => false, 'class' => 'btn btn-primary']); ?>
        </div>
    </div>

</div>

<?php echo $this->Form->end(); ?>

<?= $this->Html->script('models/payments'); ?>
