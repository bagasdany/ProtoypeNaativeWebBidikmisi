
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Instansi</th>
                                        <th>Role Pengguna</th>
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
                    "url": "<?php echo base_url('master/pengguna/ajax_list');?>",
                    "type": "POST"
                },
                "sServerMethod": "POST",
                "bAutoWidth": false,
                "sPaginationType": "full_numbers",
                "bSort": true,
                "aaSorting": [[ 1, 'asc' ]],
                "aoColumnDefs": [
                    {'bSortable': false, 'aTargets': [ 0 ], width:50, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 1 ], width:150},
                    {'bSortable': true, 'aTargets': [ 2 ], width:150},
                    {'bSortable': true, 'aTargets': [ 3 ], width:150},
                    {'bSortable': true, 'aTargets': [ 4 ]},
                    {'bSortable': true, 'aTargets': [ 5 ], width:100},
                    {'bSortable': false, 'aTargets': [ 6 ], width:90, className: 'text-center'},
                ],
            });

            // TAMBAH
            $(".dataTables_length").html('<a href="<?php echo base_url('master/pengguna/tambah');?>" class="btn bg-navy" title="Tambah" data-toggle="tooltip"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>');

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