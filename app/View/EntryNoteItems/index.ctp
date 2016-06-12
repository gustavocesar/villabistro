<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;' . __('Entry Note Items'); ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo __('product_id'); ?></th>
                                <th class="text-right"><?php echo __('Requested Quantity'); ?></th>
                                <th class="text-right"><?php echo __('unit_cost'); ?></th>
                                <th class="text-right"><?php echo __('total_cost'); ?></th>
                                <th><?php echo __('Fisical Location'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entryNoteItems as $entryNoteItem): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', $this->Html->url([
                                                    'controller' => 'entry_note_items',
                                                    'action' => 'edit',
                                                    $entryNoteItem['EntryNoteItem']['id']
                                                        ], true), [
                                            'class' => 'editItem',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#modal',
                                            'escape' => false,
                                            'title' => __('Edit')
                                                ]
                                        );
                                        ?>

                                        &nbsp;

                                        <?php
                                        echo $this->Html->tag('a', '<i class="fa fa-trash-o"></i>', [
                                            'onclick' => "javascript:ajaxDelete('" . $entryNoteItem['EntryNoteItem']['id'] . "', '" . $this->Html->url(['controller' => 'entry_note_items', 'action' => 'delete', $entryNoteItem['EntryNoteItem']['id']], true) . "');",
                                            'title' => __("Delete"),
                                            'class' => 'deleteItem'
                                        ]);
                                        ?>
                                    </td>
                                    <td><?php echo h($entryNoteItem['Product']['name'] . " ({$entryNoteItem['Product']['Unit']['initials']})"); ?></td>
                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($entryNoteItem['EntryNoteItem']['quantity'])); ?></td>
                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($entryNoteItem['EntryNoteItem']['unit_cost'])); ?></td>
                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($entryNoteItem['EntryNoteItem']['total_cost'])); ?></td>
                                    <td><?php echo h($entryNoteItem['Location']['name']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {

    });

    function ajaxDelete(id, url) {

        hideReturnMessage();

        if (confirm("Tem certeza que deseja excluir este item?")) {

            $.ajax({
                async: false,
                data: id,
                dataType: "html",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8", //Não Mudar !!!
                type: "POST",
                url: url,
                error: function (data, textStatus, errorThrown) {
                    showReturnMessage(false, errorThrown);
                },
                success: function (data, textStatus) {

                    var retorno = JSON.parse(data);

                    if (retorno.success === true) {

                        showItems();

                        showReturnMessageDelete(true, retorno.message);

                    } else {
                        showReturnMessageDelete(false, retorno.message);
                    }
                }
            });
        }
    }
</script>