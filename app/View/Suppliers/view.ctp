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
                                <?php echo h($supplier['Supplier']['id']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Company Name'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($supplier['Supplier']['company_name']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Contact Name'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($supplier['Supplier']['contact_name']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Phone'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($supplier['Supplier']['phone']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Fax'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($supplier['Supplier']['fax']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Email'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h($supplier['Supplier']['email']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Created'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($supplier['Supplier']['created']))); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-3"><?php echo __('Modified'); ?></td>
                            <td class="col-lg-9">
                                <?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($supplier['Supplier']['modified']))); ?>
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
            <div class="panel-heading"><?php echo __('Related Entry Notes'); ?></div>
            <div class="panel-body">
                <?php if (!empty($supplier['EntryNote'])): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Status Entry Note Id'); ?></th>
                                <th><?php echo __('Fiscal Note'); ?></th>
                                <th><?php echo __('Entry Date'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>
                            </tr>
                            <?php foreach ($supplier['EntryNote'] as $entryNote): ?>
                                <tr>
                                    <td><?php echo $entryNote['id']; ?></td>
                                    <td><?php echo $entryNote['StatusEntryNote']['name']; ?></td>
                                    <td><?php echo $entryNote['fiscal_note']; ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNote['entry_date']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNote['created']))); ?></td>
                                    <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($entryNote['modified']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
