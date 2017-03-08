<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php echo '<i class="fa fa-pencil"></i>&nbsp;' . __('Edit'); ?>
    </div>
    <div class="panel-body pan">
        <?php echo $this->Form->create('User', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>
        <div class="form-body pal">
            <div class="form-group">
                <?php echo $this->Form->input('id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('group_id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('status', ['options' => ['Ativo' => 'Ativo', 'Inativo' => 'Inativo'], 'class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('email', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('password', ['class' => 'form-control', 'div' => false, 'value' => '', 'placeholder' => 'Deixe vazio para manter a senha atual', 'label' => ['class' => 'control-label']]); ?>
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

<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div id="modal-content" class="modal-content">

        </div>
    </div>
</div>

<div class="responseParentMessage">
</div>

<div class="responseShowItems">
</div>

<script type="text/javascript">
    $(document).ready(function () {
        showItems();

        hideReturnMessage();
    });

    function showItems() {

        var myModalForm = $("#AddressAddForm");

        $.ajax({
            async: false,
            data: myModalForm.serialize(),
            dataType: "html",
            type: "POST",
            url: "<?php echo $this->Html->url(['controller' => 'addresses', 'action' => 'index', $this->request->data['User']['id']]) ?>",
            error: function (data, textStatus, errorThrown) {
                alert('Erro: ' + errorThrown);
            },
            success: function (data, textStatus) {
                $(".responseShowItems").html(data);
            }
        });

    }

</script>