    
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
                    <li>
                        <a href="javascript:;">Master</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('master/pengguna');?>">Daftar Pengguna</a>
                    </li>
                    <li class="active">Detail Data</li>
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
                                            <label class="text-primary">Username</label>
                                            <div>
                                                <?php echo ($ubah['username'] ? $ubah['username'] : '-');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Password</label>
                                            <div>
                                                ******
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Nama Lengkap</label>
                                            <div>
                                                <?php echo ($ubah['nm_lengkap'] ? $ubah['nm_lengkap'] : '-');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="text-primary">Email</label>
                                            <div>
                                                <?php echo ($ubah['email'] ? $ubah['email'] : '-');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Role Pengguna</label>
                                            <div>
                                                <?php echo ($ubah['role'] ? $ubah['role'] : '-');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Nama Perguruan Tinggi</label>
                                            <div>
                                                <?php echo ($ubah['nm_instansi'] ? $ubah['nm_instansi'] : '-');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <a href="<?php echo base_url('master/pengguna');?>" class="btn btn-default" title="Kembali ke daftar">
                                                <i class="fa fa-reply"></i> Kembali
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