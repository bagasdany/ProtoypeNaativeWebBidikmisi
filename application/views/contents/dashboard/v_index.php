
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
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $total_mahasiswa;?></h3>

                                <p>Total Mahasiswa</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users" style="color:#FFF;"></i>
                            </div>
                            <a href="<?php echo base_url('mahasiswa/data');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $total_prestasi;?></h3>

                                <p>Total Mahasiswa Berprestasi</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <a href="<?php echo base_url('mahasiswa/data');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $total_bina;?></h3>

                                <p>Total Mahasiswa Perlu Pembinaan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-street-view"></i>
                            </div>
                            <a href="<?php echo base_url('mahasiswa/bina');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $total_traccer;?></h3>

                                <p>Total Mahasiswa Traccer Study</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <a href="<?php echo base_url('mahasiswa/traccer');?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaIPKA"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaIPKB"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaIPKC"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaIPKD"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaBina"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaPrestasi"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaAktifOrganisasi"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaAktifTidakAktif"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaTraccer2"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaTraccer1"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaTraccer0"></div>
                            </div>
                        </div>  
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('partials/v_copyright');?>

    </div>

    <?php $this->load->view('partials/v_footer');?>
     <script>
        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '3.51 - 4.00'
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaIPKA', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan IPK (3.51 - 4.00)'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $ipk_a;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '3.00 - 3.50'
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaIPKB', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan IPK (3.00 - 3.50)'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $ipk_b;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '2.50 - 2.99'
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaIPKC', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan IPK (2.50 - 2.99)'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $ipk_c;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '< 2.50'
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaIPKD', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan IPK (< 2.50)'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $ipk_d;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA PERLU PEMBINAAN
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaBina', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan Pembinaan'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $bina;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERPRESTASI
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaPrestasi', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan Prestasi'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $prestasi;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA AKTIF BERORGANISASI
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaAktifOrganisasi', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan Aktif Berorganisasi'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $organisasi;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERSTATUS AKTIF
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaAktifTidakAktif', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berstatus Aktif'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $status_aktif;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN TRACCER STUDY
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaTraccer2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan Traccer Study (Langsung Kerja)'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $traccer_a;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN TRACCER STUDY
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaTraccer1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan Traccer Study (1 - 6 Bulan)'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $traccer_b;?>]
            }]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN TRACCER STUDY
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaTraccer0', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Keseluruhan Mahasiswa Berdasarkan Traccer Study (> 6 Bulan)'
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} - <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total Mahasiswa',
                colorByPoint: true,
                data: [<?php echo $traccer_c;?>]
            }]
        });
    </script> 
</body>
</html>