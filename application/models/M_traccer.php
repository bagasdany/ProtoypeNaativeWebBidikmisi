<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_traccer extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    function perbarui_traccer_by_id($id_traccer, $data)
    {
        return $this->db->update('tbl_traccer', $data, array('id_traccer' => $id_traccer));
    }

    function tambah($data)
    {
        $this->db->insert('tbl_traccer', $data);
        return $this->db->insert_id();
    }

    function hapus_by_id($id_traccer)
    {
        return $this->db->delete('tbl_traccer', array('id_traccer' => $id_traccer));
    }

    function cek($data)
    {
        return $this->db->get_where('tbl_traccer', $data);
    }

    function get_traccer_by_id($id_traccer)
    {
        $this->db->select('t0.*, t1.nm_mahasiswa, t1.id_instansi, t1.fakultas, t1.program_studi, t1.jenis_kelamin, t1.tempat_lahir, t1.tanggal_lahir, t2.kd_instansi, t2.nm_instansi, t3.nm_pendidikan');
        $this->db->join('tbl_mahasiswa as t1','t1.id_mahasiswa = t0.id_mahasiswa');
        $this->db->join('tbl_instansi as t2', 't2.id_instansi = t1.id_instansi');
        $this->db->join('tbl_pendidikan as t3', 't3.id_pendidikan = t1.id_pendidikan', 'LEFT');
        $this->db->where('t0.id_traccer', $id_traccer);
        $this->db->from('tbl_traccer as t0');

        $query = $this->db->get();
        return $query->row_array();
    }

    function get_traccer_export_by_instansi($id_instansi)
    {
        $id_role    = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }

        $this->db->select('t0.*, t1.nm_mahasiswa, t1.id_instansi, t1.fakultas, t1.program_studi, t1.jenis_kelamin, t1.tempat_lahir, t1.tanggal_lahir, t2.kd_instansi, t2.nm_instansi, t3.nm_pendidikan');
        $this->db->join('tbl_mahasiswa as t1','t1.id_mahasiswa = t0.id_mahasiswa');
        $this->db->join('tbl_instansi as t2', 't2.id_instansi = t1.id_instansi');
        $this->db->join('tbl_pendidikan as t3', 't3.id_pendidikan = t1.id_pendidikan', 'LEFT');

        if($id_instansi != 'all'){
            $this->db->where('t1.id_instansi', $id_instansi);
        }
        
        $this->db->from('tbl_traccer as t0');

        $query = $this->db->get();
        return $query->result_array();
    }

    /*
    | -------------------------------------------------------------------
    | DAFTAR TRACCER
    | -------------------------------------------------------------------
    */
    function get_datatables($dt){
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $join = $dt['join'];
        $sql  = "SELECT {$columns} FROM {$dt['table']} {$join}";
        $id_instansi = @$dt['id_instansi'];

        // total all
        if($id_instansi){
            $sql2 = $sql . " WHERE t2.id_instansi='".$id_instansi."' ";
            $where_id_instansi = " AND t2.id_instansi='".$id_instansi."' ";
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

                $where .= ' ( ';

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
                <a class="btn btn-warning" href="'.base_url('mahasiswa/traccer/ubah/' . $row->id_traccer).'">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-hapus" href="javascript:;" data-url="'.base_url('mahasiswa/traccer/hapus/'.$row->id_traccer).'">
                    <i class="fa fa-trash-o"></i>
                </a>
                ';

            $nm_mahasiswa = '<a href="'.base_url('mahasiswa/traccer/detail/' . $row->id_traccer . '/' . url_title(strtolower($row->nm_mahasiswa))).'"><strong>'.$row->nm_mahasiswa.'</strong></a>';

            $option['data'][] = array(
                                    $no,
                                    $nm_mahasiswa,
                                    $row->gelar_terakhir,
                                    ($row->tanggal_lulus ? date('d/m/Y', strtotime($row->tanggal_lulus)) : '-'),
                                    $row->nama_perusahaan,
                                    $row->alamat_perusahaan,
                                    $row->jabatan,
                                    ($row->tanggal_masuk ? date('d/m/Y', strtotime($row->tanggal_masuk)) : '-'),
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
    function get_total_mahasiswa_traccer($kategori, $id_instansi = null){
        $id_role = $this->session->userdata('id_role');
        if($id_role != 1){
            $id_instansi = $this->session->userdata('id_instansi');
        }

        if($kategori == 2){ // LANGSUNG KERJA
            $where = " TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) = 0 ";  
        } else if($kategori == 1){ // 1-6 Bulan
            $where = " TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) <= 6 AND TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) > 0 ";  
        } else { // > 6 Bulan
          $where = " TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) > 6 ";  
        }

        $this->db->select('t1.id_traccer');
        $this->db->join('tbl_mahasiswa as t2', 't1.id_mahasiswa = t2.id_mahasiswa');
        $this->db->where($where);
        $this->db->where('t2.id_instansi', $id_instansi);
        $this->db->from('tbl_traccer as t1');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_by_instansi(){
        $id_role = $this->session->userdata('id_role');
        $id_instansi = $this->session->userdata('id_instansi');

        $this->db->select('t1.id_traccer');
        $this->db->join('tbl_mahasiswa as t2', 't1.id_mahasiswa = t2.id_mahasiswa');

        if($id_role != 1){
            $this->db->where('t2.id_instansi', $id_instansi);
        }
        
        $this->db->from('tbl_traccer as t1');

        return $this->db->get()->num_rows();
    }

    function get_total_mahasiswa_instansi_traccer($kategori, $id_instansi){
        if($kategori == 2){ // LANGSUNG KERJA
            $where = " TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) = 0 ";  
        } else if($kategori == 1){ // 1-6 Bulan
            $where = " TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) <= 6 AND TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) > 0 ";  
        } else { // > 6 Bulan
          $where = " TIMESTAMPDIFF(MONTH, t1.tanggal_lulus, t1.tanggal_masuk) > 6 ";  
        }

        $this->db->select('t1.id_traccer');
        $this->db->join('tbl_mahasiswa as t2', 't1.id_mahasiswa = t2.id_mahasiswa');
        $this->db->where($where);
        $this->db->where('t2.id_instansi', $id_instansi);
        $this->db->from('tbl_traccer as t1');

        return $this->db->get()->num_rows();
    }
}