
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
                        <a href="<?php echo base_url('master/instansi');?>">Daftar Perguruan Tinggi</a>
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
                                            <label>Kode Perguruan Tinggi</label>
                                            <div>
                                                <input type="text" name="kd_instansi" class="form-control" placeholder="......" maxlength="10" value="<?php echo (set_value('kd_instansi') ? set_value('kd_instansi') : $ubah['kd_instansi']);?>">
                                                <?php echo form_error('kd_instansi', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Perguruan Tinggi</label>
                                            <div>
                                                <input type="text" name="nm_instansi" class="form-control" placeholder="......" value="<?php echo (set_value('nm_instansi') ? set_value('nm_instansi') : $ubah['nm_instansi']);?>">
                                                <?php echo form_error('nm_instansi', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perguruan Tinggi</label>
                                            <div>
                                                <textarea name="alamat_instansi" class="form-control" rows="5" placeholder="......"><?php echo (set_value('alamat_instansi') ? set_value('alamat_instansi') : $ubah['alamat_instansi']);?></textarea>
                                                <?php echo form_error('alamat_instansi', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div>
                                                <input type="text" name="email" class="form-control" placeholder="......" value="<?php echo (set_value('email') ? set_value('email') : $ubah['email']);?>">
                                                <?php echo form_error('email', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <div>
                                                <input type="text" name="no_telepon" class="form-control" placeholder="......" value="<?php echo (set_value('no_telepon') ? set_value('no_telepon') : $ubah['no_telepon']);?>">
                                                <?php echo form_error('no_telepon', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>No. Fax</label>
                                            <div>
                                                <input type="text" name="no_fax" class="form-control" placeholder="......" value="<?php echo (set_value('no_fax') ? set_value('no_fax') : $ubah['no_fax']);?>">
                                                <?php echo form_error('no_fax', '<small class="text-danger">','</small>');?>
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
                                            <a href="<?php echo base_url('master/instansi');?>" class="btn btn-default" title="Kembali ke daftar">
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