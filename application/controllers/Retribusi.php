<?php

class Retribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pasar_model', 'pasar');
        $this->load->model('Retribusi_model', 'retribusi');
    }

    public function index()
    {
        $data['title'] = 'Retribusi';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->retribusi->getToDay()->num_rows() < 1) :
            $data['retribusi'] = '';
        else :
            if ($this->input->post('tanggal')) :
                $data['retribusi'] = $this->retribusi->getByDate($this->input->post('tanggal'))->result_array();
            else :
                $data['retribusi'] = $this->retribusi->getToDay()->result_array();
            endif;
        endif;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('retribusi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function cetaktagihan()
    {
        $this->retribusi->cetakTagihan();
    }

    public function bayar($id)
    {
        $id = decrypt_url($id);

        $this->retribusi->bayar($id);
    }

    public function coba2()
    {
        echo json_encode($this->retribusi->getPengelompokanRetribusi('2023-11-28'));
    }

    public function coba()
    {
        $this->db->order_by('id', 'ASC');
        $kios = $this->pasar->getKiosAll();

        foreach ($kios as $k) {
            $kios_id = $k['id'];
            $tagihan = 10000; // 10.000 dalam rupiah
            $tglblnthn = strtotime(date('Y-m-d')); // Mengambil tanggal hari ini
            $input_kios = $k['blok'] . $k['nomor'];

            $data_to_insert[] = [
                'kios_id' => $kios_id,
                'tagihan' => $tagihan,
                'tglblnthn' => $tglblnthn,
                'input_kios' => $input_kios
            ];
        }

        echo json_encode($data_to_insert);
    }
}
