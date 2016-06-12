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
                                <?php echo h($stock['Stock']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Location'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($stock['Location']['name'], array('controller' => 'locations', 'action' => 'view', $stock['Location']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Product'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($stock['Product']['name'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Quantity'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($stock['Stock']['quantity']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Value'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($stock['Stock']['value']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Entry Note Item'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($stock['EntryNoteItem']['id'], array('controller' => 'entry_note_items', 'action' => 'view', $stock['EntryNoteItem']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Internal Transfer Item'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($stock['InternalTransferItem']['id'], array('controller' => 'internal_transfer_items', 'action' => 'view', $stock['InternalTransferItem']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Order'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($stock['Order']['id'], array('controller' => 'orders', 'action' => 'view', $stock['Order']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['Stock']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['Stock']['modified']))); ?>
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


