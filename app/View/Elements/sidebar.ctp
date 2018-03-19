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

            <li class="<?=$activeReports?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-file-text">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Reports') . '</span>
                ', [
                    'controller' => 'reports',
                    'action' => 'index'
                        ], [
                    'escape' => false,
                    'title' => __('Reports')
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