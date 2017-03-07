<?php
$arrHiddenFields = ['label_class'];
?>
<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo "<?php\n";
            echo "\techo \$this->Html->link(\n";
            echo "\t\t'<span class=\"fa fa-plus\"></span>&nbsp' . __('Add'), ['action' => 'add'], ['class'=>'btn btn-primary btn-block', 'escape' => false]\n";
            echo "\t)\n";
            echo "\t?>\n";
            ?>
        </p>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo "<?php echo '<i class=\"fa fa-list-ol\"></i>&nbsp;' . __('List'); ?>"; ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="datatable compact hover row-border">
                        <thead>
                            <tr>

                                <th>&nbsp;</th>
                                <?php foreach ($fields as $field): ?>

                                    <?php
                                    if (in_array($field, $arrHiddenFields)) {
                                        continue;
                                    }
                                    ?>

                                    <th><?php echo "<?php echo __('{$field}'); ?>"; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                            echo "\t<tr>\n";
                            echo "\t\t<td class=\"text-center dt-body-nowrap\">\n";
                            echo "\t\t\t<?php
                    echo \$this->Html->link(
                        '<i class=\"fa fa-check\"></i>',
                        [
                            'controller'=>'{$pluralVar}',
                            'action'=>'view',
                            \${$singularVar}['{$modelClass}']['{$primaryKey}']
                        ],
                        ['escape'=>false, 'title'=>__('View')]
                     );
                ?>\n\t\t\t &nbsp;";
                            echo "\n\t\t\t<?php
                    echo \$this->Html->link(
                        '<i class=\"fa fa-pencil\"></i>',
                        [
                            'controller'=>'{$pluralVar}',
                            'action'=>'edit',
                            \${$singularVar}['{$modelClass}']['{$primaryKey}']
                        ],
                        ['escape'=>false, 'title'=>__('Edit')]
                     );
                ?>\n\t\t\t &nbsp;";
                            echo "\n\t\t\t<?php
                    echo \$this->Form->postLink(
                        '<i class=\"fa fa-trash-o\"></i>',
                        [
                            'controller'=>'{$pluralVar}',
                            'action'=>'delete',
                            \${$singularVar}['{$modelClass}']['{$primaryKey}']
                        ],
                        [
                            'escape'=>false,
                            'title'=>__('Delete'),
                            'confirm' => __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])
                        ]
                     );
                ?>\n";
                            echo "\t\t</td>\n";
                            foreach ($fields as $field) {

                                if (in_array($field, $arrHiddenFields)) {
                                    continue;
                                }

                                $isKey = false;
                                if (!empty($associations['belongsTo'])) {
                                    foreach ($associations['belongsTo'] as $alias => $details) {
                                        if ($field === $details['foreignKey']) {
                                            $isKey = true;
                                            echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                            break;
                                        }
                                    }
                                }
                                if ($isKey !== true) {

                                    if (in_array($field, array('entry_date', 'created', 'modified', 'updated'))) {
                                        echo "\t\t<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime(\${$singularVar}['{$modelClass}']['{$field}']))); ?></td>\n";
                                    } else {
                                        echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
                                    }
                                }
                            }

                            echo "\t</tr>\n";

                            echo "<?php endforeach; ?>\n";
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>