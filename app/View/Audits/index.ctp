<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel" style="color: #ffffff !important; text-shadow: 0 1px #175bbe;">
        <?php echo '<i class="fa fa-list-alt"></i>&nbsp;' . __('Audit'); ?>
    </h4>
</div>
<div class="modal-body">

    <div class="table-responsive">
        <table class="datatable compact hover row-border">
            <thead>
                <tr>
                    <th><?php echo __('event date'); ?></th>
                    <th><?php echo __('event'); ?></th>
                    <!--<th><?php //echo __('json_object'); ?></th>-->
                    <th><?php echo __('details'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($audits as $audit): ?>
                    <tr>
                        <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($audit['Audit']['created']))); ?></td>

                        <td><?php echo h(__($audit['Audit']['event'])); ?></td>

                        <!--
                        <td>
                            <?php
//                            $content = json_decode($audit['Audit']['json_object'], true);
//                            echo pr($content);
                            ?>
                        </td>
                        -->
                        <td>
                            <table class="table-bordered">
                                <?php foreach ($audit['AuditDelta'] as $auditDelta): ?>
                                    <?php
                                    $field = $auditDelta['property_name'];
                                    $old = $auditDelta['old_value'];
                                    $new = $auditDelta['new_value'];

                                    if ($field || $old || $new) {
                                        echo '
                                            <tr>
                                                <td>'.__($field).'</td>
                                                <td>'.__($old).'</td>
                                                <td>'.__($new).'</td>
                                            </tr>
                                        ';
                                    }
                                    ?>
                                <?php endforeach; ?>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal-footer">
        <?php echo $this->Form->button(__('Close'), ['id=' => 'btnCloseModal', 'type' => 'button', 'class' => 'btn btn-default', 'data-dismiss' => 'modal']); ?>
    </div>
</div>



