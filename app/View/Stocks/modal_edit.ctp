<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel" style="color: #ffffff !important; text-shadow: 0 1px #175bbe;">
        <?php echo '<i class="fa fa-sliders"></i>&nbsp;' . __('Manual Adjustment'); ?>
    </h4>
</div>

<?php
echo $this->Form->create('Stock', [
    'inputDefaults' => [
        'error' => [
            'attributes' => [
                'class' => 'alert alert-danger custom-required'
            ]
        ]
    ]
]);
?>

<div class="modal-body">

    <div class="responseModalMessage">
        <?php echo $this->Flash->render(); ?>
    </div>

    <?php echo $this->Form->input('id', ['type' => 'hidden', 'value' => $stock['Stock']['id']]); ?>
    <?php echo $this->Form->input('location_id', ['type' => 'hidden', 'value' => $stock['Stock']['location_id']]); ?>
    <?php echo $this->Form->input('product_id', ['type' => 'hidden', 'value' => $stock['Stock']['product_id']]); ?>

    <table class="table table-hover">
        <tbody>
            <tr>
                <td class="col-lg-3"><u><?php echo __('Location'); ?>:</u></td>
                <td class="col-lg-9">
                    <?php echo h($stock['Location']['name']); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><u><?php echo __('Product'); ?>:</u></td>
                <td class="col-lg-9">
                    <?php echo h($product['Product']['name'] . " ({$product['Unit']['initials']})"); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><u><?php echo __('Current Quantity'); ?>:</u></td>
                <td class="col-lg-9">
                    <?php
                    $locationId = $stock['Location']['id'];
                    $productId = $product['Product']['id'];
                    $arrResult = $this->requestAction(
                            ['controller' => 'stocks', 'action' => 'getStockQuantityByProduct', $productId, $locationId], ['return']
                    );
                    
                    if (isset($arrResult['0']['0']['TotalQuantity'])) {
                        $currentQuantity = $arrResult['0']['0']['TotalQuantity'];
                    } else {
                        $currentQuantity = "0";
                    }
                    
                    
                    echo $this->MyFormat->format_show($currentQuantity);
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="form-group">
        <label class="control-label" for="NewQuantity"><?= __("New Quantity") ?></label>
        <?php
        echo $this->Form->input('new_quantity', [
            'label' => false,
            'class' => 'form-control',
            'required' => 'required',
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

<script type="text/javascript">
    $(document).ready(function () {

        $('#StockNewQuantity').mask('000.000.000,000', {
            reverse: true
        });

    });
    
    function showItems() {
        var element = $('.nav-tabs li.active a').attr('aria-controls');
        showStockLocation(element);
    }

</script>
