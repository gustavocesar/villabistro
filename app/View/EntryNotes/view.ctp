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
                                <?php echo h($entryNote['EntryNote']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Supplier'); ?></td>
                            <td class="col-lg-9">
                                <?php
                                if (isset($entryNote['Supplier']) && isset($entryNote['Supplier']['company_name'])) {
                                    ?>
                                    <?php
                                    echo $this->Html->link($entryNote['Supplier']['company_name'], array('controller' => 'suppliers', 'action' => 'view', $entryNote['Supplier']['id']));
                                    ?>
                                    <?php
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Status Entry Note'); ?></td>
                            <td class="col-lg-9">
                                <?php
                                if ($entryNote['StatusEntryNote']['finish'] == StatusEntryNote::SIM) {
                                    $class = 'success';
                                } else {
                                    $class = 'warning';
                                }
                                ?>
                                <span class="label label-<?= $class ?>">
                                    <?php echo $entryNote['StatusEntryNote']['name']; ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Fiscal Note'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($entryNote['EntryNote']['fiscal_note']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Entry Date'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date('d/m/Y', strtotime($entryNote['EntryNote']['entry_date']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Entry Hour'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date('H:i', strtotime($entryNote['EntryNote']['entry_hour']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNote['EntryNote']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNote['EntryNote']['modified']))); ?>
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
            <div class="panel-heading"><?php echo __('Related Entry Note Items'); ?></div>
            <div class="panel-body">
                <?php if (!empty($entryNote['EntryNoteItem'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th><?php echo __('Id'); ?></th>
                                    <th><?php echo __('Product Id'); ?></th>
                                    <th><?php echo __('Quantity'); ?></th>
                                    <th><?php echo __('Unit Cost'); ?></th>
                                    <th><?php echo __('Cost Price'); ?></th>
                                    <th><?php echo __('Location Id'); ?></th>
                                    <th><?php echo __('Created'); ?></th>
                                    <th><?php echo __('Modified'); ?></th>
                                </tr>
                            </thead>
                            <?php foreach ($entryNote['EntryNoteItem'] as $entryNoteItem): ?>
                                <tr>
                                    <td><?php echo $entryNoteItem['id']; ?></td>
                                    <td><?php echo $entryNoteItem['Product']['name']; ?></td>
                                    <td><?php echo $this->MyFormat->format_show($entryNoteItem['quantity']); ?></td>
                                    <td><?php echo $this->MyFormat->format_show($entryNoteItem['unit_cost']); ?></td>
                                    <td><?php echo $this->MyFormat->format_show($entryNoteItem['total_cost']); ?></td>
                                    <td><?php echo $entryNoteItem['Location']['name']; ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNoteItem['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNoteItem['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
