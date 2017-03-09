<div class="page-form">
    <div class="panel panel-blue" id="login-form" style="border: 1px solid #ccc !important">
        <div class="panel-body pan">
            <?php
            echo $this->Form->create('User', [
                'url' => [
                    'controller' => 'users',
                    'action' => 'login'
                ],
                'inputDefaults' => [
                    'label' => false,
                    'div' => false
                ],
                'id' => 'frmSignIn',
                'role' => 'form'
            ]);
            ?>
            <div class="form-body login-padding">

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <h2>Villa Bistrô</h2>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <label for="inputName" class="col-md-3 control-label">
                        Email:
                    </label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa fa-user"></i>
                            <?php echo $this->Form->input('email', array('class' => 'form-control input-lg', 'placeholder' => '')); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-md-3 control-label">
                        Senha:
                    </label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa fa-lock"></i>
                            <?php echo $this->Form->input('password', array('class' => 'form-control input-lg', 'placeholder' => '', 'required' => 'required')); ?>
                        </div>
                    </div>
                </div>

                <!--
                <div class="form-group">
                    <label for="inputPassword" class="col-md-3 control-label">
                        &nbsp;
                    </label>
                    <div class="col-md-9">
                        <div class="input-icon right" data-size="compact" class="g-recaptcha" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
                            <?php //echo $this->Recaptcha->display([]); ?>
                        </div>
                    </div>
                </div>
                -->
                
                <div class="form-group mbn">
                    <div class="col-lg-12">
                        <div class="form-group mbn">
                            <div class="col-lg-3">
                                &nbsp;
                            </div>
                            <div class="col-lg-9">
                                <br />
                                <?php echo $this->Form->submit('Login', array('value' => 'Entrar', 'class' => 'btn btn-default sign-btn')); ?>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
    <!--
    <div class="col-lg-12 text-center">
        <p>
            <a href="#" style="color:#d0dbf2">Forgot Something ?</a>
        </p>
    </div>
    -->
    <br />
    <div class="col-lg-12 text-center">
        <?php
        echo $this->Html->image('/images/responsive-icon-100.png', ['alt' => 'Responsive Design', 'title' => 'Design Responsivo']);
        ?>
    </div>
    <br />
    
    <div class="clearfix"></div>
</div>