<?php
$showAllowedQuantity = true;
if ($internalTransfer['InternalTransfer']['status_internal_transfer_id'] == 2) {
    $showAllowedQuantity = false;
}
?>
<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-list-ol"></i>&nbsp;' . __('List'); ?></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo __('product_id'); ?></th>
                                <?php
                                if ($showAllowedQuantity) {
                                    ?>
                                    <th class="text-right"><?php echo __('Allowed Quantity (Origin)'); ?></th>
                                    <?php
                                }
                                ?>
                                <th class="text-right"><?php echo __('quantity'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($internalTransferItems as $internalTransferItem):
                                $quantity = $internalTransferItem['InternalTransferItem']['quantity'];

                                $locationOriginId = $internalTransferItem['InternalTransfer']['LocationOrigin']['id'];
                                $productId = $internalTransferItem['Product']['id'];
                                $arrResult = $this->requestAction(
                                        ['controller' => 'stocks', 'action' => 'getStockQuantityByProduct', $productId, $locationOriginId], ['return']
                                );

                                if (isset($arrResult['0']['0']['TotalQuantity'])) {
                                    $allowedQuantity = $arrResult['0']['0']['TotalQuantity'];
                                } else {
                                    $allowedQuantity = "0";
                                }

                                if ($internalTransferItem['InternalTransfer']['status_internal_transfer_id'] == 2) {
                                    $allowedQuantity += $quantity;
                                }

                                $diff = $allowedQuantity - $quantity;

                                $trClass = "";
                                if ($diff < 0) {
                                    $trClass = "danger";
                                }
                                ?>
                                <tr class="<?= $trClass ?>">
                                    <td class="text-center">
                                        <?php
                                        if ($diff < 0) {
                                            echo '
                                                <a data-placement="top" data-toggle="tooltip" href="javascript:;" data-original-title="A quantidade Disponível para transferência é menor do que a quantidade que deseja transferir">
                                                <i class="fa fa-exclamation-triangle"></i>
                                                </a>
                                                &nbsp;
                                                &nbsp;
                                            ';
                                        }

                                        echo $this->Html->link(
                                                '<i class="fa fa-pencil"></i>', $this->Html->url([
                                                    'controller' => 'internal_transfer_items',
                                                    'action' => 'edit',
                                                    $internalTransferItem['InternalTransferItem']['id']
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
                                            'onclick' => "javascript:ajaxDelete('" . $internalTransferItem['InternalTransferItem']['id'] . "', '" . $this->Html->url(['controller' => 'internal_transfer_items', 'action' => 'delete', $internalTransferItem['InternalTransferItem']['id']], true) . "');",
                                            'title' => __("Delete"),
                                            'class' => 'deleteItem'
                                        ]);
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $internalTransferItem['Product']['name']; ?>
                                    </td>

                                    <?php
                                    if ($showAllowedQuantity) {
                                        ?>
                                        <td class="text-right">
                                            <?php
                                            echo h($this->MyFormat->format_show($allowedQuantity));
                                            ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($quantity)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {

    });

    function ajaxDelete(id, url) {

        hideReturnMessage();

        if (confirm("Tem certeza que deseja excluir este item?")) {

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