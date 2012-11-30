<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gebo Admin Panel - Login Page</title>

        <!-- Bootstrap framework -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>bootstrap/bootstrap-responsive.min.css" />
        <!-- theme color-->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>blue.css" />
        <!-- tooltip -->    
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>style.css" />

        <!-- Favicons and the like (avoid using transparent .png) -->
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon-precomposed" href="icon.png" />

        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
                        <script src="js/ie/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="login_page">

        <div class="login_box">
            <?php
            $atributosForm = array('id ' => 'login_form');
            echo form_open('login/autenticar', $atributosForm);
            $cajaNick = array('name' => 'username', 'id' => 'username', 'value' => set_value('username'), 'placeholder' => "Usuario",'required' => 'required');
            $cajaPsw = array('name' => 'pass', 'id' => 'pass', 'type' => 'password', 'value' => '', 'placeholder' => 'Contraseña','required' => 'required');
            ?>
            <div class="top_b">Registrarse a la Administración</div>    
            <div class="alert alert-info alert-login">
                Ingrese sus datos para una correcta validación.
            </div>
            <div class="cnt_b">
                <div class="formRow">
                    <div><?php echo form_error('username'); ?></div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span><?php echo form_input($cajaNick); ?>
                    </div>
                </div>
                <div class="formRow">
                    <div><?php echo form_error('pass'); ?></div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span> <?php echo form_password($cajaPsw); ?>
                    </div>
                </div>
                <div class="formRow clearfix">
                    <label class="checkbox"><input type="checkbox" /> Recordarme</label>
                </div>
            </div>
            <div class="btm_b clearfix">
                <button class="btn btn-inverse pull-right" type="submit">Login</button>
                <span class="link_reg"><a href="#reg_form">No se a Registrado? Registrarse aqui</a></span>
            </div>  
            <?php echo form_close(); ?>
        </div>
        <script type="text/javascript" src='<?php echo URL_JS; ?>jquery-1.8.1.min.js'></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>jquery-ui-1.8.23.min.js"></script>
       
        <script src="<?php echo URL_JS; ?>bootstrap/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
                //* boxes animation
                form_wrapper = $('.login_box');
                $('.linkform a,.link_reg a').on('click',function(e){
                    var target	= $(this).attr('href'),
                    target_height = $(target).actual('height');
                    $(form_wrapper).css({
                        'height'		: form_wrapper.height()
                    });	
                    $(form_wrapper.find('form:visible')).fadeOut(400,function(){
                        form_wrapper.stop().animate({
                            height	: target_height
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
                            $(form_wrapper).css({
                                'height'		: ''
                            });	
                        });
                    });
                    e.preventDefault();
                });

            });
        </script>
    </body>
</html>
