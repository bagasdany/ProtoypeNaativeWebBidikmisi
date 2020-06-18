<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_all_autocomplete($cari){
        $this->db->select('t1.*');

        $where = '1=1';

        if($cari){
            $where .= " AND (t1.kode LIKE '%".$cari."%') ";
        }
        
        $this->db->where($where);
        $this->db->from('tbl_role as t1');
        $this->db->order_by('t1.id_role', 'ASC');
        $this->db->limit(25);

        $query  = $this->db->get();
        $data   = array();

        if($query->num_rows() > 0){

            $row = array();
            
            foreach($query->result() as $row_data){
                $row['id']      = $row_data->id_role;
                $row['text']    = $row_data->role;

                $data[] = $row;
            }
        }
        return $data;
    }
}