
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/pace/pace.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/sweetalert/js/sweetalert.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/input-mask/jquery.inputmask.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/input-mask/jquery.inputmask.extensions.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/highcharts/highcharts.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/highcharts/highcharts-3d.js');?>"></script>
    <script src="<?php echo base_url('assets/bower_components/highcharts/modules/exporting.js');?>"></script>
    <script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
    <script>
        $(document).ready(function() {

            $('.tanggal').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
            })

            $(document).on("click",".input-group-addon-tanggal",function() {
                $(this).prev().focus();
            });

            $(".ipk").inputmask({
                'alias': 'decimal',
                'mask': "9[.99]",
                rightAlign: true
            });

            $(".hp").inputmask({
                mask: "9999-9999-99999",
                greedy: false,
                definitions: {
                    '*': {
                        alidator: "[0-9]"
                    }
                },
                rightAlign: true
            });

            $(".nomor").inputmask({
                mask: "99",
            });

            $(".uang").inputmask({
                'alias': 'decimal',
                'mask': "999999999999999",
                rightAlign: true
            });

            $('.sidebar-menu').tree();

            $(document).ajaxStart(function () {
                Pace.restart();
            });

            <?php
            if($this->session->userdata('informasi')){
               echo 'swal("Tersimpan!", "'.$this->session->userdata('informasi').'", "success");'; 
               $this->session->unset_userdata('informasi');
            }
            ?>

            $(document).on('click', '.btn-sign-out', function () {
                swal({
                    title: "Apakah Anda yakin ingin keluar dari sistem?",
                    text: "Anda harus login kembali untuk menggunakan sistem ini.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#177156",
                    confirmButtonText: "Ya!",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function(){
                    window.location.href='<?php echo base_url('authentication/do-logout');?>';
                });
            });
        });

        function setDate() {
            const now = new Date();
            const mm = now.getMonth();
            const dd = now.getDate();
            const yyyy = now.getFullYear();
            const secs = now.getSeconds();
            const mins = now.getMinutes();
            const hrs = now.getHours();
            const monthName = [
                'January'
                ,'February'
                ,'March'
                ,'April'
                ,'May'
                ,'June'
                ,'July'
                ,'August'
                ,'September'
                ,'October'
                ,'November'
                ,'December'
            ];
            
            document.getElementById("tampil_tanggal_waktu").innerHTML = dd + ' ' + monthName[mm] + ' ' + yyyy + ' | ' + checkTime(hrs) + ':' + checkTime(mins) + ':' + checkTime(secs);
        }

        function checkTime(par) {
            if (par<10)
            {
                par="0" + par;
            }
            return par;
        }

        setInterval(setDate,1000);
    </script>
