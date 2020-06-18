
    <?php $this->load->view('partials/v_header');?>
    <style type="text/css">
        .content-wrapper, .main-footer{
            margin-left: 0px;
        }
        #tampil_tanggal_waktu{
            display: none;
        }
    </style>
    <div class="wrapper">
        <div id="tampil_tanggal_waktu" class="text-center"><?php echo date('d F Y | H:i:s');?></div>
        <div class="content-wrapper">
            <section class="content">
                <div class="error-page">
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman tidak ditemukan.</h3>

                    <p>
                        Kami tidak dapat menemukan halaman yang Anda cari.
                        Sementara itu, kamu dapat <a href="<?php echo base_url();?>">kembali ke halaman utama</a>.
                    </p>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('partials/v_copyright');?>

    </div>

    <?php $this->load->view('partials/v_footer');?>
    <script>
        $("body").removeClass('skin-blue-light fixed sidebar-mini  pace-done');
    </script>
</body>
</html>