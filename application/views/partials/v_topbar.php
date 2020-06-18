<header class="main-header">
    <a href="<?php echo base_url();?>" class="logo">
        <span class="logo-mini"><b>S</b>IM</span>
        <span class="logo-lg">
            Sistem Monitoring & Evaluasi Program Bidikmisi
        </span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $this->session->userdata('nm_lengkap');?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $this->session->userdata('nm_lengkap');?>
                                <small>Bergabung sejak <?php echo date('M Y', strtotime($this->session->userdata('created_at')));?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('profil');?>" class="btn btn-default btn-flat">Profil Saya</a>
                            </div>
                            <div class="pull-right">
                                <a href="javascript:;" class="btn btn-default btn-flat btn-sign-out">Keluar Sistem</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="btn-sign-out"><i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>