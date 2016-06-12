<?php
echo $this->Form->create(
        'Order'
);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <?php
            echo $this->Form->button(
                    '<span class="fa fa-bookmark"></span>&nbsp', ['id' => 'table_selected', 'type' => 'button', 'class' => 'btn btn-primary btn-lg btn-block hide', 'escape' => false]
            )
            ?>
        </div>
    </div>
</div>

<input type="hidden" id="table_id" name="table_id" value="" />
<div class="clearfix"></div>

<div id="tables">
    <?php
    foreach ($arrAllTables as $arrTables) {
        ?>
        <div class="row">
            <div class="col-lg-12">
                <?php
                foreach ($arrTables as $arrTable) {
                    $table = $arrTable['Table'];
                    
                    /**
                     * @todo:
                     * criar um virtual field do tipo booleano que identifica se
                     * uma mesa possui alguma conta pendente, para fazer o IF
                     */
                    $class = 'default';
                    $icon  = 'fa-bookmark-o';
//                    if (in_array($table['name'], ['02', '04', '10', '11', '12', '17'])) {
//                        $class = 'green';
//                        $icon  = 'fa-flag-checkered';
//                    }
                    
//                    if ($table['balcony'] == 'Sim') {
//                        $class = 'default';
//                        $icon  = 'fa-hand-pointer-o';
//                    }
                    
                    ?>
                    <div class="col-xs-3">
                        <p>
                            <?php
                            echo $this->Form->button(
                                    '<span class="fa '.$icon.'"></span>&nbsp' . $table['name'], ['id' => $table['id'], 'name' => $table['name'], 'type' => 'button', 'class' => 'btn btn-lg btn-block btn-'.$class, 'escape' => false]
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

<br />

<div class="table-responsive" id="full_menu">
    <table class="table table-bordered">
        <tbody>
            <?php
            foreach ($arrFullMenu as $categoryId => $arrCategories) {
                ?>
                <tr class="success">
                    <td colspan="4" class="text-center border_category"><h5><?= $arrCategories['name'] ?></h5></td>
                </tr>

                <?php
                foreach ($arrCategories['Subcategories'] as $subcategoryId => $arrProducts) {
                    ?>
                    <tr class="active">
                        <td colspan="4" class="cursor_pointer" onclick="javascript: showTr(<?= $arrProducts['id'] ?>);" >
                            <h6><?= $arrProducts['name'] ?></h6>
                        </td>
                    </tr>

                    <?php
                    foreach ($arrProducts['products'] as $key => $product) {
                        $inputId = "input_" . $subcategoryId . "_" . $product['Product']['id'];
                        
                        $sellPrice = 0;
                        if (isset($product['Product']['sell_price'])) {
                            $sellPrice = $product['Product']['sell_price'];
                        }
                        ?>
                        <tr class="tr_<?= $arrProducts['id'] ?>" style="display: none;">
                            <td class="">&nbsp;&nbsp;<?= $product['Product']['name'] ?></td>
                            <td class="text-right">R$ <span id="spanSellPrice_<?= $subcategoryId . "_" . $product['Product']['id'] ?>"><?= $sellPrice ?></span></td>
                            <td class="text-center col-sm-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon cursor_pointer" onclick="javascript:decrease(<?= $subcategoryId ?>, <?= $product['Product']['id'] ?>);">-</span>
                                    <input id="<?= $inputId ?>" name="products[<?= $subcategoryId ?>][<?= $product['Product']['id'] ?>]" class="form-control money" type="text" value="0" onchange="javascript:updateSubtotal(<?= $subcategoryId ?>, <?= $product['Product']['id'] ?>);" style="min-width: 40px !important;" />
                                    <span id="" class="input-group-addon cursor_pointer" onclick="javascript:increase(<?= $subcategoryId ?>, <?= $product['Product']['id'] ?>);">+</span>
                                </div>
                            </td>
                            <td class="text-right">R$ <span class="spanSubtotal" id="spanSubtotal_<?= $subcategoryId . "_" . $product['Product']['id'] ?>">0.00</span></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
            <tr>
                <td colspan="3" class="text-right"><strong>Total:&nbsp;</strong></td>
                <td class="text-right"><strong>R$ <span id="spanTotal">0.00</span></strong></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->submit(__('Submit'), ['value' => __('Add'), 'id' => 'add_order', 'class' => 'btn btn-grey btn-lg btn-block hide', 'escape' => false]); ?>
    </div>
</div>

<script type="text/javascript">
    
    //window.onload = function () {};

    $(document).ready(function () {
        $("#full_menu").find("input").val(0);

        //ativa todos os botões das mesas
        $("#tables button").removeAttr('disabled');

        //zera o input hidden da mesa selecionada
        $("#table_id").val('');

        //ao selecionar a mesa
        $("#tables button").click(function () {

            //esconde os botões das outras mesas
            $("#tables").addClass("hide", 'fast');

            //desativa os botões das outras mesas
            $("#tables button").attr('disabled', 'disabled');

            //mostra o botão da mesa selecionada
            $("#table_selected").removeClass("hide", 'fast');

            //mostra o botão gravar
            $("#add_order").removeClass("hide", 'fast');

            //atribui o valor selecionado no input hidden
            $("#table_id").val(this.id);

            //atribui o nome da mesa no html do botão da mesa selecionada
            $("#table_selected").html('<span class="fa fa-bookmark"></span>&nbsp' + this.name);

            $("#totop").click();
        });

        //ao clicar no botão da mesa selecionada
        $("#table_selected").click(function () {

            //esconde o botão da mesa selecionada
            $("#table_selected").addClass("hide", 'fast');

            //esconde o botão gravar
            $("#add_order").addClass("hide", 'fast');

            //ativa os botões de todas as mesas
            $("#tables button").removeAttr('disabled');

            //mostra os botões de todas as mesas
            $("#tables").removeClass("hide", 'fast');

            //zera o input hidden da mesa selecionada
            $("#table_id").val('');

            $("#totop").click();
        });

        //ao clicar no botão incluir pedido (gravar)
        $("#add_order").click(function () {
            //to_do
        });
    });

    function showTr(id) {
        $(".tr_" + id).show("fast");
    }

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

            updateSubtotal(subcategory, input_id);

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

            updateSubtotal(subcategory, input_id);

        } else {
            input.val(0);
        }
    }

    function updateSubtotal(subcategory, input_id) {
        var sellPrice = $("#spanSellPrice_" + subcategory + "_" + input_id);
        var input = $("#input_" + subcategory + "_" + input_id);
        var subtotal = $("#spanSubtotal_" + subcategory + "_" + input_id);

        var v = 0;
        if (input.val() > 0) {
            var a = parseFloat(sellPrice.html()).toFixed(2);
            var b = parseFloat(input.val()).toFixed(2);

            v = a * b;
            subtotal.html(v.toFixed(2));
        } else {
            subtotal.html("0.00");
        }

        updateTotal();
    }

    function updateTotal() {
        var total = 0;
        $("#full_menu span.spanSubtotal").each(function () {
            total += parseFloat($(this).html());
        });

        $("#spanTotal").html(total.toFixed(2));
    }

</script>