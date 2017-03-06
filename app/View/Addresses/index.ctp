<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '<span class="fa fa-plus"></span>&nbsp' . __('Add'), ['action' => 'add'], ['class' => 'btn btn-primary btn-block', 'escape' => false]
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
                                <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('status_address_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('name'); ?></th>
                                <th><?php echo $this->Paginator->sort('zip_code'); ?></th>
                                <th><?php echo $this->Paginator->sort('state_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('city'); ?></th>
                                <th><?php echo $this->Paginator->sort('public_place_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('number'); ?></th>
                                <th><?php echo $this->Paginator->sort('is_primary'); ?></th>
                                <th><?php echo $this->Paginator->sort('created'); ?></th>
                                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($addresses as $address): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'addresses',
                                            'action' => 'view',
                                            $address['Address']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'addresses',
                                            'action' => 'edit',
                                            $address['Address']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'addresses',
                                            'action' => 'delete',
                                            $address['Address']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $address['Address']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td><?php echo h($address['Address']['id']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($address['User']['name'], array('controller' => 'users', 'action' => 'view', $address['User']['id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($address['StatusAddress']['name'], array('controller' => 'status_addresses', 'action' => 'view', $address['StatusAddress']['id'])); ?>
                                    </td>
                                    <td><?php echo h($address['Address']['name']); ?></td>
                                    <td><?php echo h($address['Address']['zip_code']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($address['State']['name'], array('controller' => 'states', 'action' => 'view', $address['State']['id'])); ?>
                                    </td>
                                    <td><?php echo h($address['Address']['city']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($address['PublicPlace']['name'], array('controller' => 'public_places', 'action' => 'view', $address['PublicPlace']['id'])); ?>
                                    </td>
                                    <td><?php echo h($address['Address']['number']); ?></td>
                                    <td><?php echo h($address['Address']['is_primary']); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['Address']['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['Address']['modified']))); ?></td>
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
