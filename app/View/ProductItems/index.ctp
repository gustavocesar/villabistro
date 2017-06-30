<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;' . __('Components'); ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th class="text-left"><?php echo __('item_id'); ?></th>
                                <th class="text-right"><?php echo __('quantity'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productItems as $productItem): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', $this->Html->url([
                                                    'controller' => 'product_items',
                                                    'action' => 'edit',
                                                    $productItem['ProductItem']['id']
                                                        ], true), [
                                            'class' => 'editItem',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#modal',
                                            'escape' => false,
                                            'title' => __('Edit')
                                                ]
                                        );
                                        ?>

                                        &nbsp;

                                        <?php
                                        echo $this->Html->tag('a', '<i class="fa fa-trash-o"></i>', [
                                            'onclick' => "javascript:ajaxDelete('" . $productItem['ProductItem']['id'] . "', '" . $this->Html->url(['controller' => 'product_items', 'action' => 'delete', $productItem['ProductItem']['id']], true) . "');",
                                            'title' => __("Delete"),
                                            'class' => 'deleteItem'
                                        ]);
                                        ?>

                                        &nbsp;

                                        <?php
//                                        
                                        //se o item possui itens
                                        if (!empty($productItem['Item']['ProductItem'])) {

                                            $arrProductItems = $this->requestAction(
                                                ['controller' => 'product_items', 'action' => 'getProductItems', $productItem['Item']['id']], ['return']
                                            );

                                            $childDescription  = '';
                                            $childDescription .= "<u>Composto por</u>:";
                                            foreach ($arrProductItems as $item) {
                                                $unit = $item['Unit']['initials'];
                                                $quantity = $this->MyFormat->format_show($item['ProductItem']['quantity']);
                                                $product = $item['Product']['name'];

                                                $childDescription .= "<br />{$quantity} {$unit} - {$product}";
                                            }

                                            echo '
                                                <a class="text-left" data-placement="top" data-toggle="tooltip" href="javascript:;" data-original-title="'.$childDescription.'">
                                                <i class="fa fa-link"></i>
                                                </a>
                                            ';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-left">

                                        <?php
                                        $unit = $this->requestAction(
                                                ['controller' => 'products', 'action' => 'getUnit', $productItem['ProductItem']['item_id']], ['return']
                                        );
                                        echo $productItem['Item']['name'];
                                        if (isset($unit['Unit'])) {
                                            echo " ({$unit['Unit']['initials']})";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($productItem['ProductItem']['quantity'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <ul class="pagination mtm mbm">
            <?php
            echo $this->Paginator->prev(
                    '«', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'disabled', 'tag' => 'li']
            );
            echo $this->Paginator->numbers(
                    ['separator' => '', 'tag' => 'li', 'currentClass' => 'disabled', 'currentTag' => 'a']
            );
            echo $this->Paginator->next(
                    '»', ['tag' => 'li', 'disabledTag' => 'a'], null, ['class' => 'next disabled', 'tag' => 'li']
            );
            ?>
        </ul>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {

    });

    function ajaxDelete(id, url) {

        hideReturnMessage();

        if (confirm("Tem certeza que deseja excluir este produto?")) {

            $.ajax({
                async: false,
                data: id,
                dataType: "html",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8", //Não Mudar !!!
                type: "POST",
                url: url,
                error: function (data, textStatus, errorThrown) {
                    showReturnMessage(false, errorThrown);
                },
                success: function (data, textStatus) {

                    var retorno = JSON.parse(data);

                    if (retorno.success === true) {

                        showItems();

                        showReturnMessageDelete(true, retorno.message);

                    } else {
                        showReturnMessageDelete(false, retorno.message);
                    }
                }
            });
        }
    }
</script>