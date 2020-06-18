<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');
        ($this->session->userdata('id_role') != 1 ? redirect('dashboard') : '');

        $this->load->model('M_pengguna');
        $this->load->model('M_role');
        $this->load->model('M_instansi');

        $this->data     = array();
        $this->templates= 'contents/master/pengguna/';
    }

    function index()
    {
        $this->data['title'] = 'Daftar Pengguna';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_list(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $datatables  = @$_POST;
        $datatables['table']    = 'tbl_pengguna as t1';
        $datatables['id-table'] = 't1.id_pengguna';
        
        /* Kolom yang ditampilkan */
        $datatables['col-display'] = array('t1.id_pengguna','t1.username', 't1.email', 't1.nm_lengkap', 't3.nm_instansi', 't2.role');
        
        /* Jika menggunakan table join */
        $datatables['join']    = ' JOIN tbl_role as t2 ON t2.id_role = t1.id_role
                                    LEFT JOIN tbl_instansi as t3 ON t3.id_instansi = t1.id_instansi
                                ';

        $this->M_pengguna->get_datatables($datatables);
    }

    function tambah()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tbl_pengguna.email]|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_pengguna.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('nm_lengkap', 'Nama lengkap', 'trim|required');
        $this->form_validation->set_rules('id_role', 'Role pengguna', 'trim|required');

        if($this->input->post('id_role') == 2){
            $this->form_validation->set_rules('id_instansi', 'Instansi', 'trim|required');
        }        

        $this->form_validation->set_message('valid_email', '{field} tidak valid!');
        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){
            $this->data['title'] = 'Tambah Data Pengguna';
            $this->load->view($this->templates . 'v_tambah', $this->data);
        } else {
            $data['username']       = $this->input->post('username');
            $data['password']       = sha1($this->input->post('password'));
            $data['email']          = $this->input->post('email');
            $data['nm_lengkap']     = $this->input->post('nm_lengkap');
            $data['id_role']        = $this->input->post('id_role');
            $data['id_instansi']    = $this->input->post('id_instansi');
            $data['created_at']     = date('Y-m-d H:i:s');
            $data['created_by']     = $this->session->userdata('id_pengguna');

            $this->M_pengguna->tambah($data);

            $this->session->set_flashdata('informasi', 'Data berhasil disimpan');
            redirect('master/pengguna');
        }
    }

    function ubah($id_pengguna)
    {
        if(!$id_pengguna){
            redirect('master/pengguna');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nm_lengkap', 'Nama lengkap', 'trim|required');
        $this->form_validation->set_rules('id_role', 'Role pengguna', 'trim|required');

        if($this->input->post('id_role') == 2){
            $this->form_validation->set_rules('id_instansi', 'Instansi', 'trim|required');
        }    

        $this->form_validation->set_message('valid_email', '{field} tidak valid!');
        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){

            $ubah = $this->M_pengguna->get_pengguna_by_id($id_pengguna);

            if(!$ubah){
                redirect('master/pengguna');
            }

            $this->data['ubah']         = $ubah;
            $this->data['title']        = 'Ubah Data Pengguna';

            $this->load->view($this->templates . 'v_ubah', $this->data);
        } else {            
            if($this->input->post('password')){
                $data['password'] = sha1($this->input->post('password'));
            }

            $data['username']       = $this->input->post('username');            
            $data['email']          = $this->input->post('email');
            $data['nm_lengkap']     = $this->input->post('nm_lengkap');
            $data['id_role']        = $this->input->post('id_role');
            $data['id_instansi']    = $this->input->post('id_instansi');
            $data['updated_at']     = date('Y-m-d H:i:s');
            $data['updated_by']     = $this->session->userdata('id_pengguna');

            $this->M_pengguna->perbarui_pengguna_by_id($id_pengguna, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('master/pengguna');
        }
    }

    function hapus($id_pengguna = null)
    {
        (!$this->input->is_ajax_request() ? show_404() : '');
        
        $this->M_pengguna->hapus_by_id($id_pengguna);

        echo json_encode(array('status' => true));
    }

    function detail($id_pengguna)
    {
        if(!$id_pengguna){
            redirect('master/pengguna');
        }

        $ubah = $this->M_pengguna->get_pengguna_by_id($id_pengguna);

        if(!$ubah){
            redirect('master/pengguna');
        }

        $this->data['ubah']     = $ubah;
        $this->data['title']    = 'Detail Pengguna';

        $this->load->view($this->templates . 'v_detail', $this->data);
    }

    function ajax_autocomplete_role(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $role = $this->M_role->get_all_autocomplete($cari);

        echo json_encode($role);
    }

    function ajax_autocomplete_instansi(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $instansi = $this->M_instansi->get_all_autocomplete($cari);

        echo json_encode($instansi);
    }
}
