<nav style="min-height: 100%;" id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
    <div style="height: auto;" class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">

            <div class="clearfix"></div>

            <li class="<?=$activeHome?>">
                <?php
                /**
                 * http://thesabbir.github.io/simple-line-icons/
                 * simple-line-icons
                 */
                echo $this->Html->link('
                    <i class="fa fa-home fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Home') . '</span>
                ', [
                    'controller' => 'pages',
                    'action' => 'home'
                        ], [
                    'escape' => false,
                    'title' => __('Home')
                        ]
                );
                ?>
            </li>
            
            <li class="<?=$activeTables?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-bookmark">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Tables') . '</span>
                ', [
                    'controller' => 'tables',
                    'action' => 'tables_board'
                        ], [
                    'escape' => false,
                    'title' => __('Tables')
                        ]
                );
                ?>
            </li>

            <li class="<?=$activeOrdersBoard?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-comments">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Orders Board') . '</span>
                ', [
                    'controller' => 'orders',
                    'action' => 'orders_board'
                        ], [
                    'escape' => false,
                    'title' => __('Orders Board')
                        ]
                );
                ?>
            </li>

            <li class="<?=$activeKitchen?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-cutlery">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Kitchen') . '</span>
                ', [
                    'controller' => 'orders',
                    'action' => 'kitchen_orders'
                        ], [
                    'escape' => false,
                    'title' => __('Kitchen')
                        ]
                );
                ?>
            </li>

            <li class="<?=$activeEntryNotes?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-shopping-cart">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Entry Notes') . '</span>
                ', [
                    'controller' => 'entry_notes',
                    'action' => 'index'
                        ], [
                    'escape' => false,
                    'title' => __('Entry Notes')
                        ]
                );
                ?>
            </li>

            <li class="<?=$activeInternalTransfers?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-exchange">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Internal Transfer') . '</span>
                ', [
                    'controller' => 'internal_transfers',
                    'action' => 'index'
                        ], [
                    'escape' => false,
                    'title' => __('Internal Transfer')
                        ]
                );
                ?>
            </li>

            <li class="<?=$activeStockControl?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-archive">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Stock Control') . '</span>
                ', [
                    'controller' => 'stocks',
                    'action' => 'stock_control'
                        ], [
                    'escape' => false,
                    'title' => __('Stock Control')
                        ]
                );
                ?>
            </li>

            <li class="<?=$activeCharts?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-pie-chart">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Charts') . '</span>
                ', [
                    'controller' => 'charts',
                    'action' => 'index'
                        ], [
                    'escape' => false,
                    'title' => __('Charts')
                        ]
                );
                ?>
            </li>

            <li class="<?=$activeConfigurations?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-cogs fa-fw">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Configurations') . '</span>
                ', [
                    'controller' => 'configurations',
                    'action' => 'index'
                        ], [
                    'escape' => false,
                    'title' => __('Configurations')
                        ]
                );
                ?>
            </li>
        </ul>
    </div>
</nav>