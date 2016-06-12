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
foreach ($arrAllTables as $arrTables) {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <?php
            foreach ($arrTables as $arrTable) {
                $table = $arrTable['Table'];
                ?>
                <div class="col-xs-3 text-center">
                    <?php
                    $arrBills = $this->requestAction(
                            ['controller' => 'tables', 'action' => 'getBills', $table['id'], 1], ['return']
                    );
                    $class = 'default';
                    $icon = 'fa-bookmark-o';
                    if (count($arrBills) > 0) {
                        $class = 'green';
                        $icon  = 'fa-bookmark';
                    }

                    echo $this->Html->link(
                            '<span class="fa ' . $icon . '"></span>&nbsp' . $table['name'], ['controller' => 'tables', 'action' => 'table_details', $table['id']], ['class' => 'btn btn-lg btn-block btn-' . $class, 'escape' => false]
                    )
                    ?>
                </div>
                <?php
            }
            ?>
            <p>&nbsp;</p>
        </div>
    </div>
    <?php
}
