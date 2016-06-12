<div id="header-topbar-option-demo" class="page-header-topbar">
    <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            echo $this->Html->link(
                    '<span class="logo-text-icon">Villa Bistrô</span>',
                    ['controller' => 'pages', 'action' => 'home'],
                    [
                        'id' => 'logo',
                        'class' => 'navbar-brand',
                        'escape' => false
                    ]
            )
            ?>
        </div>
        <div class="topbar-main">
            <a id="menu-toggle" href="#" class="hidden-xs">
                <i class="fa fa-bars"></i>
            </a>

            <ul class="nav navbar navbar-top-links navbar-right mbn">
                <li class="dropdown">&nbsp;</li>
                <li class="dropdown">&nbsp;</li>
                <li class="dropdown topbar-user pull-right">
                    <a data-hover="dropdown" href="#" class="dropdown-toggle">
                        <?php
                        echo $this->Html->image('/images/avatar/gravatar_empty_50.png', ['class'=>'img-responsive img-circle', 'alt'=>'']);
                        ?>
                        &nbsp;
                        <span class="hidden-xs">
                            <?php
                            $usuarioLogado = AuthComponent::user();
                            echo $usuarioLogado['name'];
                            ?>
                        </span>
                        &nbsp;
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user pull-right">
                        <li>
                            <?php
                            echo $this->Html->link(
                                    "<i class='fa fa-user'></i>&nbsp;" . __('My Profile'), ['controller' => 'users', 'action' => 'edit', $usuarioLogado['id']], ['escape' => false]
                            )
                            ?>
                        </li>
                        <li class="divider"></li>
                        
                        <li>
                            <?php
                            echo $this->Html->link(
                                    "<i class='fa fa-key'></i>&nbsp" . __('Logout'), ['controller' => 'users', 'action' => 'logout'], ['escape' => false]
                            )
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>