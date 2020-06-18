<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;

class Traccer extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');

        $this->load->model('M_traccer');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_instansi');

        $this->data     = array();
        $this->templates= 'contents/mahasiswa/traccer/';
    }

    function index()
    {
        $this->data['title'] = 'Daftar Traccer Studi';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_list(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $datatables  = @$_POST;
        $datatables['table']    = 'tbl_traccer as t1';
        $datatables['id-table'] = 't1.id_traccer';
        
        /* Kolom yang ditampilkan */
        $datatables['col-display'] = array('t1.id_traccer','t2.nm_mahasiswa', 't1.gelar_terakhir', 't1.tanggal_lulus', 't1.nama_perusahaan', 't1.alamat_perusahaan', 't1.jabatan', 't1.tanggal_masuk');
        
        /* Jika menggunakan table join */
        $datatables['join']    = ' 
                                JOIN tbl_mahasiswa as t2 ON t1.id_mahasiswa = t2.id_mahasiswa
                            ';

        $this->M_traccer->get_datatables($datatables);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'Nama perusahaan', 'trim|required');
        $this->form_validation->set_rules('gelar_terakhir', 'Gelar terakhir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lulus', 'Tanggal lulus', 'trim|required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('id_mahasiswa', 'Nama mahasiswa', 'trim|required|is_unique[tbl_traccer.id_mahasiswa]');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){
            $this->data['title'] = 'Tambah Data Traccer Studi';
            $this->load->view($this->templates . 'v_tambah', $this->data);
        } else {
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $tanggal_masuk = str_replace('/', '-', $tanggal_masuk);
            $tanggal_lulus = $this->input->post('tanggal_lulus');
            $tanggal_lulus = str_replace('/', '-', $tanggal_lulus);

            $data['nama_perusahaan']        = $this->input->post('nama_perusahaan');
            $data['alamat_perusahaan']      = $this->input->post('alamat_perusahaan');
            $data['jabatan']                = $this->input->post('jabatan');
            $data['id_mahasiswa']           = $this->input->post('id_mahasiswa');
            $data['gelar_terakhir']         = $this->input->post('gelar_terakhir');
            $data['tanggal_masuk']          = date('Y-m-d', strtotime($tanggal_masuk));
            $data['tanggal_lulus']          = date('Y-m-d', strtotime($tanggal_lulus));
            $data['created_at']             = date('Y-m-d H:i:s');
            $data['created_by']             = $this->session->userdata('id_pengguna');

            $this->M_traccer->tambah($data);

            $this->session->set_flashdata('informasi', 'Data berhasil disimpan');
            redirect('mahasiswa/traccer');
        }
    }

    function ubah($id_traccer)
    {
        if(!$id_traccer){
            redirect('mahasiswa/traccer');
        }

        $this->form_validation->set_rules('nama_perusahaan', 'Nama perusahaan', 'trim|required');
        $this->form_validation->set_rules('gelar_terakhir', 'Gelar terakhir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lulus', 'Tanggal lulus', 'trim|required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal masuk', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('id_mahasiswa', 'Nama mahasiswa', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi!');
        $this->form_validation->set_message('is_unique', '{field} sudah tersedia!');

        if($this->form_validation->run() == FALSE){

            $ubah = $this->M_traccer->get_traccer_by_id($id_traccer);

            if(!$ubah){
                redirect('mahasiswa/traccer');
            }

            $this->data['ubah']         = $ubah;
            $this->data['title']        = 'Ubah Data Traccer Studi';

            $this->load->view($this->templates . 'v_ubah', $this->data);
        } else {            
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $tanggal_masuk = str_replace('/', '-', $tanggal_masuk);
            $tanggal_lulus = $this->input->post('tanggal_lulus');
            $tanggal_lulus = str_replace('/', '-', $tanggal_lulus);

            $data['nama_perusahaan']        = $this->input->post('nama_perusahaan');
            $data['alamat_perusahaan']      = $this->input->post('alamat_perusahaan');
            $data['jabatan']                = $this->input->post('jabatan');
            $data['id_mahasiswa']           = $this->input->post('id_mahasiswa');
            $data['gelar_terakhir']         = $this->input->post('gelar_terakhir');
            $data['tanggal_masuk']          = date('Y-m-d', strtotime($tanggal_masuk));
            $data['tanggal_lulus']          = date('Y-m-d', strtotime($tanggal_lulus));
            $data['updated_at']             = date('Y-m-d H:i:s');
            $data['updated_by']             = $this->session->userdata('id_instansi');

            $this->M_traccer->perbarui_traccer_by_id($id_traccer, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('mahasiswa/traccer');
        }
    }

    function hapus($id_traccer = null)
    {
        (!$this->input->is_ajax_request() ? show_404() : '');
        
        $this->M_traccer->hapus_by_id($id_traccer);

        echo json_encode(array('status' => true));
    }

    function detail($id_traccer)
    {
        if(!$id_traccer){
            redirect('mahasiswa/traccer');
        }

        $ubah = $this->M_traccer->get_traccer_by_id($id_traccer);

        if(!$ubah){
            redirect('mahasiswa/traccer');
        }

        $this->data['ubah']         = $ubah;
        $this->data['title']        = 'Detail Traccer Studi';

        $this->load->view($this->templates . 'v_detail', $this->data);
    }

    function ajax_autocomplete_mahasiswa(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari           = $this->input->get('q');
        $id_instansi    = $this->input->get('id_instansi');

        $mahasiswa = $this->M_mahasiswa->get_all_autocomplete_traccer($cari, $id_instansi);

        echo json_encode($mahasiswa);
    }

    function ajax_autocomplete_instansi(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $instansi = $this->M_instansi->get_all_autocomplete($cari);

        echo json_encode($instansi);
    }

    function export($id_instansi = 'all'){

        $data       = $this->M_traccer->get_traccer_export_by_instansi($id_instansi);
        $filename   = 'daftar_mahasiswa_' . date('YmdHis');

        $this->data['data'] = $data;

        $html = $this->load->view($this->templates.'v_export', $this->data, true);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array("Attachment" => 0) );
    }
}