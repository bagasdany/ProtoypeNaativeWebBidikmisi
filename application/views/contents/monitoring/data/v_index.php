
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
                    <li class="active"><?php echo (isset($title) ? $title : '');?></li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="MyTable" class="table-hover table table-bordered table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode PT</th>
                                        <th>Nama PT</th>
                                        <th class="bg-ipk-bina">IPK<br>< 2.50</th>
                                        <th class="bg-ipk-bina">IPK<br>2.50 - 2.99</th>
                                        <th class="bg-ipk-b">IPK<br>3.00 - 350</th>
                                        <th class="bg-ipk-a">IPK<br>3.51 - 4.00</th>
                                        <th class="bg-total">Total Mhs</th>
                                        <th class="btn-prestasi">Total Mhs<br>Berprestasi</th>
                                        <th class="bg-organisasi">Total Mhs<br>Aktif Organisasi</th>
                                        <th class="bg-traccer">Langsung Kerja</th>
                                        <th class="bg-traccer">1 - 6 Bulan</th>
                                        <th class="bg-traccer"> 6 Bulan</th>
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

    <style type="text/css">
        .bg-ipk-a{
            background: #1e88e5  !important;
            color: #FFFFFF !important;
        }
        .bg-ipk-b{
            background: #43a047  !important;
            color: #FFFFFF !important;
        }
        .bg-ipk-bina{
            background: #FF0000  !important;
            color: #FFFFFF !important;
        }
        .bg-total{
            background: #263238   !important;
            color: #FFFFFF !important;
        }
        .bg-traccer{
            background: #6d4c41   !important;
            color: #FFFFFF !important;
        }
        .bg-prestasi{
            background: #fb8c00  !important;
            color: #FFFFFF !important;
        }
        .bg-organisasi{
            background: #00897b !important;
            color: #FFFFFF !important;
        }
    </style>

    <?php $this->load->view('partials/v_footer');?>

    <script>
        $(document).ready(function() {
            var oTable = $('#MyTable').dataTable( {
                "bProcessing": true,
                "bServerSide": true,
                "ajax": {
                    "url": "<?php echo base_url('monitoring/data/ajax_list');?>",
                    "type": "POST",
                },
                "sServerMethod": "POST",
                "bAutoWidth": false,
                "sPaginationType": "full_numbers",
                "bSort": true,
                "aaSorting": [[ 1, 'asc' ]],
                "aoColumnDefs": [
                    {'bSortable': false, 'aTargets': [ 0 ], width:40, className: 'text-center'},
                    {'bSortable': true, 'aTargets': [ 1 ], width:50},
                    {'bSortable': true, 'aTargets': [ 2 ]},

                    {'bSortable': true, 'aTargets': [ 3 ], width:60, className: 'text-center bg-ipk-bina'},
                    {'bSortable': true, 'aTargets': [ 4 ], width:60, className: 'text-center bg-ipk-bina'},
                    {'bSortable': true, 'aTargets': [ 5 ], width:60, className: 'text-center bg-ipk-b'},
                    {'bSortable': true, 'aTargets': [ 6 ], width:60, className: 'text-center bg-ipk-a'},

                    {'bSortable': true, 'aTargets': [ 7 ], width:60, className: 'text-center bg-total'},
                    {'bSortable': true, 'aTargets': [ 8 ], width:60, className: 'text-center bg-prestasi'},
                    {'bSortable': true, 'aTargets': [ 9 ], width:60, className: 'text-center bg-organisasi'},

                    {'bSortable': true, 'aTargets': [ 10 ], width:40, className: 'text-center bg-traccer'},
                    {'bSortable': true, 'aTargets': [ 11 ], width:40, className: 'text-center bg-traccer'},
                    {'bSortable': true, 'aTargets': [ 12 ], width:40, className: 'text-center bg-traccer'},
                ],
            });

            var TombolExport = '<button type="button" class="btn btn-danger btn-export" onclick="window.open(\'<?php echo base_url('monitoring/data/export');?>\', \'_blank\')"><i class="fa fa-file-pdf-o"></i> Export Data</a>';
            $(".dataTables_length").html(TombolExport);
        });
    </script>
</body>
</html>