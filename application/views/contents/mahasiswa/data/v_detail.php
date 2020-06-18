    
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
                    <li class="active">Detail Mahasiswa</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo current_url();?>" method="post" id="MyForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="callout callout-info">
                                        <p><strong>Informasi Mahasiswa</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="text-primary">Jenis Beasiswa</label>
                                        <div>
                                            <?php echo ($ubah['jenis_beasiswa'] ? $ubah['jenis_beasiswa'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">NIM</label>
                                        <div>
                                            <?php echo ($ubah['nim'] ? $ubah['nim'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Nama Mahasiswa</label>
                                        <div>
                                            <?php echo ($ubah['nm_mahasiswa'] ? $ubah['nm_mahasiswa'] : '-');?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="text-primary">Tanggal Lahir</label>
                                        <div>
                                            <?php echo ($ubah['tanggal_lahir'] ? date('d M Y', strtotime($ubah['tanggal_lahir'])) : '-');?>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="text-primary">Tempat Lahir</label>
                                        <div>
                                            <?php echo ($ubah['tempat_lahir'] ? $ubah['tempat_lahir'] : '-');?>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="text-primary">Jenis Kelamin</label>
                                        <div>
                                            <?php
                                            if($ubah['jenis_kelamin'] == 'L'){
                                                echo 'Laki-laki';
                                            } else if($ubah['jenis_kelamin'] == 'P'){
                                                echo 'Perempuan';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-primary">Kode Perguruan Tinggi</label>
                                        <div>
                                            <?php echo ($ubah['kd_instansi'] ? $ubah['kd_instansi'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Nama Perguruan Tinggi</label>
                                        <div>
                                            <?php echo ($ubah['nm_instansi'] ? $ubah['nm_instansi'] : '-');?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-primary">Fakultas</label>
                                        <div>
                                            <?php echo ($ubah['fakultas'] ? $ubah['fakultas'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Program Studi</label>
                                        <div>
                                            <?php echo ($ubah['program_studi'] ? $ubah['program_studi'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Jenjang Pendidikan</label>
                                        <div>
                                            <?php echo ($ubah['nm_pendidikan'] ? $ubah['nm_pendidikan'] : '-');?>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6">  

                                    <div class="form-group">
                                        <label class="text-primary">Semester</label>
                                        <div>
                                            <?php echo ($ubah['semester'] ? 'Semester '.$ubah['semester'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">IPK</label>
                                        <div>
                                            <?php 
                                            if($ubah['status'] == 1){
                                                $ipk = '<strong class="text-aqua">'.$ubah['ipk'].'</strong>';
                                            } else {
                                                $ipk = '<strong class="text-danger">'.$ubah['ipk'].'</strong>';
                                                $ipk .= '&nbsp;&nbsp;&nbsp;<span class="label bg-red">Perlu Pembinaan</span>';
                                            }
                                            echo $ipk;
                                            ?>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="text-primary">Nomor HP Mahasiswa</label>
                                        <div>
                                            <?php echo ($ubah['no_hp'] ? $ubah['no_hp'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Alamat</label>
                                        <div>
                                            <?php echo ($ubah['alamat'] ? nl2br($ubah['alamat']) : '-');?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="text-primary">Nomor Rekening Mahasiswa</label>
                                        <div>
                                            <?php echo ($ubah['no_rekening_mahasiswa'] ? $ubah['no_rekening_mahasiswa'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Nama Bank</label>
                                        <div>
                                            <?php echo ($ubah['nm_bank'] ? $ubah['nm_bank'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Cabang Bank</label>
                                        <div>
                                            <?php echo ($ubah['cabang_bank'] ? $ubah['cabang_bank'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Berkas</label>
                                        <div>
                                            <?php
                                            $path = './uploads/';
                                            if(file_exists($path . $ubah['lampiran'])){
                                                echo '<div class="alert alert-warning">
                                                        <a target="_blank" href="'.base_url('uploads/' . $ubah['lampiran']).'">'.$ubah['lampiran'].'</a>
                                                    </div>';
                                            } else {
                                                echo '-';
                                            }
                                            ?>  
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="callout callout-info">
                                        <p><strong>Informasi Orang Tua</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                     <div class="form-group">
                                        <label class="text-primary">Nama Orang Tua</label>
                                        <div>
                                            <?php echo ($ubah['nama_orang_tua'] ? $ubah['nama_orang_tua'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Pekerjaan Orang Tua</label>
                                        <div>
                                            <?php echo ($ubah['pekerjaan_orang_tua'] ? $ubah['pekerjaan_orang_tua'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Penghasilan Orang Tua</label>
                                        <div>
                                            <?php echo ($ubah['penghasilan_orang_tua'] ? $ubah['penghasilan_orang_tua'] : '-');?>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="text-primary">Jumlah Tanggungan</label>
                                        <div>
                                            <?php echo ($ubah['jumlah_tanggungan'] ? $ubah['jumlah_tanggungan'] : '-');?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Nomor HP Orang Tua</label>
                                        <div>
                                            <?php echo ($ubah['no_hp_orang_tua'] ? $ubah['no_hp_orang_tua'] : '-');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="callout callout-info">
                                        <p>Informasi Prestasi</p>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Bidang Prestasi</th>
                                                    <th>Nama Prestasi</th>
                                                    <th>Tingkat Prestasi</th>
                                                    <th class="text-center">Juara Ke</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($prestasi){
                                                    $no = 1;
                                                    foreach($prestasi as $row){
                                                        echo '<tr>
                                                                <td class="text-center" width="40">'.$no.'</td>
                                                                <td>'.$row['bidang_prestasi'].'</td>
                                                                <td>'.$row['nama_prestasi'].'</td>
                                                                <td>'.$row['tingkat_prestasi'].'</td>
                                                                <td class="text-center">'.$row['juara_ke'].'</td>
                                                            </tr>';
                                                        $no++;
                                                    }
                                                } else {
                                                    echo '<tr>
                                                            <td colspan="10" class="text-center">Data belum tersedia</td>
                                                        </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="callout callout-info">
                                        <p>Informasi Organisasi</p>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama Organisasi</th>
                                                    <th>Status Jabatan</th>
                                                    <th>Periode</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($organisasi){
                                                    $no = 1;
                                                    foreach($organisasi as $row){
                                                        echo '<tr>
                                                                <td class="text-center" width="40">'.$no.'</td>
                                                                <td>'.$row['nama_organisasi'].'</td>
                                                                <td>'.$row['nm_status_jabatan'].'</td>
                                                                <td>'.$row['periode'].'</td>
                                                            </tr>';
                                                        $no++;
                                                    }
                                                } else {
                                                    echo '<tr>
                                                            <td colspan="10" class="text-center">Data belum tersedia</td>
                                                        </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group text-center">
                                        <p class="spacer">&nbsp;</p>

                                        <?php if($this->uri->segment(6) == 'bina') {?>
                                             <a href="<?php echo base_url('mahasiswa/bina');?>" class="btn btn-default" title="Kembali ke daftar">
                                                <i class="fa fa-reply"></i> Kembali
                                            </a>
                                        <?php } else { ?>
                                             <a href="<?php echo base_url('mahasiswa/data');?>" class="btn btn-default" title="Kembali ke daftar">
                                                <i class="fa fa-reply"></i> Kembali
                                            </a>
                                        <?php } ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('partials/v_copyright');?>

    </div>

    <?php $this->load->view('partials/v_footer');?>
</body>
</html>