<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php echo '<i class="fa fa-pencil"></i>&nbsp;' . __('Edit'); ?>
    </div>
    <div class="panel-body pan">
        <?php echo $this->Form->create('EntryNote', ['inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]]]); ?>
        <div class="form-body pal">
            <div class="form-group">
                <?php echo $this->Form->input('id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('supplier_id', ['class' => 'form-control', 'div' => false, 'empty'=>[''=>'--'], 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('status_entry_note_id', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('fiscal_note', ['class' => 'form-control', 'div' => false, 'label' => ['class' => 'control-label']]); ?>
            </div>
            <div class="control-group">
                <?php
                $options = [
                    'id' => 'entry_date',
                    'type' => 'text',
                    'class' => 'form-control date-picker',
                    'div' => ['class' => 'form-group'],
                    'label' => ['class' => 'control-label'],
                ];

                if (isset($entry_date_formatted)) {
                    $options['value'] = $entry_date_formatted;
                }

                echo $this->Form->input("entry_date", $options);
                echo $this->Html->div('datepicker', ' ', array('id' => 'datepicker'));
                ?>

            </div>
            <div class="form-group">
                <?php
                $options2 = [
                    'id' => 'entry_hour',
                    'type' => 'text',
                    'class' => 'form-control time-picker',
                    'div' => false,
                    'label' => [
                        'class' => 'control-label'
                    ]
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

<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div id="modal-content" class="modal-content">

        </div>
    </div>
</div>

<br />
<?php
echo $this->Html->link(
        '<span class="fa fa-plus"></span>&nbsp' . __('Add Item'),
        $this->Html->url([
            'controller' => 'entry_note_items',
            'action' => 'add',
            $this->request->data['EntryNote']['id']
        ],true),
        [
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
        
        var myModalForm = $("#EntryNoteEditForm");

        $.ajax({
            async: false,
            data: myModalForm.serialize(),
            dataType: "html",
            type: "POST",
            url: "<?php echo $this->Html->url(['controller' => 'entry_note_items', 'action' => 'index', $this->request->data['EntryNote']['id']])?>",
            error: function (data, textStatus, errorThrown) {
                alert('Erro: ' + errorThrown);
            },
            success: function (data, textStatus) {
                $(".responseShowItems").html(data);
            }
        });

    }

    function checkEditPermission() {
        var statusId = $("#EntryNoteStatusEntryNoteId").val();

        /**
         * @todo: remover o ID fixo, e buscar a informação do campo "FINISH" da tabela "status_entry_notes"
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
