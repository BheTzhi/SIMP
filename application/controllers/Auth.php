<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // blok_login();
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Absensi_model', 'absensi');
        $this->load->model('Retribusi_model', 'retribusi');
        $this->load->model('Pasar_model', 'pasar');
    }

    public function index()
    {

        if ($this->session->userdata('username')) {
            $this->absensi->absenBulanan();
            redirect('dashboard');
        } else {
            $this->login();
        }
    }

    public function login()
    {
        if ($this->retribusi->getToDay()->num_rows() < 1) :
            $this->retribusi->cetakTagihanOtomatis();
        endif;

        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function proseslogin()
    {
        $this->auth->prosesLogin();
    }

    public function proseslogout()
    {
        $this->auth->logout();
    }

    public function blok()
    {
        $this->load->view('auth/blok');
    }

    public function absen()
    {
        $this->absensi->bulanan();
    }
}
