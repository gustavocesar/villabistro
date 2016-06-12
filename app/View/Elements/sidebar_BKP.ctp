<nav style="min-height: 100%;" id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
    <div style="height: auto;" class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">

            <div class="clearfix"></div>
            <li class="<?php echo $modelClass == 'Page' ? 'active' : '' ?>">
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
                    'action' => 'display'
                        ], [
                    'escape' => false,
                    'title' => __('Home')
                        ]
                );
                ?>
            </li>
            <li class="<?php echo $modelClass == 'Order' ? 'active' : '' ?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-cutlery">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Kitchen') . '</span>
                ', [
                    'controller' => 'pages',
                    'action' => 'kitchen_orders'
                        ], [
                    'escape' => false,
                    'title' => __('Orders')
                        ]
                );
                ?>
            </li>
            <li class="<?php echo $modelClass == 'Order' ? 'active' : '' ?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-comments">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Orders') . '</span>
                ', [
                    'controller' => 'pages',
                    'action' => 'orders_board'
                        ], [
                    'escape' => false,
                    'title' => __('Orders')
                        ]
                );
                ?>
            </li>
            <li class="<?php echo $modelClass == 'Table' ? 'active' : '' ?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-bookmark">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Tables') . '</span>
                ', [
                    'controller' => 'pages',
                    'action' => 'tables_board'
                        ], [
                    'escape' => false,
                    'title' => __('Tables Board')
                        ]
                );
                ?>
            </li>
            <li class="<?php echo $modelClass == 'Cashier' ? 'active' : '' ?>">
                <?php
                echo $this->Html->link('
                    <i class="fa fa-usd">
                        <div class="icon-bg bg-primary"></div>
                    </i>
                    <span class="menu-title">' . __('Cashier') . '</span>
                ', [
                    'controller' => 'pages',
                    'action' => 'cashier'
                        ], [
                    'escape' => false,
                    'title' => __('Tables Board')
                        ]
                );
                ?>
            </li>
            <?php
            $arrActiveModels = [
                'Configuration',
                'Category',
                'Subcategory',
                'Unit',
                'Product',
                'Table',
                'Stage',
                'User',
                'Supplier',
                'EntryNote',
                'Stock',
            ];
            ?>

            <li class="<?php echo in_array($modelClass, $arrActiveModels) ? 'active' : '' ?>">
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