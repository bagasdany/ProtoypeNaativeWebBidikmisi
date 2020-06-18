<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');

        $this->load->model('M_instansi');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_traccer');

        $this->data     = array();
        $this->templates= 'contents/dashboard/';
    }

    function index()
    {
        if($this->session->userdata('id_role') == 1){

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
            | GRAFIK MAHASISWA BERDASARKAN IPK '0 - 2.5'
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

            $this->data['total_mahasiswa']      = $this->M_mahasiswa->get_total_mahasiswa_by_instansi();
            $this->data['total_bina']           = $this->M_mahasiswa->get_total_mahasiswa_by_pembinaan('0', '', true);
            $this->data['total_prestasi']       = $this->M_mahasiswa->get_total_mahasiswa_instansi_punya_prestasi('', true);
            $this->data['total_traccer']        = $this->M_traccer->get_total_mahasiswa_by_instansi();

            $this->data['title'] = 'Dashboard';
        
            $this->load->view($this->templates . 'v_index', $this->data);
        } else {

            /*
            | -------------------------------------------------------------------
            | Grafik Total Mahasiswa Berdasarkan Jenis Kelamin Masing-Masing Fakultas
            | -------------------------------------------------------------------
            */

            $fakultas       = $this->M_mahasiswa->get_all_fakultas_by_instansi();
            $total_data     = $this->M_mahasiswa->get_total_fakultas_by_instansi();
            $nomor          = 1;
            $fakultas_data  = '';

            foreach($fakultas as $row){
                $fakultas_data .= "'".$row['fakultas']."'";
                $fakultas_data .= ($nomor < $total_data ? ', ' : '');

                $nomor++;
            }

            $array_jk           = array('Laki-laki' => 'L', 'Perempuan' => 'P');
            $total_data_jk      = count($array_jk);
            $fakultas_mahasiswa = '';
            $nomor              = 1;
            foreach($array_jk as $key => $value){
                $fakultas_mahasiswa .= "{name: '".$key."',data: [";

                $nomor2 = 1;

                foreach($fakultas as $row){
                    $fakultas_mahasiswa .= $this->M_mahasiswa->get_total_mahasiswa_by_instansi_fakultas($row['fakultas'], $value);
                    $fakultas_mahasiswa .= ($nomor2 < $total_data ? ', ' : '');
                    $nomor2++;
                }
                
                $fakultas_mahasiswa .= "]}";
                $fakultas_mahasiswa .= ($nomor < $total_data_jk ? ', ' : '');

                $nomor++;
            }

            $this->data['fakultas_data']        = $fakultas_data;
            $this->data['fakultas_mahasiswa']   = $fakultas_mahasiswa;

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
                $total = $this->M_mahasiswa->get_total_mahasiswa_by_ipk($value);

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
                $total = $this->M_mahasiswa->get_total_mahasiswa_by_pembinaan($value);

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
                $total = $this->M_mahasiswa->get_total_mahasiswa_by_pembinaan($value);

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
                $total = $this->M_mahasiswa->get_total_mahasiswa_punya_prestasi($value);

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
                $total = $this->M_mahasiswa->get_total_mahasiswa_punya_organisasi($value);

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
                $total = $this->M_traccer->get_total_mahasiswa_traccer($value);

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
                $total = $this->M_mahasiswa->get_total_mahasiswa_by_aktif_tidak_aktif($value);

                $aktif_tidak_aktif .= "['".$key."', ".$total."]";
                $aktif_tidak_aktif .= ($nomor < $total_data ? ', ' : '');
                
                $nomor++;
            }

            $this->data['aktif_tidak_aktif'] = $aktif_tidak_aktif;

            $this->data['total_mahasiswa']      = $this->M_mahasiswa->get_total_mahasiswa_by_instansi();
            $this->data['total_fakultas']       = $this->M_mahasiswa->get_total_fakultas_by_instansi();
            $this->data['total_program_studi']  = $this->M_mahasiswa->get_total_program_studi_by_instansi();
            $this->data['total_traccer']        = $this->M_traccer->get_total_mahasiswa_by_instansi();
            $this->data['title']                = 'Dashboard';
            
            $this->load->view($this->templates . 'v_index_admin_instansi', $this->data);
        }
    }
}
