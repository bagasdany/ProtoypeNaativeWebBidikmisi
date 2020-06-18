<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');
        ($this->session->userdata('id_role') != 1 ? redirect('dashboard') : '');

        $this->load->model('M_bank');

        $this->data     = array();
        $this->templates= 'contents/master/bank/';
    }

    function index()
    {
        $this->data['title'] = 'Daftar Bank';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_list(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $datatables  = @$_POST;
        $datatables['table']    = 'tbl_bank as t1';
        $datatables['id-table'] = 't1.id_bank';
        
        /* Kolom yang ditampilkan */
        $datatables['col-display'] = array('t1.id_bank','t1.kd_bank', 't1.nm_bank');
        
        /* Jika menggunakan table join */
        $datatables['join']    = ' ';

        $this->M_bank->get_datatables($datatables);
    }

    function tambah()
    {
        $this->form_validation->set_rules('kd_bank', 'Kode bank', 'trim|required');
        $this->form_validation->set_rules('nm_bank', 'Nama bank', 'trim|required|is_unique[tbl_bank.nm_bank]');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){
            $this->data['title'] = 'Tambah Data Bank';
            $this->load->view($this->templates . 'v_tambah', $this->data);
        } else {
            $data['kd_bank']        = $this->input->post('kd_bank');
            $data['nm_bank']        = $this->input->post('nm_bank');
            $data['created_at']     = date('Y-m-d H:i:s');
            $data['created_by']     = $this->session->userdata('id_pengguna');

            $this->M_bank->tambah($data);

            $this->session->set_flashdata('informasi', 'Data berhasil disimpan');
            redirect('master/bank');
        }
    }

    function ubah($id_bank)
    {
        if(!$id_bank){
            redirect('master/bank');
        }

        $this->form_validation->set_rules('kd_bank', 'Kode bank', 'trim|required');
        $this->form_validation->set_rules('nm_bank', 'Nama bank', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){

            $ubah = $this->M_bank->get_bank_by_id($id_bank);

            if(!$ubah){
                redirect('master/bank');
            }

            $this->data['ubah']         = $ubah;
            $this->data['title']        = 'Ubah Data Bank';

            $this->load->view($this->templates . 'v_ubah', $this->data);
        } else {            
            $data['kd_bank']        = $this->input->post('kd_bank');
            $data['nm_bank']        = $this->input->post('nm_bank');
            $data['updated_at']     = date('Y-m-d H:i:s');
            $data['updated_by']     = $this->session->userdata('id_bank');

            $this->M_bank->perbarui_bank_by_id($id_bank, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('master/bank');
        }
    }

    function hapus($id_bank = null)
    {
        (!$this->input->is_ajax_request() ? show_404() : '');
        
        $this->M_bank->hapus_by_id($id_bank);

        echo json_encode(array('status' => true));
    }

    function detail($id_bank)
    {
        if(!$id_bank){
            redirect('master/bank');
        }

        $ubah = $this->M_bank->get_bank_by_id($id_bank);

        if(!$ubah){
            redirect('master/bank');
        }

        $this->data['ubah']         = $ubah;
        $this->data['title']        = 'Detail Bank';

        $this->load->view($this->templates . 'v_detail', $this->data);
    }
}
