<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php echo '<i class="fa fa-pencil"></i>&nbsp;' . __('Edit'); ?>
    </div>
    <div class="panel-body pan">
        <?php echo $this->Form->create('InternalTransfer', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>
        <div class="form-body pal">
            <div class="form-group">
                <?php echo $this->Form->input('id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('location_id', ['class' => 'form-control', 'empty' => ['' => '--'], 'div' => false, 'label' => ['text'=>__('Origin'), 'class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('location_destiny_id', ['options' => $listLocationDestiny, 'empty' => ['' => '--'], 'class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('status_internal_transfer_id', ['value' => $InternalTransfer['InternalTransfer']['status_internal_transfer_id'], 'class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>

            <div class="control-group">
                <?php
                $options = [
                    'id' => 'date',
                    'type' => 'text',
                    'class' => 'form-control date-picker',
                    'div' => ['class' => 'form-group'],
                    'label' => ['class' => 'control-label'],
                ];

                if (isset($date_formatted)) {
                    $options['value'] = $date_formatted;
                }

                echo $this->Form->input("date", $options);
                echo $this->Html->div('datepicker', ' ', array('id' => 'datepicker'));
                ?>

            </div>

            <div class="form-group">
                <?php
                $options2 = [
                    'id' => 'time',
                    'type' => 'text',
                    'class' => 'form-control time-picker',
                    'div' => false,
                    'label' => [
                        'class' => 'control-label'
                    ]
                ];
                echo $this->Form->input('time', $options2);
                ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->input('observation', ['class' => 'form-control', 'rows' => 2, 'div' => false, 'label' => ['class' => 'control-label']]); ?>
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

<br />
<?php
echo $this->Html->link(
        '<span class="fa fa-plus"></span>&nbsp' . __('Add Item'), $this->Html->url([
            'controller' => 'internal_transfer_items',
            'action' => 'add',
            $this->request->data['InternalTransfer']['id']
                ], true), [
    'data-toggle' => 'modal',
    'data-target' => '#modal',
    'class' => 'btn btn-grey btn-lg btn-block',
    'escape' => false
        ]
);
?>
<br />

<div class="responseParentMessage">
</div>

<div class="responseShowItems">
</div>

<script type="text/javascript">
    $(document).ready(function () {
        showItems();

        checkEditPermission();

        hideReturnMessage();
    });

    function showItems() {

        var myModalForm = $("#InternalTransferEditForm");

        $.ajax({
            async: false,
            data: myModalForm.serialize(),
            dataType: "html",
            type: "POST",
            url: "<?php echo $this->Html->url(['controller' => 'internal_transfer_items', 'action' => 'index', $this->request->data['InternalTransfer']['id']]) ?>",
            error: function (data, textStatus, errorThrown) {
                alert('Erro: ' + errorThrown);
            },
            success: function (data, textStatus) {
                $(".responseShowItems").html(data);
            }
        });

    }

    function checkEditPermission() {
        var statusId = $("#InternalTransferStatusInternalTransferId").val();

        /**
         * @todo: remover o ID fixo, e buscar a informação do campo "FINISH" da tabela "status_internal_transfers"
         */
        if (statusId == 2) {
            //desabilita o botão gravar
            $(".form-actions .submit input").attr('disabled', 'disabled');

            //desabilita os inputs do formulário
            $(".form-body input").attr('disabled', 'disabled');
            $(".form-body select").attr('disabled', 'disabled');
            $(".form-body textarea").attr('disabled', 'disabled');

            //desabilita o botão Incluir Novo Item
            $("a[data-target='#modal']").attr('disabled', 'disabled');

            //desabilita os botões editar e excluir
            $(".deleteItem").hide();
            $(".editItem").hide();
        }

    }

</script>
