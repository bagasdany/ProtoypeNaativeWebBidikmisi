
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
                        <a href="<?php echo base_url('master/bank');?>">Daftar Bank</a>
                    </li>
                    <li class="active">Ubah Data</li>
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
                                            <label>Kode Bank</label>
                                            <div>
                                                <input type="text" name="kd_bank" class="form-control" placeholder="......" maxlength="10" value="<?php echo (set_value('kd_bank') ? set_value('kd_bank') : $ubah['kd_bank']);?>">
                                                <?php echo form_error('kd_bank', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Bank</label>
                                            <div>
                                                <input type="text" name="nm_bank" class="form-control" placeholder="......" value="<?php echo (set_value('nm_bank') ? set_value('nm_bank') : $ubah['nm_bank']);?>">
                                                <?php echo form_error('nm_bank', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-navy" title="Simpan data">
                                                <i class="fa fa-save"></i> Simpan Data
                                            </button>
                                            <a href="<?php echo base_url('master/bank');?>" class="btn btn-default" title="Kembali ke daftar">
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