
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
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>

                                <th>&nbsp;</th>
                                
                                    
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                
                                    
                                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                                
                                    
                                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                                
                                    
                                    <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($publicPlaces as $publicPlace): ?>
	<tr>
		<td class="text-center">
			<?php
                    echo $this->Html->link(
                        '<i class="fa fa-check"></i>',
                        [
                            'controller'=>'publicPlaces',
                            'action'=>'view',
                            $publicPlace['PublicPlace']['id']
                        ],
                        ['escape'=>false, 'title'=>__('View')]
                     );
                ?>
			 &nbsp;
			<?php
                    echo $this->Html->link(
                        '<i class="fa fa-pencil"></i>',
                        [
                            'controller'=>'publicPlaces',
                            'action'=>'edit',
                            $publicPlace['PublicPlace']['id']
                        ],
                        ['escape'=>false, 'title'=>__('Edit')]
                     );
                ?>
			 &nbsp;
			<?php
                    echo $this->Form->postLink(
                        '<i class="fa fa-trash-o"></i>',
                        [
                            'controller'=>'publicPlaces',
                            'action'=>'delete',
                            $publicPlace['PublicPlace']['id']
                        ],
                        [
                            'escape'=>false,
                            'title'=>__('Delete'),
                            'confirm' => __('Are you sure you want to delete # %s?', $publicPlace['PublicPlace']['id'])
                        ]
                     );
                ?>
		</td>
		<td><?php echo h($publicPlace['PublicPlace']['id']); ?></td>
		<td><?php echo h($publicPlace['PublicPlace']['name']); ?></td>
		<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($publicPlace['PublicPlace']['created']))); ?></td>
		<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($publicPlace['PublicPlace']['modified']))); ?></td>
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
