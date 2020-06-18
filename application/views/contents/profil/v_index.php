
    <?php $this->load->view('partials/v_header');?>

    <div class="wrapper">
        
        <?php $this->load->view('partials/v_topbar');?>

        <?php $this->load->view('partials/v_sidebar');?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1><?php echo (isset($title) ? $title : '');?></h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active"><?php echo (isset($title) ? $title : '');?></li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="row">                            
                            <form action="<?php echo current_url();?>" method="post">
                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <div>
                                                <?php echo ($ubah['username'] ? $ubah['username'] : '');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div>
                                                <?php echo ($ubah['email'] ? $ubah['email'] : '');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <div>
                                                <?php echo ($ubah['nm_lengkap'] ? $ubah['nm_lengkap'] : '');?>
                                            </div>
                                        </div>

                                        <?php if($ubah['id_role'] != 1){?>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <div>
                                                <?php echo ($ubah['nm_instansi'] ? $ubah['nm_instansi'] : '');?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <a href="<?php echo base_url('profil/ubah-profil');?>" class="btn bg-navy" title="Ubah Profil">
                                                <i class="fa fa-edit"></i> Ubah Profil
                                            </a>
                                            <a href="<?php echo base_url('profil/ubah-password');?>" class="btn bg-navy" title="Ubah Profil">
                                                <i class="fa fa-key"></i> Ubah Password
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('partials/v_copyright');?>

    </div>
    <?php $this->load->view('partials/v_footer');?>
</body>
</html>