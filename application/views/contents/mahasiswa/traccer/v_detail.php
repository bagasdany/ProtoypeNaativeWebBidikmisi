    
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
                        <a href="javascript:;">Mahasiswa</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('mahasiswa/traccer');?>">Mahasiswa Traccer Studi</a>
                    </li>
                    <li class="active">Tambah Data</li>
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
                                            <label class="text-primary">Nama Mahasiswa</label>
                                            <div>
                                                <?php echo ($ubah['nm_mahasiswa'] ? $ubah['nm_mahasiswa'] : '-');?>
                                            </div>
                                        </div>                                   
                                        <div class="form-group">
                                            <label class="text-primary">Gelar Terakhir</label>
                                            <div>
                                                <?php echo ($ubah['gelar_terakhir'] ? $ubah['gelar_terakhir'] : '-');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Tanggal Lulus</label>
                                            <div>
                                                <?php echo ($ubah['tanggal_lulus'] ? date('d M Y', strtotime($ubah['tanggal_lulus'])) : date('d/m/Y'));?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="text-primary">Nama Perusahaan</label>
                                            <div>
                                                <?php echo ($ubah['nama_perusahaan'] ? $ubah['nama_perusahaan'] : '-');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Alamat Perusahaan</label>
                                            <div>
                                                <?php echo ($ubah['alamat_perusahaan'] ? nl2br($ubah['alamat_perusahaan']) : '-');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Posisi/Jabatan</label>
                                            <div>
                                                <?php echo ($ubah['jabatan'] ? $ubah['jabatan'] : '-');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary">Tanggal Masuk</label>
                                            <div>
                                                <?php echo ($ubah['tanggal_masuk'] ? date('d M Y', strtotime($ubah['tanggal_masuk'])) : date('d/m/Y'));?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <a href="<?php echo base_url('mahasiswa/traccer');?>" class="btn btn-default" title="Kembali ke daftar">
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