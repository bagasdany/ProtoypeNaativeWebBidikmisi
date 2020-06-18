<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Bidang Prestasi</th>
                <th>Nama Prestasi</th>
                <th>Tingkat Prestasi</th>
                <th class="text-center">Juara Ke</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($prestasi){
                $no = 1;
                foreach($prestasi as $row){
                    echo '<tr>
                            <td class="text-center" width="40">'.$no.'</td>
                            <td>'.$row['bidang_prestasi'].'</td>
                            <td>'.$row['nama_prestasi'].'</td>
                            <td>'.$row['tingkat_prestasi'].'</td>
                            <td class="text-center">'.$row['juara_ke'].'</td>
                        </tr>';
                    $no++;
                }
            } else {
                echo '<tr>
                        <td colspan="10" class="text-center">Data belum tersedia</td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $("#MyModalTitle").html('Detail Prestasi - <?php echo $mahasiswa['nm_mahasiswa'];?>');
</script>