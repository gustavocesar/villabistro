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
                                
                                    
                                    <th><?php echo __('audit_id'); ?></th>
                                
                                    
                                    <th><?php echo __('property_name'); ?></th>
                                
                                    
                                    <th><?php echo __('old_value'); ?></th>
                                
                                    
                                    <th><?php echo __('new_value'); ?></th>
                                                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($auditDeltas as $auditDelta): ?>
	<tr>
		<td class="text-center dt-body-nowrap">
			<?php
                    echo $this->Html->link(
                        '<i class="fa fa-check"></i>',
                        [
                            'controller'=>'auditDeltas',
                            'action'=>'view',
                            $auditDelta['AuditDelta']['id']
                        ],
                        ['escape'=>false, 'title'=>__('View')]
                     );
                ?>
			 &nbsp;
			<?php
                    echo $this->Html->link(
                        '<i class="fa fa-pencil"></i>',
                        [
                            'controller'=>'auditDeltas',
                            'action'=>'edit',
                            $auditDelta['AuditDelta']['id']
                        ],
                        ['escape'=>false, 'title'=>__('Edit')]
                     );
                ?>
			 &nbsp;
			<?php
                    echo $this->Form->postLink(
                        '<i class="fa fa-trash-o"></i>',
                        [
                            'controller'=>'auditDeltas',
                            'action'=>'delete',
                            $auditDelta['AuditDelta']['id']
                        ],
                        [
                            'escape'=>false,
                            'title'=>__('Delete'),
                            'confirm' => __('Are you sure you want to delete # %s?', $auditDelta['AuditDelta']['id'])
                        ]
                     );
                ?>
		</td>
		<td><?php echo h($auditDelta['AuditDelta']['id']); ?></td>
		<td>
			<?php echo $this->Html->link($auditDelta['Audit']['id'], array('controller' => 'audits', 'action' => 'view', $auditDelta['Audit']['id'])); ?>
		</td>
		<td><?php echo h($auditDelta['AuditDelta']['property_name']); ?></td>
		<td><?php echo h($auditDelta['AuditDelta']['old_value']); ?></td>
		<td><?php echo h($auditDelta['AuditDelta']['new_value']); ?></td>
	</tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>