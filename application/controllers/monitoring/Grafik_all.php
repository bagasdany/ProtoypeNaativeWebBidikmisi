<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_all extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');
        ($this->session->userdata('id_role') != 1 ? redirect('dashboard') : '');

        $this->load->model('M_mahasiswa');
        $this->load->model('M_traccer');
        $this->load->model('M_instansi');

        $this->data     = array();
        $this->templates= 'contents/monitoring/grafik_all/';
    }

    function index()
    {
        $array_instansi  = $this->M_instansi->get_all_instansi();

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '3.51 - 4.00'
        | -------------------------------------------------------------------
        */
        $ipk_a          = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_instansi_by_ipk('3.51 - 4.00', $row['id_instansi']);

            $ipk_a .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $ipk_a .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['ipk_a'] = $ipk_a;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '3.00 - 3.50'
        | -------------------------------------------------------------------
        */
        $ipk_b          = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_instansi_by_ipk('3.00 - 3.50', $row['id_instansi']);

            $ipk_b .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $ipk_b .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['ipk_b'] = $ipk_b;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '2.50 - 2.99'
        | -------------------------------------------------------------------
        */
        $ipk_c          = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_instansi_by_ipk('2.50 - 2.99', $row['id_instansi']);

            $ipk_c .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $ipk_c .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['ipk_c'] = $ipk_c;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN IPK '0 - 2.49'
        | -------------------------------------------------------------------
        */
        $ipk_d          = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_instansi_by_ipk('0 - 2.49', $row['id_instansi']);

            $ipk_d .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $ipk_d .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['ipk_d'] = $ipk_d;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA PERLU PEMBINAAN
        | -------------------------------------------------------------------
        */
        $bina            = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_instansi_by_pembinaan($row['id_instansi']);

            $bina .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $bina .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['bina'] = $bina;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERPRESTASI
        | -------------------------------------------------------------------
        */
        $prestasi       = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_instansi_punya_prestasi($row['id_instansi']);

            $prestasi .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $prestasi .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['prestasi'] = $prestasi;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA AKTIF BERORGANISASI
        | -------------------------------------------------------------------
        */
        $organisasi     = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_instansi_punya_organisasi($row['id_instansi']);

            $organisasi .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $organisasi .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['organisasi'] = $organisasi;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERSTATUS AKTIF
        | -------------------------------------------------------------------
        */
        $status_aktif     = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_mahasiswa->get_total_mahasiswa_by_aktif($row['id_instansi']);

            $status_aktif .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $status_aktif .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['status_aktif'] = $status_aktif;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN TRACCER STUDI (LANGSUNG KERJA)
        | -------------------------------------------------------------------
        */
        $traccer_a     = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_traccer->get_total_mahasiswa_instansi_traccer('2',$row['id_instansi']);

            $traccer_a .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $traccer_a .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['traccer_a'] = $traccer_a;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN TRACCER STUDI (1 - 6 BULAN)
        | -------------------------------------------------------------------
        */
        $traccer_b      = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_traccer->get_total_mahasiswa_instansi_traccer('1', $row['id_instansi']);

            $traccer_b .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $traccer_b .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['traccer_b'] = $traccer_b;

        /*
        | -------------------------------------------------------------------
        | GRAFIK MAHASISWA BERDASARKAN TRACCER STUDI (> 6 BULAN)
        | -------------------------------------------------------------------
        */
        $traccer_c      = '';
        $nomor          = 1;
        $total_data     = count($array_instansi);

        foreach($array_instansi as $row){
            $total = $this->M_traccer->get_total_mahasiswa_instansi_traccer('0', $row['id_instansi']);

            $traccer_c .= "{
                        name: '".$row['nm_instansi']."',
                        y: ".$total."
                    }";
            $traccer_c .= ($nomor < $total_data ? ', ' : '');

            $nomor++;
        }

        $this->data['traccer_c'] = $traccer_c;

        $this->data['title']    = 'Grafik Data';

        $this->load->view($this->templates . 'v_index', $this->data);
    }
}