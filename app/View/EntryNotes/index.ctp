
<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '&nbsp;<span class="fa fa-plus"></span>&nbsp' . __('Add'). '&nbsp;', ['action' => 'add'], ['class' => 'btn btn-primary btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;' . __('List'); ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('supplier_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('status_entry_note_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('fiscal_note'); ?></th>
                                <th><?php echo $this->Paginator->sort('entry_date'); ?></th>
                                <th><?php echo $this->Paginator->sort('entry_hour'); ?></th>
                                <th class="text-center">Itens</th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entryNotes as $entryNote): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'entry_notes',
                                            'action' => 'view',
                                            $entryNote['EntryNote']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'entry_notes',
                                            'action' => 'edit',
                                            $entryNote['EntryNote']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'entry_notes',
                                            'action' => 'delete',
                                            $entryNote['EntryNote']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $entryNote['EntryNote']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($entryNote['EntryNote']['id']); ?></td>
                                    <td><?php echo h($entryNote['Supplier']['company_name']); ?></td>

                                    <td>
                                        <?php
                                        if ($entryNote['StatusEntryNote']['finish'] == StatusEntryNote::SIM) {
                                            $class = 'success';
                                        } else {
                                            $class = 'warning';
                                        }
                                        ?>
                                        <span class="label label-<?= $class ?>">
                                            <?php echo $entryNote['StatusEntryNote']['name']; ?>
                                        </span>
                                    </td>
                                    
                                    <td><?php echo h($entryNote['EntryNote']['fiscal_note']); ?></td>
                                    <td><?php echo h(date('d/m/Y', strtotime($entryNote['EntryNote']['entry_date']))); ?></td>
                                    <td><?php echo h(date('H:i', strtotime($entryNote['EntryNote']['entry_hour']))); ?></td>

                                    <td>
                                        <?php
                                        $count = count($entryNote['EntryNoteItem']);
                                        $label = "";
                                        $plural = "";

                                        if ($count == 1) {
                                            $label = "label-success";
                                            $plural = "item";
                                        } elseif ($count > 0) {
                                            $label = "label-success";
                                            $plural = "itens";
                                        } else {
                                            $label = "label-warning";
                                            $plural = "itens";
                                        }
                                        ?>
                                        <span class="label <?= $label ?>">
                                            <?php
                                            echo $count . "&nbsp;" . $plural
                                            ?>
                                        </span>
                                    </td>
                                    
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNote['EntryNote']['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNote['EntryNote']['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <ul class="pagination mtm mbm">
            <?php
            echo $this->Paginator->prev(
                    '«', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'disabled', 'tag' => 'li']
            );
            echo $this->Paginator->numbers(
                    ['separator' => '', 'tag' => 'li', 'currentClass' => 'disabled', 'currentTag' => 'a']
            );
            echo $this->Paginator->next(
                    '»', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'next disabled', 'tag' => 'li']
            );
            ?>
        </ul>
    </div>
</div>
