<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_status_jabatan extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_all_autocomplete($cari){
        $this->db->select('t1.*');

        $where = '1=1';

        if($cari){
            $where .= " AND (t1.nm_status_jabatan  LIKE '%".$cari."%') ";
        }
        
        $this->db->where($where);
        $this->db->from('tbl_status_jabatan as t1');
        $this->db->order_by('t1.nm_status_jabatan', 'ASC');
        $this->db->limit(25);

        $query  = $this->db->get();
        $data   = array();

        if($query->num_rows() > 0){

            $row = array();
            
            foreach($query->result() as $row_data){
                $row['id']      = $row_data->id_status_jabatan;
                $row['text']    = $row_data->nm_status_jabatan;

                $data[] = $row;
            }
        }
        return $data;
    }

    function perbarui_status_jabatan_by_id($id_status_jabatan, $data)
    {
        return $this->db->update('tbl_status_jabatan', $data, array('id_status_jabatan' => $id_status_jabatan));
    }

    function tambah($data)
    {
        $this->db->insert('tbl_status_jabatan', $data);
        return $this->db->insert_id();
    }

    function hapus_by_id($id_status_jabatan)
    {
        return $this->db->delete('tbl_status_jabatan', array('id_status_jabatan' => $id_status_jabatan));
    }

    function hapus_by_id_role($id_role)
    {
        return $this->db->delete('tbl_status_jabatan', array('id_role' => $id_role));
    }

    function cek($data)
    {
        return $this->db->get_where('tbl_status_jabatan', $data);
    }

    function get_status_jabatan_by_id($id_status_jabatan)
    {
        $this->db->select('t1.*');
        $this->db->where('t1.id_status_jabatan', $id_status_jabatan);
        $this->db->from('tbl_status_jabatan as t1');

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
                <a class="btn btn-warning" href="'.base_url('master/status_jabatan/ubah/' . $row->id_status_jabatan).'">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-hapus" href="javascript:;" data-url="'.base_url('master/status_jabatan/hapus/'.$row->id_status_jabatan).'">
                    <i class="fa fa-trash-o"></i>
                </a>
                ';

            $nm_status_jabatan = '<a href="'.base_url('master/status_jabatan/detail/' . $row->id_status_jabatan . '/' . url_title(strtolower($row->nm_status_jabatan))).'">'.$row->nm_status_jabatan.'</a>';

            $option['data'][] = array(
                                    $no,
                                    $nm_status_jabatan,
                                    $aksi
                                );
            $no++;
        }
        echo json_encode($option);
    }
}