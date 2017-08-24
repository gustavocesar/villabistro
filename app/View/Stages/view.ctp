<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-search"></i>&nbsp;' . __('View'); ?></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Id'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($stage['Stage']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Name'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($stage['Stage']['name']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Status'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($stage['Stage']['status']); ?>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stage['Stage']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stage['Stage']['modified']))); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-actions text-right pal">
                <?php echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<p>&nbsp;</p>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-violet">
            <div class="panel-heading"><?php echo __('Related Subcategories'); ?></div>
            <div class="panel-body">
                <?php if (!empty($stage['Subcategory'])): ?>
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Category Id'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                            </tr>
                        </thead>
                        <?php foreach ($stage['Subcategory'] as $subcategory): ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $this->Html->link(
                                            '<i class="fa fa-check"></i>', [
                                        'controller' => 'subcategories',
                                        'action' => 'view',
                                        $subcategory['id']
                                            ], ['escape' => false, 'title' => __('View')]
                                    );
                                    ?>
                                </td>
                                <td><?php echo $subcategory['id']; ?></td>
                                <td><?php echo $subcategory['Category']['name']; ?></td>
                                <td><?php echo $subcategory['name']; ?></td>
                                <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($subcategory['created']))); ?></td>
                                <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($subcategory['modified']))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
