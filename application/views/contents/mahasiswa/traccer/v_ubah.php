    
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
                                        <script>
                                            var $newOption = $("<option selected='selected'></option>").val("<?php echo $ubah['id_instansi'];?>").text("<?php echo $ubah['kd_instansi'];?> - <?php echo $ubah['nm_instansi'];?>");
                                            $("#id_instansi").append($newOption).trigger('change');
                                        </script>

                                        <?php } else { ?>
                                            <input type="hidden" name="id_instansi" id="id_instansi" value="<?php echo $this->session->userdata('id_instansi');?>">
                                        <?php } ?>

                                        <div class="form-group">
                                            <label>Nama Mahasiswa</label>
                                            <div>
                                                <select name="id_mahasiswa" id="id_mahasiswa" class="form-control" style="width:100%;">
                                                    <option value="">- PILIH -</option>
                                                </select>
                                                <?php echo form_error('id_mahasiswa', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>      
                                        <script>
                                            var $newOption = $("<option selected='selected'></option>").val("<?php echo $ubah['id_mahasiswa'];?>").text("<?php echo $ubah['nm_mahasiswa'];?>");
                                            $("#id_mahasiswa").append($newOption).trigger('change');
                                        </script>                                  
                                        <div class="form-group">
                                            <label>Gelar Terakhir</label>
                                            <div>
                                                <input type="text" name="gelar_terakhir" class="form-control" placeholder="......" value="<?php echo (set_value('gelar_terakhir') ? set_value('gelar_terakhir') : $ubah['gelar_terakhir']);?>">
                                                <?php echo form_error('gelar_terakhir', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lulus</label>
                                            <div>
                                                <div class="input-group date">
                                                    <input type="text" name="tanggal_lulus" class="form-control pull-left tanggal" autocomplete="off" onkeydown="event.preventDefault()" value="<?php echo (set_value('tanggal_lulus') ? set_value('tanggal_lulus') : ($ubah['tanggal_lulus'] ? date('d/m/Y', strtotime($ubah['tanggal_lulus'])) : date('d/m/Y')));?>">
                                                    <div class="input-group-addon input-group-addon-tanggal">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <?php echo form_error('tanggal_lulus', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <div>
                                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="......" value="<?php echo (set_value('nama_perusahaan') ? set_value('nama_perusahaan') : $ubah['nama_perusahaan']);?>">
                                                <?php echo form_error('nama_perusahaan', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perusahaan</label>
                                            <div>
                                                <textarea name="alamat_perusahaan" class="form-control" rows="5" placeholder="......"><?php echo (set_value('alamat_perusahaan') ? set_value('alamat_perusahaan') : $ubah['alamat_perusahaan']);?></textarea>
                                                <?php echo form_error('alamat_perusahaan', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Posisi/Jabatan</label>
                                            <div>
                                                <input type="text" name="jabatan" class="form-control" placeholder="......" value="<?php echo (set_value('jabatan') ? set_value('jabatan') : $ubah['jabatan']);?>">
                                                <?php echo form_error('jabatan', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <div>
                                                <div class="input-group date">
                                                    <input type="text" name="tanggal_masuk" class="form-control pull-left tanggal" autocomplete="off" onkeydown="event.preventDefault()" value="<?php echo (set_value('tanggal_masuk') ? set_value('tanggal_masuk') : ($ubah['tanggal_masuk'] ? date('d/m/Y', strtotime($ubah['tanggal_masuk'])) : date('d/m/Y')) );?>">
                                                    <div class="input-group-addon input-group-addon-tanggal">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <?php echo form_error('tanggal_masuk', '<small class="text-danger">','</small>');?>
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
    <script>
        $(document).on("change", "#id_instansi",function() {
            $("#id_mahasiswa").empty().trigger('change');
        });

        $("#id_instansi").select2({
            placeholder: '- PILIH -',
            allowClear: true,
            ajax:{
                url: "<?php echo base_url('mahasiswa/traccer/ajax_autocomplete_instansi');?>",
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
        
        $("#id_mahasiswa").select2({
            placeholder: '- PILIH -',
            allowClear: true,
            ajax:{
                url: "<?php echo base_url('mahasiswa/traccer/ajax_autocomplete_mahasiswa');?>",
                dataType: "JSON",
                data: function(params){
                   return {
                        q: params.term,
                        id_instansi: $("#id_instansi").val()
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