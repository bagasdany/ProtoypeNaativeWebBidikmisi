
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
                        <a href="<?php echo base_url('master/pendidikan');?>">Daftar Pendidikan</a>
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
                                            <label class="text-primary">Pendidikan</label>
                                            <div>
                                                <?php echo ($ubah['nm_pendidikan'] ? $ubah['nm_pendidikan'] : '-');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <a href="<?php echo base_url('master/pendidikan');?>" class="btn btn-default" title="Kembali ke daftar">
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