
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
                        <a href="<?php echo base_url('monitoring/data');?>">Monitoring</a>
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
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Fakultas</th>
                                        <th>Program Studi</th>
                                        <th>Jumlah Prestasi</th>
                                        <th>Jumlah Organisasi</th>
                                        <th>IPK</th>
                                        <th>Aktif</th>
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

    <div class="modal fade" id="MyModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="MyModalTitle">Default Modal</h4>
                </div>
                <div class="modal-body" id="MyModalBody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="fa fa-power-off"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('partials/v_footer');?>

    <script>
        $(document).ready(function() {
            var oTable = $('#MyTable').dataTable( {
                "bProcessing": true,
                "bServerSide": true,
                "ajax": {
                    "url": "<?php echo base_url('monitoring/data/ajax_list_detail');?>",
                    "type": "POST",
                    "data": function (data) {
                        data.id_instansi = "<?php echo $ubah['id_instansi'];?>";
                        data.status = $("#status").val();
                    }
                },
                "sServerMethod": "POST",
                "bAutoWidth": false,
                "sPaginationType": "full_numbers",
                "bSort": true,
                "aaSorting": [[ 1, 'asc' ]],
                "aoColumnDefs": [
                    {'bSortable': false, 'aTargets': [ 0 ], width:40, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 1 ], width:70},
                    {'bSortable': true, 'aTargets': [ 2 ]},
                    {'bSortable': true, 'aTargets': [ 3 ], width:100,},
                    {'bSortable': true, 'aTargets': [ 4 ], width:100,},
                    {'bSortable': true, 'aTargets': [ 5 ], width:50, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 6 ], width:70, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 7 ], width:50, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 8 ], width:50, className: 'text-center'},
                    {'bSortable': false, 'aTargets': [ 9 ], width:90, className: 'text-center'},
                ],
            });

            var TombolExport = '<button type="button" class="btn btn-danger btn-export"><i class="fa fa-file-pdf-o"></i> Export Data</a>';
            var filter = '<div class="row">'+
                            '<div class="col-sm-3">'+ TombolExport +
                            '</div>'+
                            '<div class="col-sm-4">'+
                                '<select class="form-control" id="status" style="width:100%;">'+
                                    '<option value="">Semua Mahasiswa</option>'+
                                    '<option value="0">Mahasiswa Perlu Pembinaan</option>'+
                                    '<option value="1">Mahasiswa Lulus</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>';
            $(".dataTables_length").html(filter);

            $(document).on("change", "#status",function() {
                oTable._fnAjaxUpdate();
            });


            $(document).on("click", ".btn-export",function() {
                var ExportURL = '<?php echo base_url('monitoring/data/export-detail');?>/<?php echo $ubah['id_instansi'];?>/';
                var xy = ($("#status").val() ? $("#status").val() : 'all');
                var win = window.open(ExportURL + xy, '_blank');

                if (win) {
                    win.focus();
                } else {
                    alert('Please allow popups for this website');
                }
            });

            $('#MyTable').delegate('.btn-prestasi', 'click', function(e){
                var get_url = $(this).data('url');
                $("#MyModal").modal('show');
                $("#MyModalTitle").html('Detail Prestasi');
                $("#MyModalBody").html('Memuat data...');
                $.get(get_url, function(response) {
                    $("#MyModalBody").html(response);
                });
            });

            $('#MyTable').delegate('.btn-organisasi', 'click', function(e){
                var get_url = $(this).data('url');
                $("#MyModal").modal('show');
                $("#MyModalTitle").html('Detail Prestasi');
                $("#MyModalBody").html('Memuat data...');
                $.get(get_url, function(response) {
                    $("#MyModalBody").html(response);
                });
            });
        });
    </script>
</body>
</html>