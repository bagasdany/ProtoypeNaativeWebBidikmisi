<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_login($param1, $param2){
        $sql = "SELECT t1.*, t2.role
                FROM tbl_pengguna as t1 
                JOIN tbl_role as t2 ON t2.id_role = t1.id_role
                WHERE 
                    (t1.username = '".$param1."' AND t1.password = '".$param2."')
                    OR 
                    (t1.email = '".$param1."' AND t1.password = '".$param2."')
                ";

        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function perbarui_pengguna_by_id($id_pengguna, $data)
    {
        return $this->db->update('tbl_pengguna', $data, array('id_pengguna' => $id_pengguna));
    }

    function tambah($data)
    {
        $this->db->insert('tbl_pengguna', $data);
        return $this->db->insert_id();
    }

    function hapus_by_id($id_pengguna)
    {
        return $this->db->delete('tbl_pengguna', array('id_pengguna' => $id_pengguna));
    }

    function hapus_by_id_role($id_role)
    {
        return $this->db->delete('tbl_pengguna', array('id_role' => $id_role));
    }

    function cek($data)
    {
        return $this->db->get_where('tbl_pengguna', $data);
    }

    function get_pengguna_by_id($id_pengguna)
    {
        $this->db->select('t1.*, t2.role, t3.nm_instansi');
        $this->db->join('tbl_role as t2', 't1.id_role = t2.id_role');
        $this->db->join('tbl_instansi as t3', 't1.id_instansi = t3.id_instansi', 'LEFT');
        $this->db->where('t1.id_pengguna', $id_pengguna);
        $this->db->from('tbl_pengguna as t1');
        $this->db->group_by('t1.id_pengguna');

        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_datatables($dt){
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $join = $dt['join'];
        $sql  = "SELECT {$columns}  FROM {$dt['table']} {$join}";

        // total all
        $rowCountAll = $this->db->query($sql)->num_rows();

        // pengkondisian aksi seperti next, search dan limit
        $columnd = $dt['col-display'];
        $count_c = count($columnd);

        // search
        $search = $dt['search']['value'];

        /**
         * Search Global
         * pencarian global pada pojok kanan atas
         */
        $where = '';

        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                $where .= ' ( ';

                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';

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

                $where .= $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                
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
                <a class="btn btn-warning" href="'.base_url('master/pengguna/ubah/' . $row->id_pengguna).'">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-hapus" href="javascript:;" data-url="'.base_url('master/pengguna/hapus/'.$row->id_pengguna).'">
                    <i class="fa fa-trash-o"></i>
                </a>
                ';

            $nm_lengkap = '<a href="'.base_url('master/pengguna/detail/' . $row->id_pengguna . '/' . url_title(strtolower($row->nm_lengkap))).'">'.$row->nm_lengkap.'</a>';

            $option['data'][] = array(
                                    $no,
                                    $row->username,
                                    $row->email,
                                    $nm_lengkap,
                                    $row->nm_instansi,
                                    $row->role,
                                    $aksi
                                );
            $no++;
        }
        echo json_encode($option);
    }
}