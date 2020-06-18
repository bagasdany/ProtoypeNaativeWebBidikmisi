<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;

class Bina extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');

        $this->load->model('M_mahasiswa');
        $this->load->model('M_prestasi');
        $this->load->model('M_organisasi');
        $this->load->model('M_instansi');

        $this->data     = array();
        $this->templates= 'contents/mahasiswa/bina/';
    }

    function index()
    {
        $this->data['title'] = 'Daftar Mahasiswa Perlu Pembinaan';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_list(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $datatables  = @$_POST;
        $datatables['table']    = 'tbl_mahasiswa as t1';
        $datatables['id-table'] = 't1.id_mahasiswa';
        
        /* Kolom yang ditampilkan */
        $datatables['col-display'] = array('t1.id_mahasiswa','t1.nim', 't1.nm_mahasiswa', 't1.fakultas', 't1.program_studi', 't1.jumlah_prestasi', 't1.jumlah_organisasi', 't1.ipk' ,'t1.aktif');
        
        /* Jika menggunakan table join */
        $datatables['join']    = ' ';

        $this->M_mahasiswa->get_datatables_bina($datatables);
    }

    function ajax_autocomplete_instansi(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $instansi = $this->M_instansi->get_all_autocomplete($cari);

        echo json_encode($instansi);
    }

    function export($id_instansi = 'all'){

        $data       = $this->M_mahasiswa->get_data_export_bina_by_instansi($id_instansi);
        $filename   = 'daftar_mahasiswa_' . date('YmdHis');

        if($id_instansi != 'all'){
            $instansi = $this->M_instansi->get_instansi_by_id($id_instansi);
        }

        $this->data['data']         = $data;
        $this->data['nm_instansi']  = (isset($instansi) && !empty($instansi) ? $instansi['nm_instansi'] : '');

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