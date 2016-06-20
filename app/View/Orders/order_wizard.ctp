<?php
echo $this->Form->create(
        'Order'
);
?>

<input type="hidden" id="table_id" name="table_id" value="" />
<input type="hidden" id="table_selected_id" name="table_selected_id" value="<?php echo isset($tableSelected['Table']['id']) ? $tableSelected['Table']['id'] : "" ?>" />

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
        <div class="tab-content">
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th class="text-right">Valor Unitário (R$)</th>
                                <th class="text-center">Quantidade</th>
                                <th class="text-right">Total (R$)</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($arrFullMenu as $categoryId => $arrCategories) {
                                foreach ($arrCategories['Subcategories'] as $subcategoryId => $arrSubcategory) {
                                    ?>
                                    <tr class="success">
                                        <th scope="row" colspan="4" class="text-center"><h4><?php echo $arrSubcategory['name']; ?></h4></th>
                                    </tr>
                                    <?php
                                    foreach ($arrSubcategory['products'] as $key => $product) {

                                        $inputId = "input_" . $subcategoryId . "_" . $product['Product']['id'];

                                        $sellPrice = 0;
                                        if (isset($product['Product']['sell_price'])) {
                                            $sellPrice = $product['Product']['sell_price'];
                                        }
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo str_pad($product['Product']['id'], 3, '0', STR_PAD_LEFT) .' - '. $product['Product']['name']; ?></th>
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

                            <tr>
                                <td colspan="3" class="text-right"><strong>Total:&nbsp;</strong></td>
                                <td class="text-right"><strong>R$ <span id="spanTotal">0,00</span></strong></td>
                            </tr>
                        </tbody>
                    </table>
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

<?php echo $this->Form->end(); ?>

<?php
echo $this->Html->script('/twitter-bootstrap-wizard/jquery.bootstrap.wizard');
echo $this->Html->script('prevent_doubleclick');
?>

<script type="text/javascript">
    $(document).ready(function () {

        var originTable = $("#table_selected_id").val();

        if (originTable && originTable > 0 && originTable != '') {
            $("#table_id").val($("#table_selected_id").val());
        } else {
            $("#table_id").val("");
        }

        $("input.customQuantityDouble").each(function () {
            $(this).val(0);
        });

        $("input.hiddenSubtotal").each(function () {
            $(this).val(0);
        });

        $('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#rootwizard .progress-bar').css({width: $percent + '%'});

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');

                    updateFinishStep();
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
        window.prettyPrint && prettyPrint();

        $("#previous").click(function () {
            $("#totop").click();
        });

        $("#next").click(function () {
            $("#totop").click();
        });

        $("#tab1 button").click(function () {
            $("#tab1 button").removeClass('active');
            $("#" + this.id).addClass('active');
            $("#table_id").val(this.id);

            $("#next").click();
            $("#totop").click();
        });

        $('#rootwizard .finish').click(function () {

            if (!$("#table_id").val()) {
                alert('ae');
                return false;
            }

            $("#OrderOrderWizardForm").submit();
            $("#totop").click();
        });

        $('.customQuantityDouble').mask('000.000.000,000', {
            reverse: true,
            onChange: function (value, event, currentField) {

                //FIX-ME: bug em que o value do campo permanece em zero
//                $(currentField).val(value);

                updateSubtotal(null, null, currentField);
            }
        });

        updateTotal();

        if (originTable && originTable > 0 && originTable != '') {
            $("#" + originTable).click();
        }

    });

    function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function decrease(subcategory, input_id) {
        var input = $("#input_" + subcategory + "_" + input_id);

        var qtd = input.val();

        if (isNumeric(qtd)) {

            qtd--;

            if (qtd <= 0) {
                qtd = 0;
            }

            input.val(qtd);

            updateSubtotal(subcategory, input_id, $(input));

        } else {
            input.val(0);
        }
    }

    function increase(subcategory, input_id) {
        var input = $("#input_" + subcategory + "_" + input_id);

        var qtd = input.val();

        if (isNumeric(qtd)) {

            qtd++;

            if (qtd < 0) {
                qtd = 0;
            }

            input.val(qtd);

            updateSubtotal(subcategory, input_id, $(input));

        } else {
            input.val(0);
        }
    }

    function updateSubtotal(subcategory, input_id, currentField) {

        if (!subcategory) {
            var $id = $(currentField).attr("id");
            var $arrId = $id.split('_');
            subcategory = $arrId[1];
        }

        if (!input_id) {
            var $id = $(currentField).attr("id");
            var $arrId = $id.split('_');
            input_id = $arrId[2];
        }

        var sellPrice = $("#hiddenSellPrice_" + subcategory + "_" + input_id);
        var input = $("#input_" + subcategory + "_" + input_id);
        var spanSubtotal = $("#spanSubtotal_" + subcategory + "_" + input_id);
        var hiddenSubtotal = $("#hiddenSubtotal_" + subcategory + "_" + input_id);

        var v = 0;
        var quantity = parseFloat(input.val());
        if (quantity > 0) {
            var a = parseFloat(sellPrice.val()).toFixed(2);
            var b = parseFloat(quantity).toFixed(2);

            v = a * b;
            spanSubtotal.html(parseCurrency(v.toFixed(2), 2));
            hiddenSubtotal.val(parseFloat(v.toFixed(2)));
        } else {
            spanSubtotal.html("0.00");
            hiddenSubtotal.val('');
        }

        updateTotal();
    }

    function updateTotal() {
        var total = 0;
        $("input.hiddenSubtotal").each(function () {
            if ($(this).val() && $(this).val() > 0) {
                total += parseFloat($(this).val());
            }
        });

        $("#spanTotal").html(parseCurrency(total, 2));
    }

    function updateFinishStep() {

        var $activeTable = $("#tab1 button.active");

        if (!$activeTable.attr("id")) {
            alert('Selecione a mesa');
            return false;
        }

        var tableName = $activeTable.attr("name");
        if (tableName !== 'Balcão') {
            tableName = "MESA " + tableName;
        }

        var html = '';

        html += '<table class="table table-hover table-condensed">';

        html += '<thead>';
        html += '<tr>';
        html += '<th colspan="3" class="text-center" id="confirmTable">' + tableName + '</th>';
        html += '</tr>';
        html += '</thead>';

        html += '<tbody>';

        $("input.hiddenSubtotal").each(function () {
            if ($(this).val() && $(this).val() > 0) {

                var $tableRow = $(this).parent().parent().html();

                var productName = $($tableRow).first('th').html();

                var sellPrice = $($tableRow).find("input[id*='hiddenSellPrice_']").val();

                var subtotal = $($tableRow).find('.hiddenSubtotal').val();
                var subtotalFormatted = parseCurrency(subtotal, 2);

//                var quantity = $($tableRow).find('.customQuantityDouble').val();
                var quantity = subtotal / sellPrice;

                html += '<tr>';
                html += '<td class="text-right">' + quantity.toFixed(2) + '</td>';
                html += '<td class="text-left">' + productName + '</td>';
                html += '<td class="text-right">' + subtotalFormatted + '</td>';
                html += '</tr>';
            }
        });

        html += '</tbody>';

        html += '</table>';

        $("#itemsConfirmOrder").html("");
        $("#itemsConfirmOrder").html(html);
    }
</script>