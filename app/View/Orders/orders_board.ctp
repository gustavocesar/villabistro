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

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-hourglass-half"></i>&nbsp;' . __('Pending Orders'); ?></div>
            <div class="panel-body">
                <div class="table-responsive">

                    <table class="table table-hover table-bordered">

                        <?php
                        if (isset($pendingOrders) && !empty($pendingOrders)) {
                            ?>
                            <thead>
                                <tr>
                                    <th class="text-center">&nbsp;</th>
                                    <th class="text-center"><?php echo __("id"); ?></th>
                                    <th class="text-center"><?php echo __("table"); ?></th>
                                    <th class="text-center"><?php echo __("product"); ?></th>
                                    <th class="text-center"><?php echo __("quantity"); ?></th>
                                    <th class="text-center"><?php echo __("stage"); ?></th>
                                    <th class="text-center"><?php echo __("attendant"); ?></th>
                                    <th class="text-center"><?php echo __("date/time"); ?></th>
                                    <th class="text-center"><?php echo __("last updated"); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pendingOrders as $pendingOrder) {
                                    $order = $pendingOrder['Order'];
                                    $table = $pendingOrder['Tables'];
                                    $stage = $pendingOrder['Stages'];
                                    $user = $pendingOrder['Users'];
                                    $product = $pendingOrder['Products'];
                                    $staturOrder = $pendingOrder['StatusOrders'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $this->Html->link(
                                                    '<i class="fa fa-check"></i>', [
                                                'controller' => 'orders',
                                                'action' => 'view',
                                                $order['id']
                                                    ], ['escape' => false, 'title' => __('View')]
                                            );
                                            ?>
                                            &nbsp;
                                            <?php
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
                                            ?>
                                        </td>

                                        <td class="text-right"><?php echo h($order['id']); ?></td>

                                        <td class="text-center">
                                            <?php
                                            if ($table) {
                                                echo h($table['name']);
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>

                                        <td><?php echo h($product['name']); ?></td>

                                        <td class="text-right"><?php echo h($this->MyFormat->format_show($order['quantity'])); ?></td>

                                        <td class="text-center">
                                            <span class="label <?= $stage['label_class'] ?>">
                                                <?php echo h($stage['name']); ?>
                                            </span>
                                        </td>

                                        <td><?php echo h($user['name']); ?></td>

                                        <td class="text-center"><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['created']))); ?>&nbsp;</td>
                                        <td class="text-center"><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['modified']))); ?>&nbsp;</td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <h5>Nenhum Pedido Pendente&nbsp;<i class="fa fa-hand-spock-o" aria-hidden="true"></i></h5>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<p>&nbsp;</p>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-green" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-check"></i>&nbsp;' . __('Completed Orders'); ?></div>
            <div class="panel-body">
                <div class="table-responsive">

                    <table class="table table-hover table-bordered">

                        <?php
                        if (isset($completedOrders) && !empty($completedOrders)) {
                            ?>
                            <thead>
                                <tr>
                                    <th class="text-center">&nbsp;</th>
                                    <th class="text-center"><?php echo __("id"); ?></th>
                                    <th class="text-center"><?php echo __("table"); ?></th>
                                    <th class="text-center"><?php echo __("product"); ?></th>
                                    <th class="text-center"><?php echo __("quantity"); ?></th>
                                    <th class="text-center"><?php echo __("stage"); ?></th>
                                    <th class="text-center"><?php echo __("attendant"); ?></th>
                                    <th class="text-center"><?php echo __("date/time"); ?></th>
                                    <th class="text-center"><?php echo __("last updated"); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($completedOrders as $completedOrder) {
                                    $order = $completedOrder['Order'];
                                    $table = $completedOrder['Tables'];
                                    $stage = $completedOrder['Stages'];
                                    $user = $completedOrder['Users'];
                                    $product = $completedOrder['Products'];
                                    $staturOrder = $completedOrder['StatusOrders'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $this->Html->link(
                                                    '<i class="fa fa-check"></i>', [
                                                'controller' => 'orders',
                                                'action' => 'view',
                                                $order['id']
                                                    ], ['escape' => false, 'title' => __('View')]
                                            );
                                            ?>
                                            &nbsp;
                                            <?php
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
                                            ?>
                                        </td>

                                        <td class="text-right"><?php echo h($order['id']); ?></td>

                                        <td class="text-center">
                                            <?php
                                            if ($table) {
                                                echo h($table['name']);
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>

                                        <td><?php echo h($product['name']); ?></td>

                                        <td class="text-right"><?php echo h($this->MyFormat->format_show($order['quantity'])); ?></td>

                                        <td class="text-center">
                                            <span class="label <?= $stage['label_class'] ?>">
                                                <?php echo h($stage['name']); ?>
                                            </span>
                                        </td>

                                        <td><?php echo h($user['name']); ?></td>

                                        <td class="text-center"><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['created']))); ?>&nbsp;</td>
                                        <td class="text-center"><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($order['modified']))); ?>&nbsp;</td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <h5>Nenhum Pedido Concluído&nbsp;<i class="fa fa-hand-spock-o" aria-hidden="true"></i></h5>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>