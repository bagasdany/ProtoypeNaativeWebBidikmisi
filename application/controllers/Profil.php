<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');

        $this->load->model('M_pengguna');

        $this->data     = array();
        $this->templates= 'contents/profil/';
    }

    function index()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');

        $this->data['ubah']     = $this->M_pengguna->get_pengguna_by_id($id_pengguna);
        $this->data['title']    = 'Profil Saya';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ubah_profil()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');

        if($this->input->post()){
            $data['email']          = $this->input->post('email');
            $data['nm_lengkap']     = $this->input->post('nm_lengkap');
            $data['updated_at']     = date('Y-m-d H:i:s');
            $data['updated_by']     = $this->session->userdata('id_pengguna');

            $this->M_pengguna->perbarui_pengguna_by_id($id_pengguna, $data);

            $this->session->set_userdata('email', $data['email']);
            $this->session->set_userdata('nm_lengkap', $data['nm_lengkap']);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('profil');
        }

        $this->data['ubah']     = $this->M_pengguna->get_pengguna_by_id($id_pengguna);
        $this->data['title']    = 'Ubah Profil';

        $this->load->view($this->templates . 'v_ubah_profil', $this->data);
    }

    function ubah_password()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');

        if($this->input->post()){
            $data['password']       = sha1($this->input->post('password'));
            $data['updated_at']     = date('Y-m-d H:i:s');
            $data['updated_by']     = $this->session->userdata('id_pengguna');

            $this->M_pengguna->perbarui_pengguna_by_id($id_pengguna, $data);

            $this->session->set_userdata('password', $data['password']);
            
            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('profil/ubah-password');
        }

        $this->data['ubah']     = $this->M_pengguna->get_pengguna_by_id($id_pengguna);
        $this->data['title']    = 'Ubah Password';

        $this->load->view($this->templates . 'v_ubah_password', $this->data);
    }

    function ajax_cek_password_lama(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $password       = $this->input->post('password');
        $password_lama  = $this->session->userdata('password');

        if(sha1($password) != $password_lama){
            echo "1";
        } 
    }
}