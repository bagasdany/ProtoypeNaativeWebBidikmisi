<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Monitoring Mahasiswa Berdasarkan Perguruan Tinggi</title>
    <style type="text/css">
        @page {
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
        }
        table.table{
            width: 100%;
            border:1px solid black;
            border-collapse:collapse;
        }
        table.table tr td,
        table .judul-table{
            vertical-align: middle;
            text-align: center;
            font-weight: bolder;
        }
        table.table tr td{
            vertical-align: top;
        }
        table.table tr td,
        table.table tr td{
            font-size: 13px;
            padding: 4px;
            border:1px solid black;
            font-family: 'Arial';
        }
        header .title{
            text-align: center;
            font-family: 'Arial';
            border-bottom: 2px solid #000000;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .judul-kop-1{
            text-align: center;
            font-size: 22px;
        }
        .judul-kop-2{
            text-align: center;
            font-size: 22px;
            font-weight: 700;
        }
        .judul-kop-3{
            text-align: center;
            font-size: 22px;
            font-weight: 700;   
        }
        .alamat-kop{
            text-align: center;
            font-size: 18px;
        }
        .title img{
            width: 120px;
        }
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
        .bg-blue{
            background: #0a539e !important;
            color: #FFFFFF !important;
        }
        .text-left{
            text-align: left !important;
        }
        .text-center{
            text-align: center !important;
        }
        .text-right{
            text-align: right !important;
        }
        .text-danger{
            color: #FF0000 !important;
        }
        .text-aqua {
            color: #00c0ef !important;
        }
        .bg-red{
            background-color: #dd4b39 !important;
        }
        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }
        @media print
        {
          table { page-break-after:auto }
          tr    { page-break-inside:avoid; page-break-after:auto }
          td    { page-break-inside:avoid; page-break-after:auto }
          tdead { display:table-header-group }
          tfoot { display:table-footer-group }
        }
    </style>
</head>
<body>
    <header id="header" class="">
        <div class="title">
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:200px;" class="text-center">
                            <img src="./assets/dist/img/ristekdikti.png" alt="Logo RistekDikti">
                        </td>
                        <td>
                            <div class="judul-kop-1">
                                KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI
                            </div>
                            <div class="judul-kop-2">
                                LEMBAGA LAYANAN PENDIDIKAN TINGGI
                            </div>
                            <div class="judul-kop-3">
                                WILAYAH VI
                            </div>
                            <div class="alamat-kop">
                                Jl. Pawiyatan Luhur I / 1 Bendan Dhuwur Semarang 50233
                                <br>
                                Telp. 024 - 831728, 8311521, Fax. : 024 - 8311273
                                <br>
                                Laman : http://lldikti6.ristekdikti.go.id &nbsp;&nbsp;&nbsp; Surel : lldikti6@ristekdikti.go.id
                            </div>
                        </td>
                        <td style="width:200px;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </header><!-- /header -->

    <div class="text-center">
        <h3>DAFTAR MAHASISWA <?php echo strtoupper($nm_instansi);?></h3>    
    </div>  
    
    <table class="table">
        <tbody>
            <tr>
                <td class="bg-blue">No</td>
                <td class="bg-blue">NIM</td>
                <td class="bg-blue">Nama Mahasiswa</td>
                <td class="bg-blue">Fakultas</td>
                <td class="bg-blue">Program Studi</td>
                <td class="bg-blue">Jumlah Prestasi</td>
                <td class="bg-blue">Jumlah Organisasi</td>
                <td class="bg-blue">IPK</td>
                <td class="bg-blue">Aktif</td>
            </tr>
            <?php
            if($data){
                $no = 1;
                foreach($data as $row_data){

                    if($row_data['status'] == 1){
                        $ipk = '<strong class="text-aqua">'.$row_data['ipk'].'</strong>';
                    } else {
                        $ipk = '<strong class="text-danger">'.$row_data['ipk'].'</strong>';
                        $ipk .= '<br><span class="label bg-red">Perlu Pembinaan</span>';
                    }

                    $aktif = '-';
                    if($row_data['aktif'] == 'Ya'){
                        $aktif = '<strong class="text-aqua">'.$row_data['aktif'].'</strong>';
                    } else if($row_data['aktif'] == 'Tidak'){
                        $aktif = '<strong class="text-danger">'.$row_data['aktif'].'</strong>';
                    }

                    echo '<tr>
                            <td style="width:50px;">'.$no.'</td>
                            <td style="width:100px;">'.$row_data['nim'].'</td>
                            <td class="text-left">'.$row_data['nm_mahasiswa'].'</td>
                            <td style="width:120px;">'.$row_data['fakultas'].'</td>
                            <td style="width:120px;">'.$row_data['program_studi'].'</td>
                            <td style="width:80px;">'.$row_data['jumlah_prestasi'].'</td>
                            <td style="width:80px;">'.$row_data['jumlah_organisasi'].'</td>
                            <td style="width:100px;">'.$ipk.'</td>
                            <td style="width:50px;">'.$aktif.'</td>
                        </tr>';
                    $no++;
                }
            } else {
                echo '<tr><td colspan="100">TIDAK ADA DATA</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>