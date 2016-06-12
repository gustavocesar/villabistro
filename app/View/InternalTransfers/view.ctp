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
                                <?php echo h($internalTransfer['InternalTransfer']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Location'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($internalTransfer['LocationOrigin']['name'], array('controller' => 'locations', 'action' => 'view', $internalTransfer['LocationOrigin']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Location Destiny'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($internalTransfer['LocationDestiny']['name'], array('controller' => 'locations', 'action' => 'view', $internalTransfer['LocationDestiny']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Status Internal Transfer'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo h($internalTransfer['StatusInternalTransfer']['name']); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Date'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date('d/m/Y', strtotime($internalTransfer['InternalTransfer']['date']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Time'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date('H:i', strtotime($internalTransfer['InternalTransfer']['time']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Observation'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($internalTransfer['InternalTransfer']['observation']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransfer['InternalTransfer']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransfer['InternalTransfer']['modified']))); ?>
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
            <div class="panel-heading"><?php echo __('Related Internal Transfer Items'); ?></div>
            <div class="panel-body">
                <?php if (!empty($internalTransfer['InternalTransferItem'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Product Id'); ?></th>
                                <th><?php echo __('Quantity'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                            </tr>
                            <?php foreach ($internalTransfer['InternalTransferItem'] as $internalTransferItem): ?>
                                <tr>
                                    <td><?php echo $internalTransferItem['id']; ?></td>
                                    <td><?php echo $internalTransferItem['Product']['name']; ?></td>
                                    <td><?php echo $this->MyFormat->format_show($internalTransferItem['quantity']); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransferItem['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransferItem['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
