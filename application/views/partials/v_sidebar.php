<?php

$ses_id_role = $this->session->userdata('id_role');

// SUPER ADMINISTRATOR
if($ses_id_role == 1){

    $this->load->view('partials/v_sidebar_administrator');

} 

// ADMIN UNIT
else if($ses_id_role == 2){

    $this->load->view('partials/v_sidebar_admin_instansi');

}
?>