<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_total_mahasiswa_by_instansi(){
        $id_role    = $this->session->userdata('id_role');
        $id_instansi = $this->session->userdata('id_instansi');

        if($id_role != 1){
            $this->db->where('t1.id_instansi', $id_instansi);
        }
        
        return $this->db->count_all_results('tbl_mahasiswa as t1');
    }

    function get_total_fakultas_by_instansi(){
        $id_instansi = $this->session->userdata('id_instansi');

        $this->db->select('t1.fakultas');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.fakultas');

        return $this->db->get()->num_rows();
    }

    function get_total_program_studi_by_instansi(){
        $id_instansi = $this->session->userdata('id_instansi');

        $this->db->select('t1.program_studi');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.program_studi');

        return $this->db->get()->num_rows();
    }

    function get_all_fakultas_by_instansi(){
        $id_instansi = $this->session->userdata('id_instansi');

        $this->db->select('t1.fakultas');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.fakultas');
        $this->db->order_by('t1.fakultas', 'ASC');

        return $this->db->get()->result_array();
    }

    function get_total_mahasiswa_by_instansi_fakultas($fakultas, $jenis_kelamin){
        $id_instansi = $this->session->userdata('id_instansi');

        $this->db->select('t1.id_mahasiswa');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->where('t1.fakultas', $fakultas);
        $this->db->where('t1.jenis_kelamin', $jenis_kelamin);
        $this->db->from('tbl_mahasiswa as t1');

        return $this->db->get()->num_rows();
    }

    function get_all_autocomplete_traccer($cari, $id_instansi){
        $this->db->select('t1.id_mahasiswa, t1.nim, t1.nm_mahasiswa');

        $where = '1=1';

        if($cari){
            $where .= " AND (t1.nim LIKE '%".$cari."%' OR t1.nm_mahasiswa  LIKE '%".$cari."%') ";
        }
        
        $this->db->join('tbl_traccer as t2', 't2.id_mahasiswa = t1.id_mahasiswa','LEFT');
        $this->db->where('t2.id_traccer IS NULL');
        $this->db->where($where);
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.id_mahasiswa');
        $this->db->order_by('t1.nm_mahasiswa', 'ASC');
        $this->db->limit(25);

        $query  = $this->db->get();
        $data   = array();

        if($query->num_rows() > 0){

            $row = array();
            
            foreach($query->result() as $row_data){
                $row['id']      = $row_data->id_mahasiswa;
                $row['text']    = $row_data->nim . ' - ' . $row_data->nm_mahasiswa;

                $data[] = $row;
            }
        }
        return $data;
    }
    
    function perbarui_mahasiswa_by_id($id_mahasiswa, $data)
    {
        return $this->db->update('tbl_mahasiswa', $data, array('id_mahasiswa' => $id_mahasiswa));
    }

    function tambah($data)
    {
        $this->db->insert('tbl_mahasiswa', $data);
        return $this->db->insert_id();
    }

    function hapus_by_id($id_mahasiswa)
    {
        return $this->db->delete('tbl_mahasiswa', array('id_mahasiswa' => $id_mahasiswa));
    }

    function cek($data)
    {
        return $this->db->get_where('tbl_mahasiswa', $data);
    }

    function get_mahasiswa_by_id($id_mahasiswa)
    {
        $this->db->select('t1.*, t2.kd_instansi, t2.nm_instansi, t3.nm_pendidikan, t4.kd_bank, t4.nm_bank');
        $this->db->join('tbl_instansi as t2', 't2.id_instansi = t1.id_instansi');
        $this->db->join('tbl_pendidikan as t3', 't3.id_pendidikan = t1.id_pendidikan', 'LEFT');
        $this->db->join('tbl_bank as t4', 't4.id_bank = t1.id_bank', 'LEFT');
        $this->db->where('t1.id_mahasiswa', $id_mahasiswa);
        $this->db->from('tbl_mahasiswa as t1');

        $query = $this->db->get();
        return $query->row_array();
    }

    function get_data_export_by_instansi($id_instansi){
        $id_role    = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }
        
        $this->db->select('t1.*');

        if($id_instansi != 'all'){
            $this->db->where('t1.id_instansi', $id_instansi);
        }

        $this->db->from('tbl_mahasiswa as t1');
        // $this->db->order_by('t1.fakultas', 'ASC');
        // $this->db->order_by('t1.program_studi', 'ASC');
        $this->db->order_by('t1.nim', 'ASC');

        return $this->db->get()->result_array();        
    }

    function get_data_export_bina_by_instansi($id_instansi){
        $id_role    = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }
        
        $this->db->select('t1.*');
        $this->db->where('t1.status', '0');
        
        if($id_instansi != 'all'){
            $this->db->where('t1.id_instansi', $id_instansi);
        }

        $this->db->from('tbl_mahasiswa as t1');
        // $this->db->order_by('t1.fakultas', 'ASC');
        // $this->db->order_by('t1.program_studi', 'ASC');
        $this->db->order_by('t1.nim', 'ASC');

        return $this->db->get()->result_array();        
    }

    function get_data_export_by_instansi_status($id_instansi, $status){        
        $this->db->select('t1.*');

        if($status != 'all'){
            $this->db->where('t1.status', $status);
        }

        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');
        // $this->db->order_by('t1.fakultas', 'ASC');
        // $this->db->order_by('t1.program_studi', 'ASC');
        $this->db->order_by('t1.nim', 'ASC');

        return $this->db->get()->result_array();        
    }

    /*
    | -------------------------------------------------------------------
    | DAFTAR SEMUA MAHASISWA
    | -------------------------------------------------------------------
    */
    function get_datatables($dt){
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $join = $dt['join'];
        $sql  = "SELECT {$columns} ,t1.status  FROM {$dt['table']} {$join}";
        $id_instansi = @$dt['id_instansi'];

        // total all
        if($id_instansi){
            $sql2 = $sql . " WHERE t1.id_instansi='".$id_instansi."' ";
            $where_id_instansi = " AND t1.id_instansi='".$id_instansi."' ";
        } else {
            $sql2 = $sql;
            $where_id_instansi = '';
        }
        $rowCountAll = $this->db->query($sql2)->num_rows();

        // pengkondisian aksi seperti next, search dan limit
        $columnd = $dt['col-display'];
        $count_c = count($columnd);

        // search
        $search = $dt['search']['value'];

        /**
         * Search Global
         * pencarian global pada pojok kanan atas
         */
        $where = '1=1' . $where_id_instansi;

        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                
                if($i == 0){
                    $where .= ' AND ';
                }

                $where .= '  ( ';

                $where .= $columnd[$i] .' LIKE "%'. $search .'%"' . $where_id_instansi;

                $where .= ' ) ';
                
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        
        /**
         * Search Individual Kolom
         * pencarian dibawah kolom
         */
        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {                       

                $where .= ' AND ( ';

                $where .= $columnd[$i] . ' LIKE "%' . $searchCol . '%" ' . $where_id_instansi;
                
                $where .= ' ) ';
            }
        }

        /**
         * pengecekan Form pencarian
         * pencarian aktif jika ada karakter masuk pada kolom pencarian.
         */
        if ($where != '') {
            $sql .= " WHERE " . $where ." ";
            $rowCount = $this->db->query($sql)->num_rows();
        } else {
            $rowCount = $this->db->query($sql)->num_rows();
        }
        
        // sorting
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        
        // limit
        $start  = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        
        $list = $this->db->query($sql);
        /**
         * convert to json
         */
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCountAll;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();

        $aksi = '';
        
        $no = $start + 1;
        foreach ($list->result() as $row) {
            $aksi = '
                <a class="btn btn-warning" href="'.base_url('mahasiswa/proses/ubah/' . $row->id_mahasiswa).'">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-hapus" href="javascript:;" data-url="'.base_url('mahasiswa/proses/hapus/'.$row->id_mahasiswa).'">
                    <i class="fa fa-trash-o"></i>
                </a>
                ';

            $nm_mahasiswa = '<a href="'.base_url('mahasiswa/data/detail/' . $row->id_mahasiswa . '/' . url_title(strtolower($row->nm_mahasiswa))).'"><strong>'.$row->nm_mahasiswa.'</strong></a>';


            if($row->status == 1){
                $ipk = '<strong class="text-aqua">'.$row->ipk.'</strong>';
            } else {
                $ipk = '<strong class="text-danger">'.$row->ipk.'</strong>';
                $ipk .= '<br><span class="label bg-red">Perlu Pembinaan</span>';
            }



            $jumlah_prestasi = '<a href="javascript:;" data-url="'.base_url('mahasiswa/data/prestasi/'.$row->id_mahasiswa).'" class="btn-prestasi">
                                <strong>'.$row->jumlah_prestasi.'</strong>
                                </a>';
            $jumlah_organisasi = '<a href="javascript:;" data-url="'.base_url('mahasiswa/data/organisasi/'.$row->id_mahasiswa).'" class="btn-organisasi">
                                    <strong>'.$row->jumlah_organisasi.'</strong>
                                    </a>';

            $aktif = '-';
            if($row->aktif == 'Ya'){
                $aktif = '<strong class="text-aqua">'.$row->aktif.'</strong>';
            } else if($row->aktif == 'Tidak'){
                $aktif = '<strong class="text-danger">'.$row->aktif.'</strong>';
            }

            $option['data'][] = array(
                                    $no,
                                    $row->nim,
                                    $nm_mahasiswa,
                                    $row->fakultas,
                                    $row->program_studi,
                                    $jumlah_prestasi,
                                    $jumlah_organisasi,
                                    $ipk,
                                    $aktif,
                                    $aksi
                                );
            $no++;
        }
        echo json_encode($option);
    }

    /*
    | -------------------------------------------------------------------
    | DAFTAR MAHASISWA PEMBINAAN
    | -------------------------------------------------------------------
    */
    function get_datatables_bina($dt){
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $join = $dt['join'];
        $sql  = "SELECT {$columns} ,t1.status  FROM {$dt['table']} {$join}";
        $id_instansi = @$dt['id_instansi'];

        // total all
        if($id_instansi){
            $sql2 = $sql . " WHERE t1.status='0' AND t1.id_instansi='".$id_instansi."' ";
            $where_id_instansi = " AND t1.status='0'  AND t1.id_instansi='".$id_instansi."' ";
        } else {
            $sql2 = $sql . " WHERE t1.status='0' ";
            $where_id_instansi = " AND t1.status='0' ";
        }        
        $rowCountAll = $this->db->query($sql2)->num_rows();

        // pengkondisian aksi seperti next, search dan limit
        $columnd = $dt['col-display'];
        $count_c = count($columnd);

        // search
        $search = $dt['search']['value'];

        /**
         * Search Global
         * pencarian global pada pojok kanan atas
         */
        $where = ' 1=1 ' . $where_id_instansi;

        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                if($i == 0){
                    $where .= ' AND ';
                }

                $where .= ' ( ';

                $where .= $columnd[$i] .' LIKE "%'. $search .'%" AND t1.status="0" ' . $where_id_instansi;

                $where .= ' ) ';
                
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        
        /**
         * Search Individual Kolom
         * pencarian dibawah kolom
         */
        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {                       

                $where .= ' ( ';

                $where .= $columnd[$i] . ' LIKE "%' . $searchCol . '%"  AND t1.status="0" ';
                
                $where .= ' ) ';
            }
        }

        /**
         * pengecekan Form pencarian
         * pencarian aktif jika ada karakter masuk pada kolom pencarian.
         */
        if ($where != '') {
            $sql .= " WHERE " . $where ." ";
            $rowCount = $this->db->query($sql)->num_rows();
        } else {
            $rowCount = $this->db->query($sql)->num_rows();
        }
        
        // sorting
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        
        // limit
        $start  = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        
        $list = $this->db->query($sql);
        /**
         * convert to json
         */
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCountAll;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();

        $aksi = '';
        
        $no = $start + 1;
        foreach ($list->result() as $row) {
            $aksi = '
                <a class="btn btn-warning" href="'.base_url('mahasiswa/proses/ubah/' . $row->id_mahasiswa . '/bina').'">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-hapus" href="javascript:;" data-url="'.base_url('mahasiswa/proses/hapus/'.$row->id_mahasiswa).'">
                    <i class="fa fa-trash-o"></i>
                </a>
                ';

            $nm_mahasiswa = '<a href="'.base_url('mahasiswa/data/detail/' . $row->id_mahasiswa . '/' . url_title(strtolower($row->nm_mahasiswa))).'/bina"><strong>'.$row->nm_mahasiswa.'</strong></a>';


            if($row->status == 1){
                $ipk = '<strong class="text-aqua">'.$row->ipk.'</strong>';
            } else {
                $ipk = '<strong class="text-danger">'.$row->ipk.'</strong>';
                $ipk .= '<br><span class="label bg-red">Perlu Pembinaan</span>';
            }



            $jumlah_prestasi = '<a href="javascript:;" data-url="'.base_url('mahasiswa/data/prestasi/'.$row->id_mahasiswa).'" class="btn-prestasi">
                                <strong>'.$row->jumlah_prestasi.'</strong>
                                </a>';
            $jumlah_organisasi = '<a href="javascript:;" data-url="'.base_url('mahasiswa/data/organisasi/'.$row->id_mahasiswa).'" class="btn-organisasi">
                                    <strong>'.$row->jumlah_organisasi.'</strong>
                                    </a>';

            $aktif = '-';
            if($row->aktif == 'Ya'){
                $aktif = '<strong class="text-aqua">'.$row->aktif.'</strong>';
            } else if($row->aktif == 'Tidak'){
                $aktif = '<strong class="text-danger">'.$row->aktif.'</strong>';
            }

            $option['data'][] = array(
                                    $no,
                                    $row->nim,
                                    $nm_mahasiswa,
                                    $row->fakultas,
                                    $row->program_studi,
                                    $jumlah_prestasi,
                                    $jumlah_organisasi,
                                    $ipk,
                                    $aktif,
                                    $aksi
                                );
            $no++;
        }
        echo json_encode($option);
    }



    /*
    | -------------------------------------------------------------------
    | DAFTAR SEMUA MAHASISWA
    | -------------------------------------------------------------------
    */
    function get_datatables_detail($dt){
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $join = $dt['join'];
        $sql  = "SELECT {$columns} ,t1.status  FROM {$dt['table']} {$join}";
        $id_instansi    = @$dt['id_instansi'];
        $status         = @$dt['status'];

        if($status != ''){
            $status = "  AND t1.status= '".$status."' ";
        } else {
            $status = '';
        }

        // total all
        $sql2 = $sql . " WHERE t1.id_instansi='".$id_instansi."' " . $status;
        $where_id_instansi = " AND t1.id_instansi='".$id_instansi."' " . $status;

        $rowCountAll = $this->db->query($sql2)->num_rows();

        // pengkondisian aksi seperti next, search dan limit
        $columnd = $dt['col-display'];
        $count_c = count($columnd);

        // search
        $search = $dt['search']['value'];

        /**
         * Search Global
         * pencarian global pada pojok kanan atas
         */
        $where = '1=1' . $where_id_instansi;

        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                
                if($i == 0){
                    $where .= ' AND ';
                }

                $where .= '  ( ';

                $where .= $columnd[$i] .' LIKE "%'. $search .'%"' . $where_id_instansi;

                $where .= ' ) ';
                
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        
        /**
         * Search Individual Kolom
         * pencarian dibawah kolom
         */
        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {                       

                $where .= ' AND ( ';

                $where .= $columnd[$i] . ' LIKE "%' . $searchCol . '%" ' . $where_id_instansi;
                
                $where .= ' ) ';
            }
        }

        /**
         * pengecekan Form pencarian
         * pencarian aktif jika ada karakter masuk pada kolom pencarian.
         */
        if ($where != '') {
            $sql .= " WHERE " . $where ." ";
            $rowCount = $this->db->query($sql)->num_rows();
        } else {
            $rowCount = $this->db->query($sql)->num_rows();
        }
        
        // sorting
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        
        // limit
        $start  = $dt['start'];
        $length = $dt['length'];
        $sql .= " LIMIT {$start}, {$length}";
        
        $list = $this->db->query($sql);
        /**
         * convert to json
         */
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCountAll;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();

        $aksi = '';
        
        $no = $start + 1;
        foreach ($list->result() as $row) {
            $aksi = '
                <a class="btn btn-info" href="'.base_url('monitoring/data/detail-mahasiswa/' . $row->id_mahasiswa . '/' . url_title(strtolower($row->nm_mahasiswa))).'">
                    <i class="fa fa-search"></i>
                </a>
                ';

            $nm_mahasiswa = '<a href="'.base_url('monitoring/data/detail-mahasiswa/' . $row->id_mahasiswa . '/' . url_title(strtolower($row->nm_mahasiswa))).'"><strong>'.$row->nm_mahasiswa.'</strong></a>';


            if($row->status == 1){
                $ipk = '<strong class="text-aqua">'.$row->ipk.'</strong>';
            } else {
                $ipk = '<strong class="text-danger">'.$row->ipk.'</strong>';
                $ipk .= '<br><span class="label bg-red">Perlu Pembinaan</span>';
            }

            $jumlah_prestasi = '<a href="javascript:;" data-url="'.base_url('monitoring/data/prestasi/'.$row->id_mahasiswa).'" class="btn-prestasi">
                                <strong>'.$row->jumlah_prestasi.'</strong>
                                </a>';
            $jumlah_organisasi = '<a href="javascript:;" data-url="'.base_url('monitoring/data/organisasi/'.$row->id_mahasiswa).'" class="btn-organisasi">
                                    <strong>'.$row->jumlah_organisasi.'</strong>
                                    </a>';

            $aktif = '-';
            if($row->aktif == 'Ya'){
                $aktif = '<strong class="text-aqua">'.$row->aktif.'</strong>';
            } else if($row->aktif == 'Tidak'){
                $aktif = '<strong class="text-danger">'.$row->aktif.'</strong>';
            }

            $option['data'][] = array(
                                    $no,
                                    $row->nim,
                                    $nm_mahasiswa,
                                    $row->fakultas,
                                    $row->program_studi,
                                    $jumlah_prestasi,
                                    $jumlah_organisasi,
                                    $ipk,
                                    $aktif,
                                    $aksi
                                );
            $no++;
        }
        echo json_encode($option);
    }

    /*
    | -------------------------------------------------------------------
    | UNTUK KEPERLUAN GRAFIK
    | -------------------------------------------------------------------
    */
    function get_total_mahasiswa_by_ipk($ipk, $id_instansi = null){
        $id_role = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }

        $exp_ipk = explode(' - ', $ipk);
        if(count($exp_ipk) > 1){
            $where = " t1.ipk BETWEEN '".$exp_ipk[0]."' AND '".$exp_ipk[1]."' ";
        } else {
            $where = " t1.ipk >= '".$exp_ipk[0]."' ";
        }

        $this->db->select('t1.id_mahasiswa');
        $this->db->where($where);
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_by_pembinaan($status, $id_instansi = null, $dashboard = false){
        $id_role = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }

        $this->db->select('t1.id_mahasiswa');
        
        if($dashboard == false){
           $this->db->where('t1.id_instansi', $id_instansi); 
        }
        
        $this->db->where('t1.status', $status);
        $this->db->from('tbl_mahasiswa as t1');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_punya_prestasi($bidang_prestasi, $id_instansi = null){
        $id_role = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }
        
        $this->db->select('t1.id_mahasiswa');
        $this->db->join('tbl_prestasi as t2', 't1.id_mahasiswa = t2.id_mahasiswa');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->where('t2.bidang_prestasi', $bidang_prestasi);
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.id_mahasiswa');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_punya_organisasi($aktif, $id_instansi = null){
        $id_role = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }
        
        $this->db->select('t1.id_mahasiswa');

        if($aktif){
            $this->db->join('tbl_organisasi as t2', 't1.id_mahasiswa = t2.id_mahasiswa');
        } else {
            $this->db->join('tbl_organisasi as t2', 't1.id_mahasiswa = t2.id_mahasiswa','LEFT');
            $where = " (t2.id_organisasi IS NULL OR t2.id_organisasi = '') ";
            $this->db->where($where);
        }
        
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.id_mahasiswa');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_by_aktif_tidak_aktif($aktif, $id_instansi = null){
        $id_role = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }

        $this->db->select('t1.id_mahasiswa');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->where('t1.aktif', $aktif);
        $this->db->from('tbl_mahasiswa as t1');

        return $this->db->get()->num_rows();
    }


    function get_total_mahasiswa_instansi_by_ipk($ipk, $id_instansi){
        $exp_ipk = explode(' - ', $ipk);
        if(count($exp_ipk) > 1){
            $where = " t1.ipk BETWEEN '".$exp_ipk[0]."' AND '".$exp_ipk[1]."' ";
        } else {
            $where = " t1.ipk >= '".$exp_ipk[0]."' ";
        }

        $this->db->select('t1.id_mahasiswa');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->where($where);
        $this->db->from('tbl_mahasiswa as t1');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_instansi_by_pembinaan($id_instansi){
        $this->db->select('t1.id_mahasiswa');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->where('t1.status', '0');
        $this->db->from('tbl_mahasiswa as t1');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_instansi_punya_prestasi($id_instansi, $dashboard = false){
        $this->db->select('t1.id_mahasiswa');
        $this->db->join('tbl_prestasi as t2', 't1.id_mahasiswa = t2.id_mahasiswa');

        if($dashboard == false){
            $this->db->where('t1.id_instansi', $id_instansi);
        }
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.id_mahasiswa');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_instansi_punya_organisasi($id_instansi){        
        $this->db->select('t1.id_mahasiswa');
        $this->db->join('tbl_organisasi as t2', 't1.id_mahasiswa = t2.id_mahasiswa');        
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->from('tbl_mahasiswa as t1');
        $this->db->group_by('t1.id_mahasiswa');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_by_aktif($id_instansi = null){
        $this->db->select('t1.id_mahasiswa');
        $this->db->where('t1.id_instansi', $id_instansi);
        $this->db->where('t1.aktif', 'Ya');
        $this->db->from('tbl_mahasiswa as t1');

        return $this->db->get()->num_rows();
    }
}