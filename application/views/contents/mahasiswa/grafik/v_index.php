
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartIPK"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaPembinaan"></div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaBerprestasi"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaAktifOrganisasi"></div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaTraccer"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div id="ChartMahasiswaAktifNonAktif"></div>
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
        | GRAFIK IPK MAHASISWA
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartIPK', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Mahasiswa Berdasarkan IPK'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '({point.name})<br>{point.y} Mahasiswa'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total Mahasiswa',
                data: [<?php echo $ipk;?>]
            }],
            colors: [
                '#4dc9f6',
                '#f67019',
                '#f53794',
                '#537bc4',
            ]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA PERLU PEMBINAAN
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaPembinaan', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Mahasiswa Berdasarkan Perlu Tidaknya Pembinaan'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}<br>Total: {point.y} Mahasiswa'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total Mahasiswa',
                data: [<?php echo $pembinaan;?>]
            }],
            colors: [
                '#4dc9f6',
                '#00a950',                               
            ]
        });
        
        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERPRESTASI
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaBerprestasi', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Mahasiswa Berdasarkan Prestasi'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}<br>Total:{point.y} Mahasiswa'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total Mahasiswa',
                data: [<?php echo $prestasi;?>]
            }],
            colors: [
                '#00acc1',
                '#ffa000',
            ]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA AKTIF BERORGANISASI
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaAktifOrganisasi', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Mahasiswa Berdasarkan Aktif Tidaknya Berorgnanisasi'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}<br>Total:{point.y} Mahasiswa'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total Mahasiswa',
                data: [<?php echo $organisasi;?>]
            }],
            colors: [
                '#ff6f00',
                '#a1887f',
            ]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA TRACCER STUDI
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaTraccer', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Mahasiswa Berdasarkan Traccer Study'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}<br>Total:{point.y} Mahasiswa'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total Mahasiswa',
                data: [<?php echo $traccer;?>]
            }],
            colors: [
                '#4dc9f6',
                '#f67019',
                '#f53794',
            ]
        });

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA AKTIF TIDAK AKTIF
        | -------------------------------------------------------------------
        */
        Highcharts.chart('ChartMahasiswaAktifNonAktif', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Grafik Total Mahasiswa Berdasarkan Status Aktif dan Tidak Aktif'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            tooltip: {
                pointFormat: '{series.name}: {point.y} <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}<br>Total:{point.y} Mahasiswa'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total Mahasiswa',
                data: [<?php echo $aktif_tidak_aktif;?>]
            }],
            colors: [
                '#00a950',
                '#a1887f',
            ]
        });
    </script>
</body>
</html>