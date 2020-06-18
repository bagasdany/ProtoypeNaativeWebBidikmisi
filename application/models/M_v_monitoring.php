<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_v_monitoring extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_all_data(){
        $this->db->select('t1.*');
        $this->db->from('v_monitoring as t1');
        $this->db->order_by('t1.kd_instansi', 'ASC');

        return $this->db->get()->result_array();
    }

    /*
    | -------------------------------------------------------------------
    | DAFTAR MONITORING
    | -------------------------------------------------------------------
    */
    function get_datatables($dt){
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];
        $join = $dt['join'];
        $sql  = "SELECT {$columns}  FROM {$dt['table']} {$join}";

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
        $where = '1=1';

        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                
                if($i == 0){
                    $where .= ' AND ';
                }

                $where .= '  ( ';

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

                $where .= ' AND ( ';

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

            $nm_instansi = '<a href="'.base_url('monitoring/data/detail/' . $row->id_instansi . '/' . url_title(strtolower($row->kd_instansi)) . '/' . url_title(strtolower($row->nm_instansi))).'"><strong>'.$row->nm_instansi.'</strong></a>';


            $option['data'][] = array(
                                    $no,
                                    $row->kd_instansi,
                                    $nm_instansi,
                                    $row->ipk_d,
                                    $row->ipk_c,
                                    $row->ipk_b,
                                    $row->ipk_a,
                                    $row->total_mahasiswa,
                                    $row->total_prestasi,
                                    $row->total_organisasi,
                                    $row->traccer_a,
                                    $row->traccer_b,
                                    $row->traccer_c,
                                );
            $no++;
        }
        echo json_encode($option);
    }
}