<?php

class Pengelola extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pengelola_model', 'pengelola');
        $this->load->model('Listrik_model', 'listrik');
        $this->load->model('Pasar_model', 'pasar');
    }

    public function index()
    {
        redirect('pengelola/listrik');
    }

    public function listrik()
    {
        $data['title'] = 'Listrik';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->uri->segment(4) == true) :
        elseif ($this->uri->segment(3) == true) :
            $data['blok'] = $this->pasar->getBlokById(decrypt_url($this->uri->segment(3)));
            $data['bulans'] = $this->db->get('bulan')->result_array();
            $data['tahuns'] = $this->gettahun(decrypt_url($this->uri->segment(3)));

            if ($this->input->get('bulan') == 'null' && $this->input->get('tahun') == 'null') :
                $data['kios'] = $this->pengelola->getAll($data['blok']['id']);
            elseif ($this->input->get('bulan') == true && $this->input->get('tahun') == true) :
                $bulan = $this->input->get('bulan');
                if ($bulan == 12) :
                    $bulan = 1;
                    $data['tahun'] = date('Y') + 1;
                else :
                    $bulan = $bulan + 1;
                    $data['tahun'] = date('Y');
                endif;
                $data['bulan'] = $this->db->get_where('bulan', ['id' => $bulan])->row_array();

                $data['kios'] = $this->pengelola->getBbab($data['blok']['id'], $this->input->get('bulan') . $this->input->get('tahun'));
            endif;

        else :
            $data['blok'] = $this->pasar->getBlok();
        endif;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengelola/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function air()
    {
        $data['title'] = 'Air';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->uri->segment(4) == true) :
        elseif ($this->uri->segment(3) == true) :
            $data['blok'] = $this->pasar->getBlokById(decrypt_url($this->uri->segment(3)));
            $data['bulans'] = $this->db->get('bulan')->result_array();
            $data['tahuns'] = $this->gettahun(decrypt_url($this->uri->segment(3)));

            // get all data
            if ($this->input->get('bulan') == 'null' && $this->input->get('tahun') == 'null') :
                $data['kios'] = $this->pengelola->getAllAir($data['blok']['id']);

            // get sort by month and years
            elseif ($this->input->get('bulan') == true && $this->input->get('tahun') == true) :
                $bulan = $this->input->get('bulan');
                if ($bulan == 12) :
                    $bulan = 1;
                    $data['tahun'] = date('Y') + 1;
                else :
                    $bulan = $bulan + 1;
                    $data['tahun'] = date('Y');
                endif;
                $data['bulan'] = $this->db->get_where('bulan', ['id' => $bulan])->row_array();

                $data['kios'] = $this->pengelola->getBbabAir($data['blok']['id'], $this->input->get('bulan') . $this->input->get('tahun'));
            endif;

        else :
            $data['blok'] = $this->pasar->getBlok();
        endif;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengelola/air', $data);
        $this->load->view('templates/footer', $data);
    }

    public function gettahun($id)
    {
        $this->db->select('RIGHT(a.bulantahun, 4) as tahun');
        $this->db->from('kwhbulan a');
        $this->db->join('kios b', 'b.id = a.kios_id');
        $this->db->join('blok c', 'c.id = b.blok_id');
        $this->db->group_by('RIGHT(a.bulantahun, 4)');
        $this->db->where('b.blok_id', $id);
        $a = $this->db->get()->result_array();

        return $a;
    }

    public function bayar($jenis, $id)
    {
        $id = decrypt_url($id);

        $this->pengelola->bayar($jenis, $id);
    }

    public function coba($data)
    {
        // function pembulatan($uang)
        // {
        //     $puluhan = substr($uang, -2);

        //     if ($puluhan < 01)
        //         $akhir = $uang - $puluhan;
        //     else
        //         $akhir = $uang + (100 - $puluhan);
        //     echo number_format($akhir);;
        // }
        // $uang = 893528;
        // pembulatan($uang); // hasilnya adalah 134.000,00

        echo substr($data, 0, -4);
        echo '<br>';
        echo substr($data, 1, 4);
    }
}
