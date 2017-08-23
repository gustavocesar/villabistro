<?php
echo $this->Form->create(
        'Order'
);
?>

<input type="hidden" id="table_id" name="table_id" value="" />
<input type="hidden" id="table_selected_id" name="table_selected_id" value="<?php echo isset($tableSelected['Table']['id']) ? $tableSelected['Table']['id'] : "" ?>" />
<div class="row col-md-6">
    <section id="wizard">
        <div id="rootwizard">
            <div class="navbar">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-sm-4">
                            <div class="navbar-inner">
                                <div class="container">
                                    <ul class="">
                                        <li><a href="#tab1" data-toggle="tab">Selecione a Mesa</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Selecione o Produto</a></li>
                                        <li><a href="#tab3" data-toggle="tab">Confirmação</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bar" class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
            <div class="tab-content no-padding">
                <div class="tab-pane" id="tab1">
                    <?php
                    foreach ($arrAllTables as $arrTables) {
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                foreach ($arrTables as $arrTable) {
                                    $table = $arrTable['Table'];

                                    $arrBills = $this->requestAction(
                                        ['controller' => 'tables', 'action' => 'getBills', $table['id'], 1], ['return']
                                    );
                                    $class = 'default';
                                    $icon = 'fa-bookmark-o';
                                    if (count($arrBills) > 0) {
                                        $class = 'green';
                                        $icon  = 'fa-bookmark';
                                    }
                                    ?>
                                    <div class="col-xs-3">
                                        <p>
                                            <?php
                                            echo $this->Form->button(
                                                '<span class="fa ' . $icon . '"></span>&nbsp' . $table['name'], ['id' => $table['id'], 'name' => $table['name'], 'type' => 'button', 'class' => 'btn btn-lg btn-block btn-' . $class, 'escape' => false]
                                            )
                                            ?>
                                        </p>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="table-responsive">
                        <div class="row col-md-12">
                            <table class="order-datatable table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Subcategoria</th>
                                        <th class="text-right">Valor Unitário (R$)</th>
                                        <th class="text-center">Quantidade</th>
                                        <th class="text-right">Total (R$)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($arrFullMenu as $categoryId => $arrCategories) {
                                        foreach ($arrCategories['Subcategories'] as $subcategoryId => $arrSubcategory) {
                                            foreach ($arrSubcategory['products'] as $key => $product) {

                                                $inputId = "input_" . $subcategoryId . "_" . $product['Product']['id'];

                                                $sellPrice = 0;
                                                if (isset($product['Product']['sell_price'])) {
                                                    $sellPrice = $product['Product']['sell_price'];
                                                }
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo str_pad($product['Product']['id'], 3, '0', STR_PAD_LEFT) .' - '. $product['Product']['name']; ?></th>
                                                    <td>
                                                        <?php echo $arrSubcategory['name']; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php echo $this->MyFormat->format_show($sellPrice, 2); ?>
                                                        <input type="hidden" id="hiddenSellPrice_<?= $subcategoryId . "_" . $product['Product']['id'] ?>" value="<?= $sellPrice; ?>" />
                                                    </td>

                                                    <td class="text-center col-sm-2">
                                                        <div class="input-group input-group-sm">
                                                            <span class="input-group-addon cursor_pointer" onclick="javascript:decrease(<?= $subcategoryId ?>, <?= $product['Product']['id'] ?>);">-</span>
                                                            <input id="<?= $inputId ?>" name="products[<?= $subcategoryId ?>][<?= $product['Product']['id'] ?>]" class="form-control customQuantityDouble" type="text" value="0" style="min-width: 40px !important; text-align: center;" />
                                                            <span id="" class="input-group-addon cursor_pointer" onclick="javascript:increase(<?= $subcategoryId ?>, <?= $product['Product']['id'] ?>);">+</span>
                                                        </div>
                                                    </td>

                                                    <td class="text-right">
                                                        <input type="hidden" class="hiddenSubtotal" id="hiddenSubtotal_<?= $subcategoryId . "_" . $product['Product']['id'] ?>" value="" />
                                                        <span id="spanSubtotal_<?= $subcategoryId . "_" . $product['Product']['id'] ?>">0,00</span>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab3">
                    <div id="itemsConfirmOrder"></div>
                </div>
                <ul class="pager wizard">
                    <li class="previous" id="previous"><a href="javascript:;">Anterior</a></li>
                    <li class="next" id="next"><a href="javascript:;">Próximo</a></li>
                    <li class="next finish prevent_doubleclick" style="display:none;"><a href="javascript:;">Finalizar</a></li>
                </ul>
            </div>
        </div>

    </section>
</div>
<?php echo $this->Form->end(); ?>

<?php
echo $this->Html->script('/twitter-bootstrap-wizard/jquery.bootstrap.wizard');
echo $this->Html->script('prevent_doubleclick');
echo $this->Html->script('models/order-wizard');
?>
