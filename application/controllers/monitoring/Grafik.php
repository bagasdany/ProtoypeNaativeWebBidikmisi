<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');
        ($this->session->userdata('id_role') != 1 ? redirect('dashboard') : '');

        $this->load->model('M_mahasiswa');
        $this->load->model('M_traccer');
        $this->load->model('M_instansi');

        $this->data     = array();
        $this->templates= 'contents/monitoring/grafik/';
    }

    function index()
    {
        $instansi    = $this->M_instansi->get_first_instansi();
        $id_instansi = (isset($instansi) && !empty($instansi) ? $instansi['id_instansi'] : '');  
        $id_instansi = ($this->input->post('id_instansi') ? $this->input->post('id_instansi') : $id_instansi);

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK
        | -------------------------------------------------------------------
        */
        $array_ipk  = array('2.0 - 2.5', '2.51 - 3.09', '3.10 - 3.50', '3.51 - 4.00');
        $ipk        = '';
        $nomor      = 1;
        $total_data = count($array_ipk);

        foreach($array_ipk as $value){
            $total = $this->M_mahasiswa->get_total_mahasiswa_by_ipk($value, $id_instansi);

            $ipk .= "['".$value."', ".$total."]";
            $ipk .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['ipk'] = $ipk;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA PERLU PEMBINAAN
        | -------------------------------------------------------------------
        */
        $array_bina = array('Mahasiswa Perlu Pembinaan' => 0, 'Lulus' => 1);
        $pembinaan  = '';
        $nomor      = 1;
        $total_data = count($array_bina);

        foreach($array_bina as $key => $value){
            $total = $this->M_mahasiswa->get_total_mahasiswa_by_pembinaan($value, $id_instansi);

            $pembinaan .= "['".$key."', ".$total."]";
            $pembinaan .= ($nomor < $total_data ? ', ' : '');
            
            $nomor++;
        }

        $this->data['pembinaan'] = $pembinaan;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA PERLU PEMBINAAN
        | -------------------------------------------------------------------
        */
        $array_bina = array('Perlu Pembinaan' => 0, 'Lulus' => 1);
        $pembinaan  = '';
        $nomor      = 1;
        $total_data = count($array_bina);

        foreach($array_bina as $key => $value){
            $total = $this->M_mahasiswa->get_total_mahasiswa_by_pembinaan($value, $id_instansi);

            $pembinaan .= "['".$key."', ".$total."]";
            $pembinaan .= ($nomor < $total_data ? ', ' : '');
            
            $nomor++;
        }

        $this->data['pembinaan'] = $pembinaan;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN PRESTASI
        | -------------------------------------------------------------------
        */
        $array_prestasi = array('Akademik', 'Non Akademik');
        $prestasi       = '';
        $nomor          = 1;
        $total_data     = count($array_prestasi);

        foreach($array_prestasi as $value){
            $total = $this->M_mahasiswa->get_total_mahasiswa_punya_prestasi($value, $id_instansi);

            $prestasi .= "['".$value."', ".$total."]";
            $prestasi .= ($nomor < $total_data ? ', ' : '');
            
            $nomor++;
        }

        $this->data['prestasi'] = $prestasi;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN ORGANISASI
        | -------------------------------------------------------------------
        */
        $array_organisasi   = array('Aktif' => 1, 'Tidak Aktif' => 0);
        $organisasi         = '';
        $nomor              = 1;
        $total_data         = count($array_organisasi);

        foreach($array_organisasi as $key => $value){
            $total = $this->M_mahasiswa->get_total_mahasiswa_punya_organisasi($value, $id_instansi);

            $organisasi .= "['".$key."', ".$total."]";
            $organisasi .= ($nomor < $total_data ? ', ' : '');
            
            $nomor++;
        }

        $this->data['organisasi'] = $organisasi;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN TRACER STUDY
        | -------------------------------------------------------------------
        */
        $array_traccer  = array('> 6 Bulan' => 0, '1 - 6 Bulan' => 1, 'Langsung Kerja' => 2);
        $traccer        = '';
        $nomor          = 1;
        $total_data     = count($array_traccer);

        foreach($array_traccer as $key => $value){
            $total = $this->M_traccer->get_total_mahasiswa_traccer($value, $id_instansi);

            $traccer .= "['".$key."', ".$total."]";
            $traccer .= ($nomor < $total_data ? ', ' : '');
            
            $nomor++;
        }

        $this->data['traccer'] = $traccer;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA PERLU PEMBINAAN
        | -------------------------------------------------------------------
        */
        $array_aktif_tidak_aktif = array('Aktif' => 'Ya', 'Tidak Aktif' => 'Tidak');
        $aktif_tidak_aktif      = '';
        $nomor                  = 1;
        $total_data             = count($array_aktif_tidak_aktif);

        foreach($array_aktif_tidak_aktif as $key => $value){
            $total = $this->M_mahasiswa->get_total_mahasiswa_by_aktif_tidak_aktif($value, $id_instansi);

            $aktif_tidak_aktif .= "['".$key."', ".$total."]";
            $aktif_tidak_aktif .= ($nomor < $total_data ? ', ' : '');
            
            $nomor++;
        }

        $this->data['aktif_tidak_aktif'] = $aktif_tidak_aktif;

        $ubah = $this->M_instansi->get_instansi_by_id($id_instansi);

        $this->data['ubah']     = $ubah;
        $this->data['title']    = 'Grafik Data Per Instansi/Perguruan Tinggi';

        $this->load->view($this->templates . 'v_index', $this->data);
    }

    function ajax_autocomplete_instansi(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $instansi = $this->M_instansi->get_all_autocomplete($cari);

        echo json_encode($instansi);
    }
}