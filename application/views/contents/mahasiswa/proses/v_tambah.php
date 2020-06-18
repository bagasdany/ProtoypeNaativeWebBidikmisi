    
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
                    <li class="active">Tambah Data</li>
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
                                        <label>Jenis Beasiswa</label>
                                        <div>
                                            <label class="radio-inline"><input type="radio" name="jenis_beasiswa" value="Baru">Baru</label>
                                            <label class="radio-inline"><input type="radio" name="jenis_beasiswa" value="On Going">On Going</label>
                                            <div class="text-danger"><small id="error_jenis_beasiswa"></small></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>NIM</label>
                                        <div>
                                            <input type="text" name="nim" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_nim"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Mahasiswa</label>
                                        <div>
                                            <input type="text" name="nm_mahasiswa" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_nm_mahasiswa"></small>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div>
                                            <div class="input-group date">
                                                <input type="text" name="tanggal_lahir" class="form-control pull-left tanggal" autocomplete="off" onkeydown="event.preventDefault()" value="<?php echo date('d/m/Y');?>">
                                                <div class="input-group-addon input-group-addon-tanggal">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <small class="text-danger" id="error_nm_mahasiswa"></small>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <div>
                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_tempat_lahir"></small>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div>
                                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="L">Laki-laki</label>
                                            <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="P">Perempuan</label>
                                            <div class="text-danger"><small id="error_jenis_kelamin"></small></div>
                                        </div>
                                    </div>

                                    <?php if($this->session->userdata('id_role') == 1){ ?>

                                    <div class="form-group">
                                        <label>Nama Perguruan Tinggi</label>
                                        <div>
                                            <select name="id_instansi" id="id_instansi" class="form-control" style="width: 100%;">
                                                <option value=""></option>
                                            </select>
                                            <small class="text-danger" id="error_id_instansi"></small>
                                        </div>
                                    </div>

                                    <?php } else { ?>

                                    <div class="form-group">
                                        <label>Kode Perguruan Tinggi</label>
                                        <div>
                                            <input type="text" name="kd_instansi" class="form-control" placeholder="......" value="<?php echo ($instansi ? $instansi['kd_instansi'] : '');?>" readonly>
                                            <input type="hidden" name="id_instansi" value="<?php echo ($instansi ? $instansi['id_instansi'] : 0);?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Perguruan Tinggi</label>
                                        <div>
                                            <input type="text" name="nm_instansi" class="form-control" placeholder="......" value="<?php echo ($instansi ? $instansi['nm_instansi'] : '');?>" readonly>
                                        </div>
                                    </div>

                                    <?php } ?>

                                    <div class="form-group">
                                        <label>Fakultas</label>
                                        <div>
                                            <input type="text" name="fakultas" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_fakultas"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Program Studi</label>
                                        <div>
                                            <input type="text" name="program_studi" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_program_studi"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenjang Pendidikan</label>
                                        <div>
                                            <select name="id_pendidikan" id="id_pendidikan" class="form-control" style="width:100%;">
                                                <option value=""></option>
                                            </select>
                                            <small class="text-danger" id="error_id_pendidikan"></small>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6">  

                                    <div class="form-group">
                                        <label>Semester</label>
                                        <div>
                                            <select name="semester" id="semester" class="form-control">
                                                <option value="">- PILIH -</option>
                                                <?php
                                                for($i = 1; $i <= 8; $i++){
                                                    echo '<option value="'.$i.'">Semester '.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                            <small class="text-danger" id="error_semester"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>IPK</label>
                                        <div>
                                            <input type="text" name="ipk" class="form-control ipk" placeholder="......">
                                            <small class="text-danger" id="error_ipk"></small>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Nomor HP Mahasiswa</label>
                                        <div>
                                            <input type="text" name="no_hp" class="form-control hp" placeholder="......">
                                            <small class="text-danger" id="error_no_hp"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div>
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="......" rows="3"></textarea>
                                            <small class="text-danger" id="error_alamat"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nomor Rekening Mahasiswa</label>
                                        <div>
                                            <input type="text" name="no_rekening_mahasiswa" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_no_rekening_mahasiswa"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Bank</label>
                                        <div>
                                            <select name="id_bank" id="id_bank" class="form-control" style="width: 100%;">
                                                <option value=""></option>
                                            </select>
                                            <small class="text-danger" id="error_id_bank"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Cabang Bank</label>
                                        <div>
                                            <input type="text" name="cabang_bank" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_cabang_bank"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Berkas</label>
                                        <div>
                                            <input type="file" name="lampiran" id="lampiran" class="form-control" placeholder="......"  onchange="validasi_berkas(this)">
                                            <small class="text-danger" id="error_lampiran"></small>
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
                                        <label>Nama Orang Tua</label>
                                        <div>
                                            <input type="text" name="nama_orang_tua" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_nama_orang_tua"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan Orang Tua</label>
                                        <div>
                                            <input type="text" name="pekerjaan_orang_tua" class="form-control" placeholder="......">
                                            <small class="text-danger" id="error_pekerjaan_orang_tua"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Penghasilan Orang Tua</label>
                                        <div>
                                            <input type="text" name="penghasilan_orang_tua" class="form-control uang" placeholder="......">
                                            <small class="text-danger" id="error_penghasilan_orang_tua"></small>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Jumlah Tanggungan</label>
                                        <div>
                                            <input type="text" name="jumlah_tanggungan" class="form-control nomor" placeholder="......">
                                            <small class="text-danger" id="error_jumlah_tanggungan"></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor HP Orang Tua</label>
                                        <div>
                                            <input type="text" name="no_hp_orang_tua" class="form-control hp" placeholder="......">
                                            <small class="text-danger" id="error_no_hp_orang_tua"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="callout callout-info">
                                        <p>Informasi Prestasi</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button type="button" class="btn bg-navy" title="Tambah data" onclick="tambah_prestasi()">
                                                    <i class="fa fa-plus"></i> Tambah Prestasi
                                                </button>
                                            </div>
                                        </div>  
                                    </div>
                                    <div id="informasi_prestasi">
                                        <div class="loop-prestasi" id="loop_prestasi_1">                                            
                                            <div class="form-group">
                                                <label>Bidang Prestasi</label>
                                                <div style="padding-bottom: 12px;">
                                                    <label class="radio-inline"><input type="radio" name="bidang_prestasi_1" value="Akademik" checked>Akademik</label>
                                                    <label class="radio-inline"><input type="radio" name="bidang_prestasi_1" value="Non Akademik">Non Akademik</label>
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Nama Prestasi</label>
                                                <div>
                                                    <input type="text" name="nama_prestasi_1" class="form-control" placeholder="......">
                                                    <input type="hidden" name="prestasi[]" value="1">
                                                </div>
                                            </div>                                          
                                            <div class="form-group">
                                                <label>Tingkat Prestasi</label>
                                                <div>
                                                    <select name="tingkat_prestasi_1" class="form-control">
                                                        <option value="">- PILIH -</option>
                                                        <option value="Internasional">Internasional</option>
                                                        <option value="Nasional">Nasional</option>
                                                        <option value="Regional">Regional</option>
                                                    </select>
                                                </div>
                                            </div>                                      
                                            <div class="form-group">
                                                <label>Juara Ke</label>
                                                <div>
                                                    <select name="juara_ke_1" class="form-control">
                                                        <option value="">- PILIH -</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger" onclick="hapus_prestasi(1)">
                                                    <i class="fa fa-trash"></i> Hapus Prestasi
                                                </button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="callout callout-info">
                                        <p>Informasi Organisasi</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button type="button" class="btn bg-navy" title="Tambah data" onclick="tambah_organisasi()">
                                                    <i class="fa fa-plus"></i> Tambah Organisasi
                                                </button>
                                            </div>
                                        </div>  
                                    </div>
                                    <div id="informasi_organisasi">
                                        <div class="loop-organisasi" id="loop_organisasi_1">                                       
                                            <div class="form-group">
                                                <label>Nama Organisasi</label>
                                                <div>
                                                    <input type="text" name="nama_organisasi_1" class="form-control" placeholder="......">
                                                    <input type="hidden" name="organisasi[]" value="1">
                                                </div>
                                            </div>                                          
                                            <div class="form-group">
                                                <label>Status Jabatan</label>
                                                <div>
                                                    <select name="id_status_jabatan_1" class="form-control id_status_jabatan" style="width:100%;">
                                                        <option value="">- PILIH -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Periode</label>
                                                <div>
                                                    <input type="text" name="periode_1" class="form-control" placeholder="......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger" onclick="hapus_organisasi(1)">
                                                    <i class="fa fa-trash"></i> Hapus Organisasi
                                                </button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group text-center">
                                        <p class="spacer">&nbsp;</p>
                                        <button type="submit" class="btn bg-navy" title="Simpan data" onclick="return cek_proses()">
                                            <i class="fa fa-save"></i> Simpan Data
                                        </button>
                                        <a href="<?php echo base_url('mahasiswa/data');?>" class="btn btn-default" title="Kembali ke daftar">
                                            <i class="fa fa-reply"></i> Kembali
                                        </a>
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
    <script>
        var jumlah_prestasi = $(".loop-prestasi").length;
        var jumlah_organisasi = $(".loop-organisasi").length;

        function tambah_prestasi(){            
            jumlah_prestasi++;
            var konten = '<div class="loop-prestasi" id="loop_prestasi_'+jumlah_prestasi+'">'+
                            '<div class="form-group">'+
                                '<label>Bidang Prestasi</label>'+
                                '<div style="padding-bottom: 12px;">'+
                                    '<label class="radio-inline"><input type="radio" name="bidang_prestasi_'+jumlah_prestasi+'" value="Akademik" checked>Akademik</label>'+
                                    '<label class="radio-inline"><input type="radio" name="bidang_prestasi_'+jumlah_prestasi+'" value="Non Akademik">Non Akademik</label>'+
                                '</div>'+
                            '</div>'+                                            
                            '<div class="form-group">'+
                                '<label>Nama Prestasi</label>'+
                                '<div>'+
                                    '<input type="text" name="nama_prestasi_'+jumlah_prestasi+'" class="form-control" placeholder="......">'+
                                    '<input type="hidden" name="prestasi[]" value="'+jumlah_prestasi+'">'+
                                '</div>'+
                            '</div> '+                                         
                            '<div class="form-group">'+
                                '<label>Tingkat Prestasi</label>'+
                                '<div>'+
                                    '<select name="tingkat_prestasi_'+jumlah_prestasi+'" class="form-control">'+
                                        '<option value="">- PILIH -</option>'+
                                        '<option value="Internasional">Internasional</option>'+
                                        '<option value="Nasional">Nasional</option>'+
                                        '<option value="Regional">Regional</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+                                      
                            '<div class="form-group">'+
                                '<label>Juara Ke - </label>'+
                                '<div>'+
                                    '<select name="juara_ke_'+jumlah_prestasi+'" class="form-control">'+
                                        '<option value="">- PILIH -</option>'+
                                        '<option value="1">1</option>'+
                                        '<option value="2">2</option>'+
                                        '<option value="3">3</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<button type="button" class="btn btn-danger" onclick="hapus_prestasi('+jumlah_prestasi+')">'+
                                    '<i class="fa fa-trash"></i> Hapus Prestasi'+
                                '</button>'+
                            '</div>'+
                        '</div>';
            $("#informasi_prestasi").append(konten);
            Pace.restart();
        }

        function hapus_prestasi(item){
            if(confirm('Apakah Anda yakin ingin menghapus data ini?')){
                $("#loop_prestasi_" + item).remove();
                Pace.restart();
            }
        }

        function tambah_organisasi(){
            jumlah_organisasi++;
            var konten = '<div class="loop-organisasi" id="loop_organisasi_'+jumlah_organisasi+'">'+
                            '<div class="form-group">'+
                                '<label>Nama Organisasi</label>'+
                                '<div>'+
                                    '<input type="text" name="nama_organisasi_'+jumlah_organisasi+'" class="form-control" placeholder="......">'+
                                    '<input type="hidden" name="organisasi[]" value="'+jumlah_organisasi+'">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label>Status Jabatan</label>'+
                                '<div>'+
                                    '<select name="id_status_jabatan_'+jumlah_organisasi+'" class="form-control id_status_jabatan" style="width:100%;">'+
                                        '<option value="">- PILIH -</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label>Periode</label>'+
                                '<div>'+
                                    '<input type="text" name="periode_'+jumlah_organisasi+'" class="form-control" placeholder="......">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<button type="button" class="btn btn-danger" onclick="hapus_organisasi('+jumlah_organisasi+')">'+
                                    '<i class="fa fa-trash"></i> Hapus Organisasi'+
                                '</button>'+
                            '</div>'+
                        '</div>';
            $("#informasi_organisasi").append(konten);
        
            $(".id_status_jabatan").select2({
                placeholder: '- PILIH -',
                allowClear: true,
                ajax:{
                    url: "<?php echo base_url('mahasiswa/proses/ajax_autocomplete_status_jabatan');?>",
                    dataType: "JSON",
                    data: function(params){
                       return {
                            q: params.term
                        };
                    },
                    processResults: function(data){
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });

            Pace.restart();
        }

        function hapus_organisasi(item){
            if(confirm('Apakah Anda yakin ingin menghapus data ini?')){
                $("#loop_organisasi_" + item).remove();
                Pace.restart();
            }
        }

        function cek_proses(){
            if($('input[name="jenis_beasiswa"]:checked').length == 0) {
                swal('Mohon maaf!','Jenis beasiswa wajib dipilih!','warning');
                return false;
            }

            if($.trim($('input[name="nim"]').val()) == ''){
                $('input[name="nim"]').focus();
                swal('Mohon maaf!','NIM wajib diisi!','warning');
                return false;
            } else {
                $.get("<?php echo base_url('mahasiswa/proses/ajax_cek_nim');?>", {id_instansi:$('input[name="id_instansi"]').val(), nim:$('input[name="nim"]').val()}, function(response) {
                    if(response != 0){
                        $('input[name="nim"]').focus();
                        swal('Mohon maaf!','NIM sudah tersedia!','warning');
                        return false;
                    }
                });
            }

            if($.trim($('input[name="nim"]').val()) == ''){
                $('input[name="nim"]').focus();
                swal('Mohon maaf!','NIM wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="nm_mahasiswa"]').val()) == ''){
                $('input[name="nm_mahasiswa"]').focus();
                swal('Mohon maaf!','Nama mahasiswa wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="tanggal_lahir"]').val()) == ''){
                $('input[name="tanggal_lahir"]').focus();
                swal('Mohon maaf!','Tanggal lahir wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="tempat_lahir"]').val()) == ''){
                $('input[name="tempat_lahir"]').focus();
                swal('Mohon maaf!','Tempat lahir wajib diisi!','warning');
                return false;
            }

            if($('input[name="jenis_kelamin"]:checked').length == 0) {
                swal('Mohon maaf!','Jenis kelamin wajib dipilih!','warning');
                return false;
            }

            if($.trim($('input[name="fakultas"]').val()) == ''){
                $('input[name="fakultas"]').focus();
                swal('Mohon maaf!','Fakultas wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="program_studi"]').val()) == ''){
                $('input[name="program_studi"]').focus();
                swal('Mohon maaf!','Program studi wajib diisi!','warning');
                return false;
            }

            if($.trim($('#id_pendidikan').val()) == ''){
                $('input[name="id_pendidikan"]').focus();
                swal('Mohon maaf!','Jenjang pendidikan wajib diisi!','warning');
                return false;
            }

            if($.trim($('#semester').val()) == ''){
                $('input[name="semester"]').focus();
                swal('Mohon maaf!','Semester wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="ipk"]').val()) == ''){
                $('input[name="ipk"]').focus();
                swal('Mohon maaf!','IPK wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="no_hp"]').val()) == ''){
                $('input[name="no_hp"]').focus();
                swal('Mohon maaf!','Nomor HP mahasiswa wajib diisi!','warning');
                return false;
            }

            if($.trim($('#alamat').val()) == ''){
                $('input[name="alamat"]').focus();
                swal('Mohon maaf!','Alamat wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="no_rekening_mahasiswa"]').val()) == ''){
                $('input[name="no_rekening_mahasiswa"]').focus();
                swal('Mohon maaf!','Nomor rekening mahasiswa wajib diisi!','warning');
                return false;
            }

            if($.trim($('#id_bank').val()) == ''){
                $('input[name="id_bank"]').focus();
                swal('Mohon maaf!','Bank wajib dipilih!','warning');
                return false;
            }

            if($.trim($('input[name="cabang_bank"]').val()) == ''){
                $('input[name="cabang_bank"]').focus();
                swal('Mohon maaf!','Cabang bank wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="nama_orang_tua"]').val()) == ''){
                $('input[name="nama_orang_tua"]').focus();
                swal('Mohon maaf!','Nama orang tua wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="pekerjaan_orang_tua"]').val()) == ''){
                $('input[name="pekerjaan_orang_tua"]').focus();
                swal('Mohon maaf!','Pekerjaan orang tua wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="penghasilan_orang_tua"]').val()) == ''){
                $('input[name="penghasilan_orang_tua"]').focus();
                swal('Mohon maaf!','Penghasilan orang tua wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="jumlah_tanggungan"]').val()) == ''){
                $('input[name="jumlah_tanggungan"]').focus();
                swal('Mohon maaf!','Jumlah tanggungan wajib diisi!','warning');
                return false;
            }

            if($.trim($('input[name="no_hp_orang_tua"]').val()) == ''){
                $('input[name="no_hp_orang_tua"]').focus();
                swal('Mohon maaf!','Nomor HP orang tua wajib diisi!','warning');
                return false;
            }
        }

        function validasi_berkas(objFileControl){
            var file  = objFileControl.value;
            var len = file.length;
            var ext = file.slice(len - 4, len);
            var str = ext.replace('.', '');
            var accept_file = ['zip', 'rar'];

            if($.inArray(str, accept_file) !== -1){
                formOK = true;
            } else {
                formOK = false;
                swal("Mohon Maaf", "Tipe file yang dijinkan hanya .zip atau .rar!", "warning");
                $(objFileControl).val(null);
            }
        }

        $("#id_pendidikan").select2({
            placeholder: '- PILIH -',
            allowClear: true,
            ajax:{
                url: "<?php echo base_url('mahasiswa/proses/ajax_autocomplete_pendidikan');?>",
                dataType: "JSON",
                data: function(params){
                   return {
                        q: params.term
                    };
                },
                processResults: function(data){
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $("#id_bank").select2({
            placeholder: '- PILIH -',
            allowClear: true,
            ajax:{
                url: "<?php echo base_url('mahasiswa/proses/ajax_autocomplete_bank');?>",
                dataType: "JSON",
                data: function(params){
                   return {
                        q: params.term
                    };
                },
                processResults: function(data){
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        
        $(".id_status_jabatan").select2({
            placeholder: '- PILIH -',
            allowClear: true,
            ajax:{
                url: "<?php echo base_url('mahasiswa/proses/ajax_autocomplete_status_jabatan');?>",
                dataType: "JSON",
                data: function(params){
                   return {
                        q: params.term
                    };
                },
                processResults: function(data){
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        
        $("#id_instansi").select2({
            placeholder: '- PILIH -',
            allowClear: true,
            ajax:{
                url: "<?php echo base_url('mahasiswa/proses/ajax_autocomplete_instansi');?>",
                dataType: "JSON",
                data: function(params){
                   return {
                        q: params.term
                    };
                },
                processResults: function(data){
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    </script>
</body>
</html>