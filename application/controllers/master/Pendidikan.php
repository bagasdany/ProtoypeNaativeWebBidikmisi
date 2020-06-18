<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');
        ($this->session->userdata('id_role') != 1 ? redirect('dashboard') : '');

        $this->load->model('M_pendidikan');

        $this->data     = array();
        $this->templates= 'contents/master/pendidikan/';
    }

    function index()
    {
        $this->data['title'] = 'Daftar Pendidikan';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_list(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $datatables  = @$_POST;
        $datatables['table']    = 'tbl_pendidikan as t1';
        $datatables['id-table'] = 't1.id_pendidikan';
        
        /* Kolom yang ditampilkan */
        $datatables['col-display'] = array('t1.id_pendidikan','t1.nm_pendidikan');
        
        /* Jika menggunakan table join */
        $datatables['join']    = ' ';

        $this->M_pendidikan->get_datatables($datatables);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nm_pendidikan', 'Pendidikan', 'trim|required|is_unique[tbl_pendidikan.nm_pendidikan]');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){
            $this->data['title'] = 'Tambah Data Pendidikan';
            $this->load->view($this->templates . 'v_tambah', $this->data);
        } else {
            $data['nm_pendidikan']  = $this->input->post('nm_pendidikan');
            $data['created_at']     = date('Y-m-d H:i:s');
            $data['created_by']     = $this->session->userdata('id_pengguna');

            $this->M_pendidikan->tambah($data);

            $this->session->set_flashdata('informasi', 'Data berhasil disimpan');
            redirect('master/pendidikan');
        }
    }

    function ubah($id_pendidikan)
    {
        if(!$id_pendidikan){
            redirect('master/pendidikan');
        }

        $this->form_validation->set_rules('nm_pendidikan', 'Nama bank', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){

            $ubah = $this->M_pendidikan->get_pendidikan_by_id($id_pendidikan);

            if(!$ubah){
                redirect('master/pendidikan');
            }

            $this->data['ubah']         = $ubah;
            $this->data['title']        = 'Ubah Data Pendidikan';

            $this->load->view($this->templates . 'v_ubah', $this->data);
        } else {            
            $data['nm_pendidikan']  = $this->input->post('nm_pendidikan');
            $data['updated_at']     = date('Y-m-d H:i:s');
            $data['updated_by']     = $this->session->userdata('id_pendidikan');

            $this->M_pendidikan->perbarui_pendidikan_by_id($id_pendidikan, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('master/pendidikan');
        }
    }

    function hapus($id_pendidikan = null)
    {
        (!$this->input->is_ajax_request() ? show_404() : '');
        
        $this->M_pendidikan->hapus_by_id($id_pendidikan);

        echo json_encode(array('status' => true));
    }

    function detail($id_pendidikan)
    {
        if(!$id_pendidikan){
            redirect('master/pendidikan');
        }

        $ubah = $this->M_pendidikan->get_pendidikan_by_id($id_pendidikan);

        if(!$ubah){
            redirect('master/pendidikan');
        }

        $this->data['ubah']     = $ubah;
        $this->data['title']    = 'Detail Pendidikan';

        $this->load->view($this->templates . 'v_detail', $this->data);
    }
}
