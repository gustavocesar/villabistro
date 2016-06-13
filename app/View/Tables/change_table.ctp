<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel" style="color: #ffffff !important; text-shadow: 0 1px #175bbe;">
        <?php echo '<i class="fa fa-exchange"></i>&nbsp;' . __('Change Table'); ?>
    </h4>
</div>

<?php echo $this->Form->create('Table', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>

<div class="modal-body">

    <div class="responseModalMessage">
        <?php echo $this->Flash->render(); ?>
    </div>

    <table class="table table-hover">
        <tbody>
            <tr>
                <td class="col-lg-3"><u><?php echo __('Origin'); ?>:</u></td>
                <td class="col-lg-9">
                    <?php echo h($title); ?>
                    <?php echo $this->Form->input('id', ['div'=>false, 'value'=>$table['Table']['id']]); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><u><?php echo __('Destiny'); ?>:</u></td>
                <td class="col-lg-9">
                    <?php echo $this->Form->input('table_id', ['class'=>'form-control','label' => false, 'div'=>false]); ?>
                </td>
            </tr>
            
        </tbody>
    </table>

    <div class="modal-footer">
        <?php echo $this->Form->button(__('Close'), ['id=' => 'btnCloseModal', 'type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']); ?>
        <?php echo $this->Form->submit(__('Submit'), ['value' => __('Submit'), 'id' => 'btnSaveModal', 'div' => false, 'class' => 'btn btn-primary']); ?>
    </div>

</div>

<input type="text" id="redirect" name="redirect" value="<?php echo $this->Html->url(['controller' => 'tables', 'action' => 'table_details'])?>" />

<?php echo $this->Form->end(); ?>

<script type="text/javascript">
    function showItems() {
        var urlRedirect = $("#redirect").val()+"/"+$("#TableTableId").val();
        alert("Mudança de Mesa realizada com sucesso!");
        document.location = urlRedirect;
    }
</script>