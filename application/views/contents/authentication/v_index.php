<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Web Administrator</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/pace/pace.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/custom.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/fonts.css');?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url();?>">
                <div class="logo-title">
                    SISTEM MONITORING & EVALUASI PROGRAM BIDIKMISI
                </div>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg text-warning">Silahkan login dengan akun anda</p>

            <form action="<?php echo base_url('authentication/do-login');?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username / Email" name="param1">
                    <span class="fa fa-user form-control-feedback"></span>
                    <div><?php echo form_error('param1', '<small class="text-danger">','</small>');?></div>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="param2">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div><?php echo form_error('param2', '<small class="text-danger">','</small>');?></div>
                </div>
                <div class="form-group has-feedback">
                    <div class="clearfix">
                        <div class="captcha-image">
                            <?php echo $captcha_image; ?>
                        </div>
                        <div class="refresh-captcha-image" title="Klik Untuk Ganti Kode Captcha">
                            <i class="fa fa-refresh fa-2x"></i>
                        </div>
                    </div>  
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Captcha Code" name="param3" autocomplete="off" maxlength="10">
                    <span class="fa fa-key form-control-feedback"></span>
                    <div><?php echo form_error('param3', '<small class="text-danger">','</small>');?></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <button type="submit" class="btn bg-navy btn-lg btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/pace/pace.min.js');?>"></script>
    <script>
        $(document).ready(function(){

            $(document).ajaxStart(function () {
                Pace.restart();
            });

            $('.refresh-captcha-image').on('click',function(){
                $('.fa-refresh').addClass('fa-spin');
                $.get('<?php echo base_url('authentication/ajax_captcha_refresh');?>',{_key:(Math.floor(Math.random()*1000)),_token:"<?php echo sha1(date('Y-m-d H:i:s'));?>"},function(data){
                    $('.captcha-image').html(data);
                    $('.fa-refresh').removeClass('fa-spin');
                });
            });
        });
    </script>
</body>
</html>