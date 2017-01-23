<div class="row">

    <div class="col-sm-2 pull-right">
        <p>
            <?php
            echo $this->Html->link(
                    '&nbsp;<span class="fa fa-plus"></span>&nbsp' . __('Add Order') . '&nbsp;', ['controller' => 'orders', 'action' => 'order_wizard', $table['Table']['id']], ['class' => 'btn btn-primary btn-block', 'escape' => false]
            )
            ?>
        </p>
    </div>
    <div class="col-sm-2 pull-right btn-group">
        <button class="btn btn-primary dropdown-toggle pull-right" data-toggle="dropdown" type="button">
            <?php echo __('Actions'); ?>&nbsp;<i class="fa fa-caret-down"></i>
        </button>
        <ul class="dropdown-menu" role="menu">
            <?php
            if (isset($currentBill['Bill']['id'])) {
                ?>

                <li>
                    <?php
                    echo $this->Html->link('<i class="fa fa-check" aria-hidden="true"></i>&nbsp;' . __('Close Table'), ['controller' => 'tables', 'action' => 'close_table', $table['Table']['id']], ['escape' => false]);
                    ?>
                </li>
                <li>
                    <?php
                    echo $this->Html->link(
                            '<i class="fa fa-exchange" aria-hidden="true"></i>&nbsp;' . __('Change Table'), $this->Html->url([
                                'controller' => 'tables',
                                'action' => 'change_table',
                                $table['Table']['id']
                                    ], true), [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'escape' => false
                            ]
                    );
                    ?>
                </li>
                <?php
            }
            ?>

            <li>
                <?php
                echo $this->Html->link('<i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;' . __('History'), ['controller' => 'bills', 'action' => 'history', $table['Table']['id']], ['escape' => false]);
                ?>
            </li>
            <!--<li class="divider"></li>-->
        </ul>
    </div>

    <?php
    if (isset($currentBill['Bill']['id'])) {
        ?>
        <div class="col-sm-2 pull-right">
            <p>
                <?php
                echo $this->Html->link(
                        '&nbsp;<span class="fa fa-print"></span>&nbsp' . __('Print Bill') . '&nbsp;', ['controller' => 'bills', 'action' => 'print_bill', $currentBill['Bill']['id']], ['class' => 'btn btn-primary btn-block', 'target' => '_blank', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <?php
    }
    ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="tab-content">
            <?php
            foreach ($payments as $payment) {

                if ($payment['Payment']['subtotal'] > 0.00) {
                    //payment of a item (pagamento de item)
                    $paymentValue = $payment['Payment']['subtotal'];
                } else {
                    //payment of a value (abatimento da conta)
                    $paymentValue = $payment['Payment']['payd_value'];
                }
                ?>
                <strong class="pull-right">
                    <?php
                    echo h("- " . $this->MyFormat->format_show($paymentValue, 2));
                    ?>
                </strong><br />
                <?php
            }
            ?>
            <strong></strong>
            <div class="table-responsive">

                <table class="table table-hover table-bordered">
                    <?php
                    if (!isset($ordersByTable) || !$ordersByTable) {
                        ?>
                        <tr>
                            <td colspan="9" class="text-center">
                                <h5>Nenhum Pedido Encontrado</h5>
                            </td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <thead>
                            <tr>
                                <th class="text-center">&nbsp;</th>
                                <th class="text-center"><?php echo __("id") ?></th>
                                <th class="text-center"><?php echo __("product") ?></th>
                                <th class="text-center"><?php echo __("quantity") ?></th>
                                <th class="text-center"><?php echo __("stage") ?></th>
                                <th class="text-center"><?php echo __("payment") ?></th>
                                <th class="text-center"><?php echo __("attendant") ?></th>
                                <th class="text-center"><?php echo __("date/time") ?></th>
                                <th class="text-center"><?php echo __("last updated") ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ordersByTable as $orderTable) {
                                $order = $orderTable['Order'];
                                $stage = $orderTable['Stages'];
                                $user = $orderTable['Users'];
                                $product = $orderTable['Products'];
                                $staturOrder = $orderTable['StatusOrders'];

                                $statusLabel = "";
                                $statusText = "";
                                $classTr = "";

                                if ($stage['name'] == 'Cancelado') {
                                    $statusLabel = "label-warning";
                                    $statusText = '<i class="fa fa-minus" aria-hidden="true"></i>';
                                    $classTr = "danger";
                                } elseif (isset($order['status_order_id']) && $order['status_order_id'] == 1) {
                                    $statusLabel = "label-warning";
                                    $statusText = '<i class="fa fa-minus" aria-hidden="true"></i>';
                                    $classTr = "";
                                } else {
                                    $statusLabel = "label-success";
                                    $statusText = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
                                    $classTr = "success";
                                }
                                ?>

                                <tr class="<?= $classTr ?>">
                                    <td class="text-center">
                                        <?php
                                        if ($this->Session->read('Permissions.orders.cancel')) {
                                            echo $this->Form->postLink(
                                                    '<i class="fa fa-times"></i>', [
                                                'controller' => 'orders',
                                                'action' => 'cancel',
                                                $order['id']
                                                    ], [
                                                'escape' => false,
                                                'title' => __('Cancel'),
                                                'confirm' => __('Are you sure you want to cancel the order # %s?', $order['id'])
                                                    ]
                                            );
                                        }
                                        ?>
                                    </td>

                                    <td class="text-right"><?php echo h($order['id']); ?></td>

                                    <td><?php echo h($product['name']); ?></td>

                                    <td class="text-right"><?php echo h($this->MyFormat->format_show($order['quantity'])); ?></td>

                                    <td class="text-center">
                                        <span class="label <?php echo $stage['label_class']; ?>">
                                            <?php echo h($stage['name']); ?>
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <?php echo $statusText; ?>
                                    </td>

                                    <td class="text-center"><?php echo h($user['name']); ?></td>

                                    <td class="text-center"><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['created']))); ?>&nbsp;</td>
                                    <td class="text-center"><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['modified']))); ?>&nbsp;</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div id="modal-content" class="modal-content">

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
//        $('.nav-tabs a:first').click();
    });

    function showItems() {}
</script>