    
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
                                            <label>Username</label>
                                            <div>
                                                <input type="text" name="username" class="form-control" placeholder="......" value="<?php echo (set_value('username') ? set_value('username') : $ubah['username']);?>">
                                                <?php echo form_error('username', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div>
                                                <small class="text-muted">Abaikan isian password jika tidak ingin diubah</small>
                                                <input type="password" name="password" class="form-control" placeholder="......" value="<?php echo (set_value('password') ? set_value('password') : '');?>">
                                                <?php echo form_error('password', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <div>
                                                <input type="text" name="nm_lengkap" class="form-control" placeholder="......" value="<?php echo (set_value('nm_lengkap') ? set_value('nm_lengkap') : $ubah['nm_lengkap']);?>">
                                                <?php echo form_error('nm_lengkap', '<small class="text-danger">','</small>');?>
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
                                            <label>Role Pengguna</label>
                                            <div>
                                                <select name="id_role" id="id_role" class="form-control" style="width:100%;">
                                                    <option value="">- PILIH -</option>
                                                </select>
                                                <?php echo form_error('id_role', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Perguruan Tinggi</label>
                                            <div>
                                                <select name="id_instansi" id="id_instansi" class="form-control" style="width:100%;">
                                                    <option value="">- PILIH -</option>
                                                </select>
                                                <?php echo form_error('id_instansi', '<small class="text-danger">','</small>');?>
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
    <script>
        $("#id_role").select2({
            placeholder: '- PILIH -',
            allowClear: true,
            ajax:{
                url: "<?php echo base_url('master/pengguna/ajax_autocomplete_role');?>",
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
                url: "<?php echo base_url('master/pengguna/ajax_autocomplete_instansi');?>",
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

        var $newOption = $("<option selected='selected'></option>").val("<?php echo $ubah['id_role'];?>").text("<?php echo $ubah['role'];?>");
        $("#id_role").append($newOption).trigger('change');
        
        var $newOption = $("<option selected='selected'></option>").val("<?php echo $ubah['id_instansi'];?>").text("<?php echo $ubah['nm_instansi'];?>");
        $("#id_instansi").append($newOption).trigger('change');
    </script>
</body>
</html>