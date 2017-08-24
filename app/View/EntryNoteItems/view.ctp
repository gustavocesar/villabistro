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
                                <?php echo h($entryNoteItem['EntryNoteItem']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Entry Note'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($entryNoteItem['EntryNote']['id'], array('controller' => 'entry_notes', 'action' => 'view', $entryNoteItem['EntryNote']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Product'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($entryNoteItem['Product']['name'], array('controller' => 'products', 'action' => 'view', $entryNoteItem['Product']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Quantity'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($entryNoteItem['EntryNoteItem']['quantity']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Unit Cost'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($entryNoteItem['EntryNoteItem']['unit_cost']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Total Cost'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($entryNoteItem['EntryNoteItem']['total_cost']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Location'); ?></td>
                            <td class="col-lg-9">
                                <span class="label label-sm label-success custom-label-link">
                                    <?php echo $this->Html->link($entryNoteItem['Location']['name'], array('controller' => 'locations', 'action' => 'view', $entryNoteItem['Location']['id'])); ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNoteItem['EntryNoteItem']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNoteItem['EntryNoteItem']['modified']))); ?>
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
            <div class="panel-heading"><?php echo __('Related Stocks'); ?></div>
            <div class="panel-body">
                <?php if (!empty($entryNoteItem['Stock'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th><?php echo __('Id'); ?></th>
                                    <th><?php echo __('Location Id'); ?></th>
                                    <th><?php echo __('Product Id'); ?></th>
                                    <th><?php echo __('Quantity'); ?></th>
                                    <th><?php echo __('Value'); ?></th>
                                    <th><?php echo __('Entry Note Item Id'); ?></th>
                                    <th><?php echo __('Internal Transfer Item Id'); ?></th>
                                    <th><?php echo __('Order Id'); ?></th>
                                    <th><?php echo __('Created'); ?></th>
                                    <th><?php echo __('Modified'); ?></th>
                                </tr>
                            </thead>
                            <?php foreach ($entryNoteItem['Stock'] as $stock): ?>
                                <tr>
                                    <td><?php echo $stock['id']; ?></td>
                                    <td><?php echo $stock['location_id']; ?></td>
                                    <td><?php echo $stock['product_id']; ?></td>
                                    <td><?php echo $stock['quantity']; ?></td>
                                    <td><?php echo $stock['value']; ?></td>
                                    <td><?php echo $stock['entry_note_item_id']; ?></td>
                                    <td><?php echo $stock['internal_transfer_item_id']; ?></td>
                                    <td><?php echo $stock['order_id']; ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($stock['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
