<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_organisasi extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    function perbarui_organisasi_by_id($id_organisasi, $data)
    {
        return $this->db->update('tbl_organisasi', $data, array('id_organisasi' => $id_organisasi));
    }

    function tambah($data)
    {
        $this->db->insert('tbl_organisasi', $data);
        return $this->db->insert_id();
    }

    function hapus_by_id($id_organisasi)
    {
        return $this->db->delete('tbl_organisasi', array('id_organisasi' => $id_organisasi));
    }

    function hapus_by_id_mahasiswa($id_mahasiswa)
    {
        return $this->db->delete('tbl_organisasi', array('id_mahasiswa' => $id_mahasiswa));
    }

    function cek($data)
    {
        return $this->db->get_where('tbl_organisasi', $data);
    }

    function get_organisasi_by_id($id_organisasi)
    {
        $this->db->select('t1.*');
        $this->db->where('t1.id_organisasi', $id_organisasi);
        $this->db->from('tbl_organisasi as t1');

        $query = $this->db->get();
        return $query->row_array();
    }

    function get_organisasi_by_id_mahasiswa($id_mahasiswa)
    {
        $this->db->select('t1.*, t2.nm_status_jabatan');
        $this->db->join('tbl_status_jabatan as t2', 't2.id_status_jabatan = t1.id_status_jabatan', 'LEFT');
        $this->db->where('t1.id_mahasiswa', $id_mahasiswa);
        $this->db->from('tbl_organisasi as t1');

        $query = $this->db->get();
        return $query->result_array();
    }
}