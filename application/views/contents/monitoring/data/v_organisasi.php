<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama Organisasi</th>
                <th>Status Jabatan</th>
                <th>Periode</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($organisasi){
                $no = 1;
                foreach($organisasi as $row){
                    echo '<tr>
                            <td class="text-center" width="40">'.$no.'</td>
                            <td>'.$row['nama_organisasi'].'</td>
                            <td>'.$row['nm_status_jabatan'].'</td>
                            <td>'.$row['periode'].'</td>
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