<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        (!$this->session->userdata('logged_in') ? redirect('authentication') : '');

        $this->load->model('M_instansi');
        $this->load->model('M_pendidikan');
        $this->load->model('M_bank');
        $this->load->model('M_status_jabatan');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_organisasi');
        $this->load->model('M_prestasi');

        $this->data     = array();
        $this->templates= 'contents/mahasiswa/proses/';
    }

    function index()
    {
        $this->tambah();
    }

    function tambah()
    {
        if($this->input->post()){

            if($_FILES && isset($_FILES['lampiran'])){
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'zip|rar';
                $config['overwrite']            = false;
                $config['encrypt_name']         = false;
                $config['remove_spaces']        = true;

                $this->load->library('upload', $config);
         
                if($this->upload->do_upload('lampiran')){
                    $uploads = $this->upload->data();    
                    $data['lampiran'] = $uploads['file_name']; 
                }                
            }

            $no_hp                  = $this->input->post('no_hp');
            $no_hp_orang_tua        = $this->input->post('no_hp_orang_tua');
            $penghasilan_orang_tua  = $this->input->post('penghasilan_orang_tua');
            $tanggal_lahir          = $this->input->post('tanggal_lahir');
            $tanggal_lahir          = str_replace('/', '-', $tanggal_lahir);

            $data['nim']                    = $this->input->post('nim');
            $data['nm_mahasiswa']           = $this->input->post('nm_mahasiswa');
            $data['tempat_lahir']           = $this->input->post('tempat_lahir');
            $data['tanggal_lahir']          = date('Y-m-d', strtotime($tanggal_lahir));
            $data['jenis_beasiswa']         = $this->input->post('jenis_beasiswa');
            $data['id_instansi']            = $this->input->post('id_instansi');
            $data['fakultas']               = $this->input->post('fakultas');
            $data['program_studi']          = $this->input->post('program_studi');
            $data['jenis_kelamin']          = $this->input->post('jenis_kelamin');
            $data['semester']               = $this->input->post('semester');
            $data['ipk']                    = $this->input->post('ipk');
            $data['no_hp']                  = str_replace('_', '', $no_hp);
            $data['alamat']                 = $this->input->post('alamat');
            $data['id_pendidikan']          = $this->input->post('id_pendidikan');
            $data['jumlah_prestasi']        = $this->input->post('jumlah_prestasi');
            $data['jumlah_organisasi']      = $this->input->post('jumlah_organisasi');
            $data['nama_orang_tua']         = $this->input->post('nama_orang_tua');
            $data['pekerjaan_orang_tua']    = $this->input->post('pekerjaan_orang_tua');
            $data['penghasilan_orang_tua']  = str_replace('_', '', $penghasilan_orang_tua);
            $data['jumlah_tanggungan']      = $this->input->post('jumlah_tanggungan');
            $data['no_hp_orang_tua']        = str_replace('_', '', $no_hp_orang_tua);
            $data['no_rekening_mahasiswa']  = $this->input->post('no_rekening_mahasiswa');
            $data['id_bank']                = $this->input->post('id_bank');
            $data['cabang_bank']            = $this->input->post('cabang_bank');
            $data['status']                 = ($this->input->post('ipk') >= 3 ? 1 : 0);
            $data['created_at']             = date('Y-m-d H:i:s');
            $data['created_by']             = $this->session->userdata('id_pengguna');

            $id_mahasiswa = $this->M_mahasiswa->tambah($data);

            // JIKA ADA PRESTASI
            $jumlah_prestasi    = 0;
            $prestasi           = $this->input->post('prestasi');

            if($prestasi){
                for($i = 0; $i < count($prestasi); $i++){
                    $j = $prestasi[$i];

                    if(trim($this->input->post('nama_prestasi_' . $j)) != ''){
                        $data2  = array();                       

                        $data2['bidang_prestasi']   = $this->input->post('bidang_prestasi_' . $j);
                        $data2['nama_prestasi']     = $this->input->post('nama_prestasi_' . $j);
                        $data2['tingkat_prestasi']  = $this->input->post('tingkat_prestasi_' . $j);
                        $data2['juara_ke']          = $this->input->post('juara_ke_' . $j);
                        $data2['id_mahasiswa']      = $id_mahasiswa;
                        $data2['created_at']        = date('Y-m-d H:i:s');
                        $data2['created_by']        = $this->session->userdata('id_pengguna');

                        $this->M_prestasi->tambah($data2);
                        $jumlah_prestasi++;
                    }
                }
            }

            // JIKA ADA PRESTASI
            $jumlah_organisasi  = 0;
            $organisasi    = $this->input->post('organisasi');

            if($organisasi){
                for($i = 0; $i < count($organisasi); $i++){
                    $j = $organisasi[$i];
                    if(trim($this->input->post('nama_organisasi_' . $j)) != ''){
                        $data3  = array();
                        

                        $data3['nama_organisasi']   = $this->input->post('nama_organisasi_' . $j);
                        $data3['id_status_jabatan'] = $this->input->post('id_status_jabatan_' . $j);
                        $data3['periode']           = $this->input->post('periode_' . $j);
                        $data3['id_mahasiswa']      = $id_mahasiswa;
                        $data3['created_at']        = date('Y-m-d H:i:s');
                        $data3['created_by']        = $this->session->userdata('id_pengguna');

                        $this->M_organisasi->tambah($data3);
                        $jumlah_organisasi++;
                    }
                }
            }

            // UPDATE JUMLAH ORGANISASI DAN PRESTASI
            $data = array();
            $data['jumlah_organisasi']  = $jumlah_organisasi;
            $data['jumlah_prestasi']    = $jumlah_prestasi;
            $data['updated_at']         = date('Y-m-d H:i:s');
            $data['updated_by']         = $this->session->userdata('id_pengguna');

            $this->M_mahasiswa->perbarui_mahasiswa_by_id($id_mahasiswa, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil disimpan');
            redirect('mahasiswa/data');

        } // END POST

        $this->data['instansi'] = $this->M_instansi->get_instansi_by_id($this->session->userdata('id_instansi'));
        $this->data['title']    = 'Tambah Data Mahasiswa';

        $this->load->view($this->templates . 'v_tambah', $this->data);
    }

    function ubah($id_mahasiswa)
    {
        if(!$id_mahasiswa){
            redirect('mahasiswa/data');
        }

        $ubah = $this->M_mahasiswa->get_mahasiswa_by_id($id_mahasiswa);

        if(!$ubah){
            redirect('mahasiswa/data');
        }

        if($this->input->post()){

            // JIKA ADA PRESTASI
            $jumlah_prestasi    = 0;
            $prestasi           = $this->input->post('prestasi');

            if($prestasi){
                for($i = 0; $i < count($prestasi); $i++){

                    $j           = $prestasi[$i];
                    $id_prestasi = $this->input->post('id_prestasi_' . $j);
                    $data2       = array();

                    $data2['bidang_prestasi']   = $this->input->post('bidang_prestasi_' . $j);
                    $data2['nama_prestasi']     = $this->input->post('nama_prestasi_' . $j);
                    $data2['tingkat_prestasi']  = $this->input->post('tingkat_prestasi_' . $j);
                    $data2['juara_ke']          = $this->input->post('juara_ke_' . $j);
                    $data2['id_mahasiswa']      = $id_mahasiswa;

                    if($id_prestasi){                        
                        $data2['updated_at']    = date('Y-m-d H:i:s');
                        $data2['updated_by']    = $this->session->userdata('id_pengguna');

                        $this->M_prestasi->perbarui_prestasi_by_id($id_prestasi, $data2);
                        
                    } else {
                        $data2['created_at']    = date('Y-m-d H:i:s');
                        $data2['created_by']    = $this->session->userdata('id_pengguna');

                        $this->M_prestasi->tambah($data2);
                    }

                    $jumlah_prestasi++;
                }
            }

            // JIKA ADA ORGANISASI
            $jumlah_organisasi  = 0;
            $organisasi    = $this->input->post('organisasi');

            if($organisasi){
                for($i = 0; $i < count($organisasi); $i++){

                    $j             = $organisasi[$i];
                    $id_organisasi = $this->input->post('id_organisasi_' . $j);
                    $data3         = array();

                    $data3['nama_organisasi']   = $this->input->post('nama_organisasi_' . $j);
                    $data3['id_status_jabatan'] = $this->input->post('id_status_jabatan_' . $j);
                    $data3['periode']           = $this->input->post('periode_' . $j);
                    $data3['id_mahasiswa']      = $id_mahasiswa;

                    if($id_organisasi){                        
                        $data3['updated_at']    = date('Y-m-d H:i:s');
                        $data3['updated_by']    = $this->session->userdata('id_pengguna');

                        $this->M_organisasi->perbarui_organisasi_by_id($id_organisasi, $data3);
                        
                    } else {
                        $data3['created_at']    = date('Y-m-d H:i:s');
                        $data3['created_by']    = $this->session->userdata('id_pengguna');

                        $this->M_organisasi->tambah($data3);
                    }

                    $jumlah_organisasi++;
                }
            }

            // HAPUS ORGANISASI
            $id_organisasi_hapus = $this->input->post('id_organisasi_hapus');
            if($id_organisasi_hapus){
                foreach($id_organisasi_hapus as $id_organisasi){
                    $this->M_organisasi->hapus_by_id($id_organisasi);
                }
            }

            // HAPUS PRESTASI
            $id_prestasi_hapus = $this->input->post('id_prestasi_hapus');
            if($id_prestasi_hapus){
                foreach($id_prestasi_hapus as $id_prestasi){
                    $this->M_prestasi->hapus_by_id($id_prestasi);
                }
            }

            // UPDATE DATA
            $data = array();
            if($_FILES && isset($_FILES['lampiran'])){
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'zip|rar';
                $config['overwrite']            = false;
                $config['encrypt_name']         = false;
                $config['remove_spaces']        = true;

                $this->load->library('upload', $config);
         
                if($this->upload->do_upload('lampiran')){
                    $uploads        = $this->upload->data();    
                    $lampiran_lama  = $this->input->post('lampiran_lama');
                    $path           = './uploads/';

                    if(file_exists($path . $lampiran_lama)){
                        @unlink($path . $lampiran_lama);
                    }

                    $data['lampiran'] = $uploads['file_name']; 
                }                
            } else {
                $data['lampiran'] = $this->input->post('lampiran_lama');
            }

            $no_hp                  = $this->input->post('no_hp');
            $no_hp_orang_tua        = $this->input->post('no_hp_orang_tua');
            $penghasilan_orang_tua  = $this->input->post('penghasilan_orang_tua');
            $tanggal_lahir          = $this->input->post('tanggal_lahir');
            $tanggal_lahir          = str_replace('/', '-', $tanggal_lahir);

            $data['nim']                    = $this->input->post('nim');
            $data['nm_mahasiswa']           = $this->input->post('nm_mahasiswa');
            $data['tempat_lahir']           = $this->input->post('tempat_lahir');
            $data['tanggal_lahir']          = date('Y-m-d', strtotime($tanggal_lahir));
            $data['jenis_beasiswa']         = $this->input->post('jenis_beasiswa');
            $data['id_instansi']            = $this->input->post('id_instansi');
            $data['fakultas']               = $this->input->post('fakultas');
            $data['program_studi']          = $this->input->post('program_studi');
            $data['jenis_kelamin']          = $this->input->post('jenis_kelamin');
            $data['semester']               = $this->input->post('semester');
            $data['ipk']                    = $this->input->post('ipk');
            $data['no_hp']                  = str_replace('_', '', $no_hp);
            $data['alamat']                 = $this->input->post('alamat');
            $data['id_pendidikan']          = $this->input->post('id_pendidikan');
            $data['nama_orang_tua']         = $this->input->post('nama_orang_tua');
            $data['pekerjaan_orang_tua']    = $this->input->post('pekerjaan_orang_tua');
            $data['penghasilan_orang_tua']  = str_replace('_', '', $penghasilan_orang_tua);
            $data['jumlah_tanggungan']      = $this->input->post('jumlah_tanggungan');
            $data['no_hp_orang_tua']        = str_replace('_', '', $no_hp_orang_tua);
            $data['no_rekening_mahasiswa']  = $this->input->post('no_rekening_mahasiswa');
            $data['id_bank']                = $this->input->post('id_bank');
            $data['cabang_bank']            = $this->input->post('cabang_bank');
            $data['status']                 = ($this->input->post('ipk') >= 3 ? 1 : 0);
            $data['aktif']                  = $this->input->post('aktif');
            $data['jumlah_organisasi']      = $jumlah_organisasi;
            $data['jumlah_prestasi']        = $jumlah_prestasi;
            $data['updated_at']             = date('Y-m-d H:i:s');
            $data['updated_by']             = $this->session->userdata('id_pengguna');

            $this->M_mahasiswa->perbarui_mahasiswa_by_id($id_mahasiswa, $data);

            $this->session->set_flashdata('informasi', 'Data berhasil diperbarui');
            redirect('mahasiswa/data');

        } // END POST

        $this->data['ubah']         = $ubah;
        $this->data['prestasi']     = $this->M_prestasi->get_prestasi_by_id_mahasiswa($id_mahasiswa);
        $this->data['organisasi']   = $this->M_organisasi->get_organisasi_by_id_mahasiswa($id_mahasiswa);
        $this->data['title']        = 'Ubah Data Mahasiswa';

        $this->load->view($this->templates . 'v_ubah', $this->data);
    }

    function hapus($id_mahasiswa){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $mahasiswa  = $this->M_mahasiswa->get_mahasiswa_by_id($id_mahasiswa);
        $path       = './uploads/';

        if(file_exists($path . $mahasiswa['lampiran'])){
            @unlink($path . $mahasiswa['lampiran']);
        }

        $this->M_mahasiswa->hapus_by_id($id_mahasiswa);
        $this->M_organisasi->hapus_by_id_mahasiswa($id_mahasiswa);
        $this->M_prestasi->hapus_by_id_mahasiswa($id_mahasiswa);

        echo json_encode(array('status' => TRUE));
    }

    function ajax_cek_nim()
    {
        (!$this->input->is_ajax_request() ? show_404() : '');
        
        $data['id_instansi']    = $this->input->get('id_instansi');
        $data['nim']            = $this->input->get('nim');

        $cek = $this->M_mahasiswa->cek($data);

        echo $cek->num_rows();        
    }

    function ajax_autocomplete_pendidikan(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $pendidikan = $this->M_pendidikan->get_all_autocomplete($cari);

        echo json_encode($pendidikan);
    }

    function ajax_autocomplete_bank(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $bank = $this->M_bank->get_all_autocomplete($cari);

        echo json_encode($bank);
    }

    function ajax_autocomplete_status_jabatan(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $status_jabatan = $this->M_status_jabatan->get_all_autocomplete($cari);

        echo json_encode($status_jabatan);
    }

    function ajax_autocomplete_instansi(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        $cari = $this->input->get('q');

        $instansi = $this->M_instansi->get_all_autocomplete($cari);

        echo json_encode($instansi);
    }
}
