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
                                <?php echo h($statusInternalTransfer['StatusInternalTransfer']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Name'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($statusInternalTransfer['StatusInternalTransfer']['name']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Finish'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($statusInternalTransfer['StatusInternalTransfer']['finish']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($statusInternalTransfer['StatusInternalTransfer']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($statusInternalTransfer['StatusInternalTransfer']['modified']))); ?>
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
            <div class="panel-heading"><?php echo __('Related Internal Transfers'); ?></div>
            <div class="panel-body">
                <?php if (!empty($statusInternalTransfer['InternalTransfer'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Location Id'); ?></th>
                                <th><?php echo __('Location Destiny'); ?></th>
                                <th><?php echo __('Status Internal Transfer Id'); ?></th>
                                <th><?php echo __('Date'); ?></th>
                                <th><?php echo __('Time'); ?></th>
                                <th><?php echo __('Observation'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                            </tr>
                            <?php foreach ($statusInternalTransfer['InternalTransfer'] as $internalTransfer): ?>
                                <tr>
                                    <td><?php echo $internalTransfer['id']; ?></td>
                                    <td><?php echo $internalTransfer['location_id']; ?></td>
                                    <td><?php echo $internalTransfer['location_destiny']; ?></td>
                                    <td><?php echo $internalTransfer['status_internal_transfer_id']; ?></td>
                                    <td><?php echo $internalTransfer['date']; ?></td>
                                    <td><?php echo $internalTransfer['time']; ?></td>
                                    <td><?php echo $internalTransfer['observation']; ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransfer['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($internalTransfer['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
