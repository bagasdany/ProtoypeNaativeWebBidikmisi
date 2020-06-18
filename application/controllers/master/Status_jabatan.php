<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_jabatan extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');
        ($this->session->userdata('id_role') != 1 ? redirect('dashboard') : '');

        $this->load->model('M_status_jabatan');

        $this->data     = array();
        $this->templates= 'contents/master/status_jabatan/';
    }

    function index()
    {
        $this->data['title'] = 'Daftar Status Jabatan';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_list(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $datatables  = @$_POST;
        $datatables['table']    = 'tbl_status_jabatan as t1';
        $datatables['id-table'] = 't1.id_status_jabatan';
        
        /* Kolom yang ditampilkan */
        $datatables['col-display'] = array('t1.id_status_jabatan','t1.nm_status_jabatan');
        
        /* Jika menggunakan table join */
        $datatables['join']    = ' ';

        $this->M_status_jabatan->get_datatables($datatables);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nm_status_jabatan', 'Status jabatan', 'trim|required|is_unique[tbl_status_jabatan.nm_status_jabatan]');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){
            $this->data['title'] = 'Tambah Data Status Jabatan';
            $this->load->view($this->templates . 'v_tambah', $this->data);
        } else {
            $data['nm_status_jabatan']  = $this->input->post('nm_status_jabatan');
            $data['created_at']         = date('Y-m-d H:i:s');
            $data['created_by']         = $this->session->userdata('id_pengguna');

            $this->M_status_jabatan->tambah($data);

            $this->session->set_flashdata('informasi', 'Data berhasil disimpan');
            redirect('master/status-jabatan');
        }
    }

    function ubah($id_status_jabatan)
    {
        if(!$id_status_jabatan){
            redirect('master/status-jabatan');
        }

        $this->form_validation->set_rules('nm_status_jabatan', 'Nama bank', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){

            $ubah = $this->M_status_jabatan->get_status_jabatan_by_id($id_status_jabatan);

            if(!$ubah){
                redirect('master/status-jabatan');
            }

            $this->data['ubah']         = $ubah;
            $this->data['title']        = 'Ubah Data Status Jabatan';

            $this->load->view($this->templates . 'v_ubah', $this->data);
        } else {            
            $data['nm_status_jabatan']  = $this->input->post('nm_status_jabatan');
            $data['updated_at']         = date('Y-m-d H:i:s');
            $data['updated_by']         = $this->session->userdata('id_status_jabatan');

            $this->M_status_jabatan->perbarui_status_jabatan_by_id($id_status_jabatan, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('master/status-jabatan');
        }
    }

    function hapus($id_status_jabatan = null)
    {
        (!$this->input->is_ajax_request() ? show_404() : '');
        
        $this->M_status_jabatan->hapus_by_id($id_status_jabatan);

        echo json_encode(array('status' => true));
    }

    function detail($id_status_jabatan)
    {
        if(!$id_status_jabatan){
            redirect('master/status-jabatan');
        }

        $ubah = $this->M_status_jabatan->get_status_jabatan_by_id($id_status_jabatan);

        if(!$ubah){
            redirect('master/status-jabatan');
        }

        $this->data['ubah']         = $ubah;
        $this->data['title']        = 'Detail Bank';

        $this->load->view($this->templates . 'v_detail', $this->data);
    }
}
