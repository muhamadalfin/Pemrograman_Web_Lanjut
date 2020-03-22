<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('mahasiswa_model');

        if($this->session->userdata('level')!="user"){
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $data=array(
            'title'=>'Data Mahasiswa',
            'mahasiswa'=>$this->mahasiswa_model->datatabels()
        );
        $this->load->view('template/header_datatabels_user',$data);
        $this->load->view('mahasiswa/user',$data);
        $this->load->view('template/footer_datatables_user');

    }

   
}


?>