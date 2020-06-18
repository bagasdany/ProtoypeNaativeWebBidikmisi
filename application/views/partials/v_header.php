<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (isset($title) ? $title .' - Sistem Monitoring & Evaluasi Program Bidikmisi' : 'Sistem Monitoring & Evaluasi Program Bidikmisi');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/sweetalert/css/sweetalert.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/pace/pace.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/custom.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/fonts.css');?>">

    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
</head>

<body class="hold-transition skin-blue-light fixed sidebar-mini <?php echo ($this->uri->segment(1) == 'monitoring' && $this->uri->segment(2) == 'data' ? 'sidebar-collapse' : '');?>">