<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prestasi extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    function perbarui_prestasi_by_id($id_prestasi, $data)
    {
        return $this->db->update('tbl_prestasi', $data, array('id_prestasi' => $id_prestasi));
    }

    function tambah($data)
    {
        $this->db->insert('tbl_prestasi', $data);
        return $this->db->insert_id();
    }

    function hapus_by_id($id_prestasi)
    {
        return $this->db->delete('tbl_prestasi', array('id_prestasi' => $id_prestasi));
    }

    function hapus_by_id_mahasiswa($id_mahasiswa)
    {
        return $this->db->delete('tbl_prestasi', array('id_mahasiswa' => $id_mahasiswa));
    }

    function cek($data)
    {
        return $this->db->get_where('tbl_prestasi', $data);
    }

    function get_prestasi_by_id($id_prestasi)
    {
        $this->db->select('t1.*');
        $this->db->where('t1.id_prestasi', $id_prestasi);
        $this->db->from('tbl_prestasi as t1');

        $query = $this->db->get();
        return $query->row_array();
    }

    function get_prestasi_by_id_mahasiswa($id_mahasiswa)
    {
        $this->db->select('t1.*');
        $this->db->where('t1.id_mahasiswa', $id_mahasiswa);
        $this->db->from('tbl_prestasi as t1');

        $query = $this->db->get();
        return $query->result_array();
    }
}