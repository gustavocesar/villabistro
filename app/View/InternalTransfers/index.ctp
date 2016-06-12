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
                                <th><?php echo $this->Paginator->sort('location_id', __('Origin')); ?></th>
                                <th><?php echo $this->Paginator->sort('location_destiny'); ?></th>
                                <th><?php echo $this->Paginator->sort('status_internal_transfer_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('date'); ?></th>
                                <th><?php echo $this->Paginator->sort('time'); ?></th>
                                <th class="text-center">Itens</th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($internalTransfers as $internalTransfer): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'internal_transfers',
                                            'action' => 'view',
                                            $internalTransfer['InternalTransfer']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'internal_transfers',
                                            'action' => 'edit',
                                            $internalTransfer['InternalTransfer']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'internalTransfers',
                                            'action' => 'delete',
                                            $internalTransfer['InternalTransfer']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $internalTransfer['InternalTransfer']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($internalTransfer['InternalTransfer']['id']); ?></td>
                                    <td><?php echo h($internalTransfer['LocationOrigin']['name']); ?></td>
                                    <td><?php echo h($internalTransfer['LocationDestiny']['name']); ?></td>
                                    
                                    <td>
                                        <?php
                                        if ($internalTransfer['StatusInternalTransfer']['finish'] == StatusInternalTransfer::SIM) {
                                            $class = 'success';
                                        } else {
                                            $class = 'warning';
                                        }
                                        ?>
                                        <span class="label label-<?= $class ?>">
                                            <?php echo $internalTransfer['StatusInternalTransfer']['name']; ?>
                                        </span>
                                    </td>
                                    
                                    
                                    <td><?php echo h(date('d/m/Y', strtotime($internalTransfer['InternalTransfer']['date']))); ?></td>
                                    <td><?php echo h(date('H:i', strtotime($internalTransfer['InternalTransfer']['time']))); ?></td>
                                    
                                    <td class="text-center">
                                        <?php
                                        $count = count($internalTransfer['InternalTransferItem']);
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
                                    
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransfer['InternalTransfer']['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransfer['InternalTransfer']['modified']))); ?></td>
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
