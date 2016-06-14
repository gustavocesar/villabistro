<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-line-chart"></span>&nbsp' . __('Weekly stock'), ['controller' => 'charts', 'action' => 'weekly_stock'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <!--
            <p>
                <?php
//                echo $this->Html->link(
//                        '<span class="fa fa-tag"></span>&nbsp' . __('Subcategories'), ['controller' => 'subcategories', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
//                )
                ?>
            </p>
            -->
        </div>
        <div class="col-sm-3">
            <!--
            <p>
                <?php
//                echo $this->Html->link(
//                        '<span class="fa fa-balance-scale"></span>&nbsp' . __('Units'), ['controller' => 'units', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
//                )
                ?>
            </p>
            -->
        </div>
        <div class="col-sm-3">
            <!--
            <p>
                <?php
//                echo $this->Html->link(
//                        '<span class="fa fa-shopping-basket"></span>&nbsp' . __('Products'), ['controller' => 'products', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
//                )
                ?>
            </p>
            -->
        </div>
    </div>
</div>

