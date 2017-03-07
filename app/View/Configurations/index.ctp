<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-tags"></span>&nbsp' . __('Categories'), ['controller' => 'categories', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-tag"></span>&nbsp' . __('Subcategories'), ['controller' => 'subcategories', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-balance-scale"></span>&nbsp' . __('Units'), ['controller' => 'units', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-shopping-basket"></span>&nbsp' . __('Products'), ['controller' => 'products', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-users"></span>&nbsp' . __('Users'), ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-truck"></span>&nbsp' . __('Suppliers'), ['controller' => 'suppliers', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-bank"></span>&nbsp' . __('Locations'), ['controller' => 'locations', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-bookmark"></span>&nbsp' . __('Tables'), ['controller' => 'tables', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-shopping-cart"></span>&nbsp' . __('Entry Notes'), ['controller' => 'entry_notes', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-exchange"></span>&nbsp' . __('Internal Transf.'), ['controller' => 'internal_transfers', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-archive"></span>&nbsp' . __('Stock'), ['controller' => 'stock_control', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-pie-chart"></span>&nbsp' . __('Charts'), ['controller' => 'charts', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
    </div>
</div>

