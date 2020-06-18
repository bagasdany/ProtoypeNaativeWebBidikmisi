
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
                        <a href="<?php echo base_url('profil');?>">Profil</a>
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
                                            <label>Password Lama</label>
                                            <div>
                                                <input type="password" name="password_lama" class="form-control" placeholder="......" value="<?php echo (set_value('password_lama') ? set_value('password_lama') : '');?>">
                                                <?php echo form_error('password_lama', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <div>
                                                <input type="password" name="password" class="form-control" placeholder="......" value="<?php echo (set_value('password') ? set_value('password') : '');?>">
                                                <?php echo form_error('password', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password Baru</label>
                                            <div>
                                                <input type="password" name="konfirmasi_password" class="form-control" placeholder="......" value="<?php echo (set_value('konfirmasi_password') ? set_value('konfirmasi_password') : '');?>">
                                                <?php echo form_error('password', '<small class="text-danger">','</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-navy" onclick="return cek_proses()" title="Simpan data">
                                                <i class="fa fa-save"></i> Simpan Data
                                            </button>
                                            <a href="<?php echo base_url('profil');?>" class="btn btn-default" title="Kembali ke Profil">
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
        function cek_proses() {

            if($.trim($('input[name="password_lama"]').val()) == ''){
                $('input[name="password_lama"]').focus();
                swal('Mohon maaf!','Password wajib diisi!','warning');
                return false;
            } else {
                $.post("<?php echo base_url('profil/ajax_cek_password_lama');?>", {password:$('input[name="password_lama"]').val(), nim:$('input[name="nim"]').val()}, function(response) {
                    if(response != 0){
                        $('input[name="password_lama"]').focus();
                        swal('Mohon maaf!','Password lama salah!','warning');
                        return false;
                    }
                });
            }

            if($.trim($('input[name="password"]').val()) == ''){
                $('input[name="password"]').focus();
                swal('Mohon maaf!','Password baru wajib diisi!','warning');
                return false;
            } else  if($.trim($('input[name="konfirmasi_password"]').val()) == ''){
                $('input[name="konfirmasi_password"]').focus();
                swal('Mohon maaf!','Konfirmasi password wajib diisi!','warning');
                return false;
            } else if($.trim($('input[name="password"]').val()) != $.trim($('input[name="konfirmasi_password"]').val())){
                $('input[name="konfirmasi_password"]').focus();
                swal('Mohon maaf!','Konfirmasi password salah wajib diisi!','warning');
                return false;
            }


        }
    </script>
</body>
</html>