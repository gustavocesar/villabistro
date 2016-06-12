<div id="returnMessage">

</div>

<div class="row">
    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '&nbsp;<span class="fa fa-plus"></span>&nbsp' . __('Add Order') . '&nbsp;', ['controller' => 'orders', 'action' => 'order_wizard'], ['class' => 'btn btn-primary btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>
</div>

<?php
echo $this->Form->create('StageOrders', [
    'default' => false,
    'inputDefaults' => [
        'label' => false,
        'div' => false
    ],
    'id' => 'frmStageOrders',
    'role' => 'form'
]);
?>

<div class="row">
    <div id="multi">
        <div class="col-lg-12">
            <?php
            foreach ($arrKitchenStages as $arrStage) {

                $index = intval(12 / count($arrKitchenStages));
                $label = $arrStage['Stage']['label_class'];
                $stageId = $arrStage['Stage']['id'];

                $arrOrders = $this->requestAction(
                        ['controller' => 'orders', 'action' => 'getOrdersByStage', $stageId], ['return']
                );

                $qtdOrders = count($arrOrders);

                $isLimited = false;
                if ($arrStage['Stage']['consider_as'] != "Pendentes" && $qtdOrders >= 10) {
                    $isLimited = true;
                }

                $noteClass = "note-info";
                switch ($label) {
                    case 'label-default':
                        $noteClass = "note-default";
                        break;
                    case 'label-warning':
                        $noteClass = "note-warning";
                        break;
                    case 'label-success':
                        $noteClass = "note-success";
                        break;
                    case 'label-info':
                        $noteClass = "note-info";
                        break;
                    default:
                        $noteClass = "note-danger";
                        break;
                }
                ?>
                <div class="col-xs-<?= $index ?>">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <?php echo str_replace(' (Cozinha)', '', $arrStage['Stage']['name']) ?>
                        </div>
                        <div class="panel-body">
                            <div class="layer tile" data-force="30" style="min-height: 50px;">
                                <div class="tile__list" style="min-height: 50px;">
                                    <input type="hidden" class="fistInputStage" id="stageId_<?= $stageId ?>" name="stageId_<?= $stageId ?>" value="<?= $stageId ?>" />
                                    <?php
                                    $i = 1;
                                    foreach ($arrOrders as $arrOrder) {
                                        $order = $arrOrder['Order'];
                                        $product = $arrOrder['Products'];
                                        $tables = $arrOrder['Tables'];
                                        ?>
                                        <div class="elementOrder note <?= $noteClass ?>">
                                            <input type="hidden" name="orders[<?= $stageId ?>][<?= $order['id'] ?>]" value="<?= $stageId ?>" />
                                            <h4 class="box-heading">
                                                <strong>
                                                    <?php
                                                    echo "#".$order['id'] . " - ";
                                                    if ($tables['balcony'] != 'Sim') {
                                                        echo 'Mesa ' . $tables['name'];
                                                    } else {
                                                        echo $tables['name'];
                                                    }
                                                    ?>
                                                </strong>
                                            </h4>
                                            <p><?= $order['quantity']; ?>&nbsp;X&nbsp;&nbsp;<?= $product['name']; ?></p>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </div>

                                <?php
                                if ($isLimited) {
                                    ?>
                                    <div class="text-center">
                                        <p>
                                        <h3>. . .</h3>
                                        </p>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php echo $this->Form->end(); ?>

<?php
$data = $this->Js->get('#frmStageOrders')->serializeForm(['isForm' => true, 'inline' => true]);
$this->Js->get('#frmStageOrders')->event('submit', $this->Js->request(['controller' => 'orders', 'action' => 'update_sequence', 'admin' => false, 'plugin' => false], [
            'update' => '#returnMessage',
            'data' => $data,
            'async' => true,
            'dataExpression' => true,
            'method' => 'POST'
]));
echo $this->Js->writeBuffer();
?>

<script type="text/javascript">
    $(document).ready(function () {

        $("#frmStageOrders").submit(function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
        });

        //atualiza a tela a cada intervalo de tempo
//        setTimeout(function () {
//            
//            //exibe o Loading... ao recarregar a tela
//            $("body").addClass("loading");
//            
//            window.location.reload(1);
//            
//        }, 30 * 1000);


        //remove o Loading... ao recarregar a tela
        $("body").removeClass("loading");

    });

</script>

<?= $this->element('loading'); ?>


<?= $this->Html->script('../sortable/Sortable'); ?>
<?= $this->Html->script('../sortable/external/Ply.min'); ?>
<?= $this->Html->script('../sortable/ng-sortable'); ?>

<?php
//echo $this->Html->script('../sortable/st/app');
echo $this->Html->script('../sortable/st/mysortable');
?>
