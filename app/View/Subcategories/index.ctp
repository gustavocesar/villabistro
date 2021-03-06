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
                    <table class="datatable compact hover row-border">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-center"><?php echo __('id'); ?></th>
                                <th><?php echo __('name'); ?></th>
                                <th><?php echo __('category_id'); ?></th>
                                <th><?php echo __('Default Stage'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subcategories as $subcategory): ?>
                                <tr>
                                    <td class="text-center dt-body-nowrap">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-check"></i>', [
                                            'controller' => 'subcategories',
                                            'action' => 'view',
                                            $subcategory['Subcategory']['id']
                                                ], ['escape' => false, 'title' => __('View')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', [
                                            'controller' => 'subcategories',
                                            'action' => 'edit',
                                            $subcategory['Subcategory']['id']
                                                ], ['escape' => false, 'title' => __('Edit')]
                                        );
                                        ?>
                                        &nbsp;
                                        <?php
                                        echo $this->Form->postLink(
                                                '<i class="fa fa-trash-o"></i>', [
                                            'controller' => 'subcategories',
                                            'action' => 'delete',
                                            $subcategory['Subcategory']['id']
                                                ], [
                                            'escape' => false,
                                            'title' => __('Delete'),
                                            'confirm' => __('Are you sure you want to delete # %s?', $subcategory['Subcategory']['id'])
                                                ]
                                        );
                                        ?>
                                    </td>
                                    <td class="text-center"><?php echo h($subcategory['Subcategory']['id']); ?></td>
                                    <td><?php echo h($subcategory['Subcategory']['name']); ?></td>
                                    <td>
                                        <?php echo $this->Html->link($subcategory['Category']['name'], array('controller' => 'categories', 'action' => 'view', $subcategory['Category']['id'])); ?>
                                    </td>
                                    <td><?php echo h($subcategory['Stage']['name']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
