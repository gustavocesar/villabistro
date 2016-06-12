<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">
            <?= __($title) ?>
        </div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
        <li>
            <i class="fa fa-home"></i>&nbsp;
            <?php
            echo $this->Html->link(__('Home'), [
                'controller' => 'pages',
                'action' => 'home'
                    ], [
                'escape' => false,
                'title' => __('Home')
                    ]
            );
            ?>
        </li>
        <?php
        
        if (isset($arrayBreadCrumb)) {
            
            $showSeparator = false;
            if (count($arrayBreadCrumb) > 0) {
                $showSeparator = true;
            }
            
            $last = array_pop($arrayBreadCrumb);
            
            foreach ($arrayBreadCrumb as $breadCrumb) {
                $controller = isset($breadCrumb['link']['controller']) ? $breadCrumb['link']['controller'] : 'pages';
                $action     = isset($breadCrumb['link']['action']) ? $breadCrumb['link']['action'] : 'home';
                $params     = isset($breadCrumb['link']['params']) ? implode('/', $breadCrumb['link']['params']) : '';
                
                echo '&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;';
                echo '<li>';
                echo $this->Html->link($breadCrumb['label'], [
                    'controller' => $controller,
                    'action' => $action, $params
                        ], [
                    'escape' => false,
                    'title' => __('Home')
                        ]
                );
                echo '</li>';
            }
            
            if ($showSeparator) {
                echo '&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;';
            }
            echo '<li>';
            echo $last['label'];
            echo '</li>';
            
        } else {
            echo '&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;';
            echo '<li>';
            echo $this->Html->link(__($title), [
                'action' => 'index'
                    ], [
                'escape' => false,
                'title' => __($title)
                    ]
            );
            echo '</li>';
        }
        ?>
    </ol>
    <div class="clearfix"></div>
</div>