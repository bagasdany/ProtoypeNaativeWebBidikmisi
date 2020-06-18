
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
                    <li class="active"><?php echo (isset($title) ? $title : '');?></li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="MyTable" class="table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Gelar Terakhir</th>
                                        <th>Tanggal Lulus</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('partials/v_copyright');?>

    </div>

    <?php $this->load->view('partials/v_footer');?>

    <script>
        $(document).ready(function() {
            var oTable = $('#MyTable').dataTable( {
                "bProcessing": true,
                "bServerSide": true,
                "ajax": {
                    "url": "<?php echo base_url('mahasiswa/traccer/ajax_list');?>",
                    "type": "POST",
                    "data": function (data) {
                        data.id_instansi = $('#id_instansi').val();
                    }
                },
                "sServerMethod": "POST",
                "bAutoWidth": false,
                "sPaginationType": "full_numbers",
                "bSort": true,
                "aaSorting": [[ 1, 'asc' ]],
                "aoColumnDefs": [
                    {'bSortable': false, 'aTargets': [ 0 ], width:40, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 1 ]},
                    {'bSortable': true, 'aTargets': [ 2 ], width:50},
                    {'bSortable': true, 'aTargets': [ 3 ], width:80, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 4 ], width:110,},
                    {'bSortable': true, 'aTargets': [ 5 ], width:110,},
                    {'bSortable': true, 'aTargets': [ 6 ], width:110,},
                    {'bSortable': true, 'aTargets': [ 7 ], width:80, className: 'text-center'},
                    {'bSortable': false, 'aTargets': [ 8 ], width:90, className: 'text-center'},
                ],
            });

            // TOMBOL EXPORT
            var TombolExport = '<button type="button" class="btn btn-danger btn-export"><i class="fa fa-file-pdf-o"></i> Export Data</a>';

            // TAMBAH
            var tambah = '<a href="<?php echo base_url('mahasiswa/traccer/tambah');?>" class="btn bg-navy" title="Tambah" data-toggle="tooltip" style="float:left;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>';

            <?php if($this->session->userdata('id_role') == 1) {?>

            var instansi = '<select name="id_instansi" id="id_instansi" class="form-control" style="width: 100%;"></select>';
            var konten = '<div class="row"><div class="col-sm-5 col-xs-5">'+tambah+ '&nbsp;' +TombolExport+ ' </div><div class="col-sm-7 col-xs-7">'+instansi+'</div></div>';
            $(".dataTables_length").html(konten);

            $(document).on("change", "#id_instansi",function() {
                oTable._fnAjaxUpdate();
            });

            $("#id_instansi").select2({
                placeholder: '- PILIH PERGURUAN TINGGI -',
                allowClear: true,
                ajax:{
                    url: "<?php echo base_url('mahasiswa/data/ajax_autocomplete_instansi');?>",
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

            <?php } else { ?>

                var instansi = '<input type="hidden" name="id_instansi" id="id_instansi" value="<?php echo $this->session->userdata('id_instansi');?>">';
                $(".dataTables_length").html(tambah +'&nbsp;&nbsp;'+ TombolExport + instansi);
                oTable._fnAjaxUpdate();

            <?php } ?>

            $(document).on("click", ".btn-export",function() {
                var ExportURL = '<?php echo base_url('mahasiswa/traccer/export');?>/';
                var xy = ($("#id_instansi").val() ? $("#id_instansi").val() : 'all');
                var win = window.open(ExportURL + xy, '_blank');

                if (win) {
                    win.focus();
                } else {
                    alert('Please allow popups for this website');
                }
            });

            // HAPUS
            $('#MyTable').delegate('.btn-hapus', 'click', function(e){
                e.preventDefault();
                var get_url = $(this).data('url');
                swal({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan lagi.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#FF0000",
                    confirmButtonText: "Hapus!",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function(){
                    $.get(get_url, function(response) {
                        swal("Terhapus!", "Data telah dihapus", "success");
                        oTable._fnAjaxUpdate();
                    });
                });
            }); 
        });
    </script>
</body>
</html>