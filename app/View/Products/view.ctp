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
                                <?php echo h($product['Product']['code']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Name'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($product['Product']['name']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Subcategory'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($product['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $product['Subcategory']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Unit'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($product['Unit']['name'], array('controller' => 'units', 'action' => 'view', $product['Unit']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Status'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($product['Product']['status']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Cost Price'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($product['Product']['cost_price']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Sell Price'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($product['Product']['sell_price']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Stockable'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($product['Product']['stockable']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Minimum Stock'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($product['Product']['minimum_stock']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Description'); ?></td>
                            <td class="col-lg-9">
                                <?php echo str_replace("\n", "<br />", h($product['Product']['description'])); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($product['Product']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($product['Product']['modified']))); ?>
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
            <div class="panel-heading"><?php echo __('Related Product Items'); ?></div>
            <div class="panel-body">
                <?php if (!empty($product['ProductItem'])): ?>
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th><?php echo __('Item Id'); ?></th>
                            </tr>
                        </thead>
                        <?php foreach ($product['ProductItem'] as $productItem): ?>
                            <tr>
                                <td><?php echo $productItem['Item']['name']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-violet">
            <div class="panel-heading"><?php echo __('Related Stocks'); ?></div>
            <div class="panel-body">
                <?php if (!empty($product['Stock'])): ?>
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Location Id'); ?></th>
                                <th><?php echo __('Quantity'); ?></th>
                                <th><?php echo __('Value'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                            </tr>
                        </thead>
                        <?php foreach ($product['Stock'] as $stock): ?>
                            <tr>
                                <td><?php echo $stock['id']; ?></td>
                                <td><?php echo $stock['Location']['name']; ?></td>
                                <td><?php echo $stock['quantity']; ?></td>
                                <td><?php echo $stock['value']; ?></td>
                                <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['created']))); ?></td>
                                <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['modified']))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
