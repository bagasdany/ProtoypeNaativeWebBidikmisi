<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->helper('captcha');
        $this->load->model('M_pengguna');

        $this->data     = array();
        $this->templates= 'contents/authentication/';
    }

    function index()
    {
        if($this->session->userdata('logged_in')){
            redirect('dashboard');
        } else {
            $this->do_login();
        }
    }

    function do_login(){

        if($this->input->post('param1')){
            $this->form_validation->set_rules('param1', 'Username or Email', 'trim|required|callback__check_login');
        } else {
            $this->form_validation->set_rules('param1', 'Username or Email', 'trim|required');
        }        

        $this->form_validation->set_rules('param3', 'Kode Captcha', 'trim|required');
        $this->form_validation->set_rules('param2', 'Password', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi!');

        if($this->form_validation->run() == FALSE){

            // UNSET SESSION CAPTCHA LAMA
            $captcha_code_file = $this->session->userdata('captcha_code_file');
            if(file_exists("./assets/captcha/" . $captcha_code_file)){
                @unlink("./assets/captcha/" . $captcha_code_file);
            }
            $this->session->unset_userdata('captcha_code_word');
            $this->session->unset_userdata('captcha_code_file');

            // GENERATE CAPTCHA BARU
            $config = array(
                'img_url'       => base_url('assets/captcha'),
                'img_path'      => './assets/captcha/',
                'font_path'     => FCPATH . 'assets/captcha/fonts/Narin-Bold.otf',
                //'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                'pool'          => '0123456789',
                'img_height'    => 45,
                'word_length'   => 3,
                'img_width'     => '150',
                'font_size'     => 50,
                'colors'        => array(
                    'background'    => array(255, 255, 255),
                    'border'         => array(255, 255, 255),
                    'text'           => array(0, 31, 63,  1),
                    'grid'           => array(0, 31, 63)
                )
            );

            $captcha = create_captcha($config);

            // SET SESSION CAPTCHA BARU
            $this->session->set_userdata('captcha_code_word', $captcha['word']);
            $this->session->set_userdata('captcha_code_file', $captcha['time'] . '.jpg');

            $this->data['captcha_image']    = $captcha['image'];

            $this->load->view($this->templates . 'v_index', $this->data);
        } else {

            // UNSET SESSION CAPTCHA LAMA
            $captcha_code_file = $this->session->userdata('captcha_code_file');
            if(file_exists("./assets/captcha/" . $captcha_code_file)){
                @unlink("./assets/captcha/" . $captcha_code_file);
            }
            $this->session->unset_userdata('captcha_code_word');
            $this->session->unset_userdata('captcha_code_file');

            redirect('dashboard', 'location');
        }
    }

    function _check_login(){
        $param1 = $this->input->post('param1');
        $param2 = $this->input->post('param2');
        $param3 = $this->input->post('param3');

        // PROTECT SQL INJECTION
        $param1 = $this->security->xss_clean($param1);
        $param2 = $this->security->xss_clean($param2);

        $param2 = sha1($param2);
        $captcha_code_word = $this->session->userdata('captcha_code_word');

        if($param3 === $captcha_code_word){

            // AMBIL DATA LOGIN
            $data   = $this->M_pengguna->get_login($param1, $param2);
            
            if($data){
                $data['logged_in'] = TRUE;
                
                $this->session->set_userdata($data);

                return TRUE;
            } else {
                $this->form_validation->set_message('_check_login', 'Periksa kembali akun anda!');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('_check_login', 'Kode captcha salah!');
            return FALSE;
        }
    }

    function ajax_captcha_refresh(){
        (!$this->input->is_ajax_request() ? show_404() : '');

        // UNSET SESSION CAPTCHA LAMA
        $captcha_code_file = $this->session->userdata('captcha_code_file');
        if(file_exists("./assets/captcha/" . $captcha_code_file)){
            @unlink("./assets/captcha/" . $captcha_code_file);
        }
        $this->session->unset_userdata('captcha_code_word');
        $this->session->unset_userdata('captcha_code_file');

        // GENERATE CAPTCHA BARU
        $config = array(
            'img_url'       => base_url('assets/captcha'),
            'img_path'      => './assets/captcha/',
            'font_path'     => FCPATH . 'assets/captcha/fonts/Narin-Bold.otf',
            //'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'pool'          => '0123456789',
            'img_height'    => 45,
            'word_length'   => 3,
            'img_width'     => '150',
            'font_size'     => 50,
            'expiration'    => 7200,
            'colors'        => array(
                'background'    => array(255, 255, 255),
                'border'         => array(255, 255, 255),
                'text'           => array(0, 31, 63,  1),
                'grid'           => array(0, 31, 63)
            )
        );

        $captcha = create_captcha($config);

        // SET SESSION CAPTCHA BARU
        $this->session->set_userdata('captcha_code_word', $captcha['word']);
        $this->session->set_userdata('captcha_code_file', $captcha['time'] . '.jpg');

        echo $captcha['image'];
    }

    function do_logout(){
        $this->session->unset_userdata('id_pengguna');
        $this->session->unset_userdata('id_instansi');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('nm_lengkap');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('created_at');
        $this->session->unset_userdata('created_by');
        $this->session->unset_userdata('updated_at');
        $this->session->unset_userdata('updated_by');
        $this->session->sess_destroy();

        redirect('authentication');
    }

    function error_404(){
        $this->load->view('errors/html/error_404');
    }
}
