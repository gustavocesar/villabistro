<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
	echo $this->Html->link(
		'<span class="fa fa-plus"></span>&nbsp' . __('Add'), ['action' => 'add'], ['class'=>'btn btn-primary btn-block', 'escape' => false]
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
                    <table class="datatable compact hover row-border">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                                                                                        <th><?php echo __('id'); ?></th>
                                                                                                        <th><?php echo __('name'); ?></th>
                                                                                                        <th><?php echo __('status'); ?></th>
                                                                                                        <th><?php echo __('nature'); ?></th>
                                                                                                        <th><?php echo __('created'); ?></th>
                                                                                                        <th><?php echo __('modified'); ?></th>
                                                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($accountingAccounts as $accountingAccount): ?>
	<tr>
		<td class="text-center dt-body-nowrap">
			<?php
                    echo $this->Html->link(
                        '<i class="fa fa-check"></i>',
                        [
                            'controller'=>'accountingAccounts',
                            'action'=>'view',
                            $accountingAccount['AccountingAccount']['id']
                        ],
                        ['escape'=>false, 'title'=>__('View')]
                     );
                ?>
			 &nbsp;
			<?php
                    echo $this->Html->link(
                        '<i class="fa fa-pencil"></i>',
                        [
                            'controller'=>'accountingAccounts',
                            'action'=>'edit',
                            $accountingAccount['AccountingAccount']['id']
                        ],
                        ['escape'=>false, 'title'=>__('Edit')]
                     );
                ?>
			 &nbsp;
			<?php
                    echo $this->Form->postLink(
                        '<i class="fa fa-trash-o"></i>',
                        [
                            'controller'=>'accountingAccounts',
                            'action'=>'delete',
                            $accountingAccount['AccountingAccount']['id']
                        ],
                        [
                            'escape'=>false,
                            'title'=>__('Delete'),
                            'confirm' => __('Are you sure you want to delete # %s?', $accountingAccount['AccountingAccount']['id'])
                        ]
                     );
                ?>
		</td>
		<td><?php echo h($accountingAccount['AccountingAccount']['id']); ?></td>
		<td><?php echo h($accountingAccount['AccountingAccount']['name']); ?></td>
		<td><?php echo h($accountingAccount['AccountingAccount']['status']); ?></td>
		<td><?php echo h($accountingAccount['AccountingAccount']['nature']); ?></td>
		<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($accountingAccount['AccountingAccount']['created']))); ?></td>
		<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($accountingAccount['AccountingAccount']['modified']))); ?></td>
	</tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>