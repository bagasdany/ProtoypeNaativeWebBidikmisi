
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
                        <a href="javascript:;">Monitoring</a>
                    </li>
                    <li class="active"><?php echo (isset($title) ? $title : '');?></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form id="form_grafik" action="<?php echo current_url();?>" method="post" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="id_instansi" id="id_instansi" class="form-control" style="width: 100%;">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn bg-navy">
                                                Refresh Data
                                            </button>
                                        </div>
                                    </div>
                                </form>     
                            </div>
                        </div>  
                    </div>
                </div>

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

        $("#id_instansi").select2({
            placeholder: '- PILIH PERGURUAN TINGGI -',
            ajax:{
                url: "<?php echo base_url('monitoring/grafik/ajax_autocomplete_instansi');?>",
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

        <?php if(isset($ubah) && !empty($ubah)){?>

        var $newOption = $("<option selected='selected'></option>").val("<?php echo $ubah['id_instansi'];?>").text("<?php echo $ubah['kd_instansi'];?> - <?php echo $ubah['nm_instansi'];?>");
        $("#id_instansi").append($newOption).trigger('change');

        <?php } ?>

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