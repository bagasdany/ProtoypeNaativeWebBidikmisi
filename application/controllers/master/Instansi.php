<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');
        ($this->session->userdata('id_role') != 1 ? redirect('dashboard') : '');

        $this->load->model('M_instansi');

        $this->data     = array();
        $this->templates= 'contents/master/instansi/';
    }

    function index()
    {
        $this->data['title']        = 'Daftar Perguruan Tinggi';
        $this->data['description']  = 'Halaman Manajemen Perguruan Tinggi';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_list(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $datatables  = @$_POST;
        $datatables['table']    = 'tbl_instansi as t1';
        $datatables['id-table'] = 't1.id_instansi';
        
        /* Kolom yang ditampilkan */
        $datatables['col-display'] = array('t1.id_instansi','t1.kd_instansi', 't1.nm_instansi', 't1.alamat_instansi');
        
        /* Jika menggunakan table join */
        $datatables['join']    = ' ';

        $this->M_instansi->get_datatables($datatables);
    }

    function tambah()
    {
        $this->form_validation->set_rules('kd_instansi', 'Kode perguruan tinggi', 'trim|required|is_unique[tbl_instansi.kd_instansi]');
        $this->form_validation->set_rules('nm_instansi', 'Nama perguruan tinggi', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){
            $this->data['title'] = 'Tambah Data Perguruan Tinggi';
            $this->load->view($this->templates . 'v_tambah', $this->data);
        } else {
            $data['kd_instansi']    = $this->input->post('kd_instansi');
            $data['nm_instansi']    = $this->input->post('nm_instansi');
            $data['alamat_instansi']= $this->input->post('alamat_instansi');
            $data['no_telepon']     = $this->input->post('no_telepon');
            $data['no_fax']         = $this->input->post('no_fax');
            $data['email']          = $this->input->post('email');
            $data['created_at']     = date('Y-m-d H:i:s');
            $data['created_by']     = $this->session->userdata('id_pengguna');

            $this->M_instansi->tambah($data);

            $this->session->set_flashdata('informasi', 'Data berhasil disimpan');
            redirect('master/instansi');
        }
    }

    function ubah($id_instansi)
    {
        if(!$id_instansi){
            redirect('master/instansi');
        }

        $this->form_validation->set_rules('kd_instansi', 'Kode perguruan tinggi', 'trim|required');
        $this->form_validation->set_rules('nm_instansi', 'Nama perguruan tinggi', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){

            $ubah = $this->M_instansi->get_instansi_by_id($id_instansi);

            if(!$ubah){
                redirect('master/instansi');
            }

            $this->data['ubah']         = $ubah;
            $this->data['title']        = 'Ubah Data Perguruan Tinggi';

            $this->load->view($this->templates . 'v_ubah', $this->data);
        } else {            
            $data['kd_instansi']    = $this->input->post('kd_instansi');
            $data['nm_instansi']    = $this->input->post('nm_instansi');
            $data['alamat_instansi']= $this->input->post('alamat_instansi');
            $data['no_telepon']     = $this->input->post('no_telepon');
            $data['no_fax']         = $this->input->post('no_fax');
            $data['email']          = $this->input->post('email');
            $data['updated_at']     = date('Y-m-d H:i:s');
            $data['updated_by']     = $this->session->userdata('id_instansi');

            $this->M_instansi->perbarui_instansi_by_id($id_instansi, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('master/instansi');
        }
    }

    function hapus($id_instansi = null)
    {
        (!$this->input->is_ajax_request() ? show_404() : '');
        
        $this->M_instansi->hapus_by_id($id_instansi);

        echo json_encode(array('status' => true));
    }

    function detail($id_instansi)
    {
        if(!$id_instansi){
            redirect('master/instansi');
        }

        $ubah = $this->M_instansi->get_instansi_by_id($id_instansi);

        if(!$ubah){
            redirect('master/instansi');
        }

        $this->data['ubah']         = $ubah;
        $this->data['title']        = 'Detail Perguruan Tinggi';

        $this->load->view($this->templates . 'v_detail', $this->data);
    }
}
