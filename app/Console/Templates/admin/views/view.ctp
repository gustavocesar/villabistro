<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo "<?php echo '<i class=\"fa fa-search\"></i>&nbsp;' . __('View'); ?>"; ?></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                        <?php
                        foreach ($fields as $field) {
                            echo "\t\t<tr>\n";
                            $isKey = false;
                            if (!empty($associations['belongsTo'])) {
                                foreach ($associations['belongsTo'] as $alias => $details) {
                                    if ($field === $details['foreignKey']) {
                                        $isKey = true;
                                        echo "\t\t<td class=\"col-lg-3\"><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></td>\n";
                                        echo "\t\t<td class=\"col-lg-9\">\n\t\t\t<span class=\"label label-sm label-success custom-label-link\">\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t</span>\n\t\t</td>\n";
                                        break;
                                    }
                                }
                            }
                            if ($isKey !== true) {
                                echo "\t\t<td class=\"col-lg-3\"><?php echo __('" . Inflector::humanize($field) . "'); ?></td>\n";

                                if (in_array($field, array('entry_date', 'created', 'modified', 'updated'))) {
                                    echo "\t\t<td class=\"col-lg-9\">\n\t\t\t<?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime(\${$singularVar}['{$modelClass}']['{$field}']))); ?>\n\t\t</td>\n";
                                } else {
                                    echo "\t\t<td class=\"col-lg-9\">\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t</td>\n";
                                }
                            }
                            echo "\t\t</tr>\n";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="form-actions text-right pal">
                <?php echo "\t<?php echo \$this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>\n"; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>



<?php
if (!empty($associations['hasOne'])) :
    foreach ($associations['hasOne'] as $alias => $details):
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading"><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
                                <dl>
                                    <?php
                                    foreach ($details['fields'] as $field) {
                                        echo "\t\t<tr>\n";
                                        echo "\t\t<td><?php echo __('" . Inflector::humanize($field) . "'); ?></td>\n";
                                        echo "\t\t<td>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n</td>\n";
                                        echo "\t\t</tr>\n";
                                    }
                                    ?>
                                </dl>
                                <?php echo "<?php endif; ?>\n"; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
?>

<p>&nbsp;</p>


<?php
if (empty($associations['hasMany'])) {
    $associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
    $associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-violet">
                <div class="panel-heading"><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></div>
                <div class="panel-body">
                    <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <?php
                                foreach ($details['fields'] as $field) {
                                    echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
                                }
                                ?>
                            </tr>
                        </thead>
                        <?php
                        echo "\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
                        echo "\t\t<tr>\n";
                        foreach ($details['fields'] as $field) {

                            if (in_array($field, array('entry_date', 'created', 'modified', 'updated'))) {
                                echo "\t\t\t<td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime(\${$otherSingularVar}['{$field}']))); ?></td>\n";
                            } else {
                                echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
                            }
                        }

                        echo "\t\t</tr>\n";

                        echo "\t<?php endforeach; ?>\n";
                        ?>
                    </table>
                    <?php echo "<?php endif; ?>\n\n"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
endforeach;
?>
