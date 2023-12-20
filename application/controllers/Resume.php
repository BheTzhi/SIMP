<?php

class Resume extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Resume_model', 'resume');
        $this->load->model('Resume_model', 'resume');
    }

    public function index()
    {
        $data['title'] = 'Resume';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('resume/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getdata()
    {
        $data['title'] = 'Resume';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $jenis = $this->input->get('jenis');
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        if ($jenis == 'air') :
            $data['kios'] = $this->resume->getAllKiosByBulan($bulan . $tahun, $jenis);
            if ($bulan == 12) :
                $bulan = 1;
                $data['tahun'] = date('Y') + 1;
            else : $bulan = $bulan + 1;
                $data['tahun'] = date('Y');
            endif;
            $data['bulan'] = $this->db->get_where('bulan', ['id' => $bulan])->row_array();

            $this->load->view('resume/air', $data);

        elseif ($jenis == 'listrik') :
            $data['kios'] = $this->resume->getAllKiosByBulan($bulan . $tahun, $jenis);

            if ($bulan == 12) :
                $bulan = 1;
                $data['tahun'] = date('Y') + 1;
            else :
                $bulan = $bulan + 1;
                $data['tahun'] = date('Y');
            endif;
            $data['bulan'] = $this->db->get_where('bulan', ['id' => $bulan])->row_array();

            $this->load->view('resume/listrik', $data);
        endif;

        $this->load->view('templates/footer', $data);
    }

    public function gettahun($jenis)
    {
        if ($jenis == 'air') {
            echo $this->resume->getTahunAir();
        } elseif ($jenis == 'listrik') {
            echo $this->resume->getTahunListrik();
        }
    }

    public function getbulan($jenis, $tahun)
    {
        if ($jenis == 'air') {
            echo $this->resume->getBulanAir($tahun);
            // echo json_encode('air');
        } elseif ($jenis == 'listrik') {
            echo $this->resume->getBulanListrik($tahun);
            // echo json_encode('listrik');
        }
    }
}
