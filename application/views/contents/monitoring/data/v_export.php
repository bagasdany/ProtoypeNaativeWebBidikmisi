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
        <h3>MONITORING MAHASISWA</h3>    
    </div>  
    

    <table class="table">
        <tbody>
            <tr>
                <td class="bg-blue">No</td>
                <td class="bg-blue">Kode PT</td>
                <td class="bg-blue">Nama PT</td>
                <td class="bg-ipk-bina">IPK<br> &lt; 2.50</td>
                <td class="bg-ipk-bina">IPK<br>2.50 - 2.99</td>
                <td class="bg-ipk-b">IPK<br>3.00 - 350</td>
                <td class="bg-ipk-a">IPK<br>3.51 - 4.00</td>
                <td class="bg-total">Total Mhs</td>
                <td class="bg-prestasi">Total Mhs<br>Berprestasi</td>
                <td class="bg-organisasi">Total Mhs<br>Aktif Organisasi</td>
                <td class="bg-traccer">Langsung Kerja</td>
                <td class="bg-traccer">1 - 6 Bulan</td>
                <td class="bg-traccer"> 6 Bulan</td>
            </tr>
            <?php
            if($data){
                $no = 1;
                foreach($data as $row_data){
                    echo '<tr>
                            <td>'.$no.'</td>
                            <td>'.$row_data['kd_instansi'].'</td>
                            <td class="text-left">'.$row_data['nm_instansi'].'</td>
                            <td class="bg-ipk-bina">'.$row_data['ipk_d'].'</td>
                            <td class="bg-ipk-bina">'.$row_data['ipk_c'].'</td>
                            <td class="bg-ipk-b">'.$row_data['ipk_b'].'</td>
                            <td class="bg-ipk-a">'.$row_data['ipk_a'].'</td>
                            <td class="bg-total">'.$row_data['total_mahasiswa'].'</td>
                            <td class="bg-prestasi">'.$row_data['total_prestasi'].'</td>
                            <td class="bg-organisasi">'.$row_data['total_organisasi'].'</td>
                            <td class="bg-traccer">'.$row_data['traccer_a'].'</td>
                            <td class="bg-traccer">'.$row_data['traccer_b'].'</td>
                            <td class="bg-traccer">'.$row_data['traccer_c'].'</td>
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