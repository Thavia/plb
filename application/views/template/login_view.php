<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Student Center</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes_top.php';?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/loginpanel.css" />
    <style>
        .login-form-title {
            background-color: #2c3e50;
            color: #fff;
            font-weight: 100;
            padding: 3px 10px;
            -webkit-border-radius: 5px 5px 0px 0px;
            -moz-border-radius: 5px 5px 0px 0px;
            border-radius: 5px 5px 0px 0px;
        }
    </style>
</head>
<body class="login-page">
<?php //include 'template/theme_settings.php';?>
<div class="login-wrapper">
    <div style="text-align:center;width:340px;margin:0 auto;">
        <?php if(isset($error))echo $error;?>
        <?php echo $this->session->flashdata('msg');?>
    </div>
    <form id="form-login" action="<?php echo site_url('login/logar');?>" method="post">

        <div class="login-form-title">
            <h4><i class="fa fa-lock"></i> WS Student Center</h4>
        </div>

        <div style="text-align:center;margin: 10px;">
            <img src="<?php echo $logo;?>" width="50%"/>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                            <input class="form-control" type="text" name="username" placeholder="Username">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input class="form-control" type="password" name="password" placeholder="password">
                        </div>
                    </div>
                </div>

                <hr style="margin-bottom:5px;" />
                <div class="form-group col-md-12">
                    <div class="controls col-md-8">
                        <button type="submit" class="btn btn-primary form-control" >Entrar</button>

                    </div>
                    <p class="col-md-4">
                        <a href="<?php echo site_url('login/forgotpass');?>" class="goto-forgot" style="width:49%;margin-right:2px;margin-top:10px">Esqueceu a senha?</a>
                    </p>
                </div>
                <hr/>
    </form>
</div>
<div style="text-align:center;width:340px;margin:0 auto;">Desenvolvido por <a href="http://www.websumare.com.br" target="_blank">Web Sumaré</a> </div>


<?php include 'includes_bottom.php';?>
</body>
</html>