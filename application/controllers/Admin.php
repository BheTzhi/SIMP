<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pasar_model', 'pasar');
    }

    public function index()
    {
        redirect('admin/gabung');
    }

    public function gabung()
    {
        $data['title'] = 'Gabung';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['blok'] = $this->pasar->getBlok();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getnomorbyblok($blok, $string)
    {

        $option = '';

        if ($string == 1) :
            $string = $this->db->where('a.link = a.id');
        elseif ($string == 0) :
            $string = '';
        endif;

        $string;
        $abc = $this->pasar->getKiosByBlok($blok);
        if ($abc) {
            $option .= '<option value="">- Nomor -</option>';
            foreach ($abc as $key) :
                $option .= '<option value="' . $key['id'] . '">' . $key['nomor'] . '</option>';
            endforeach;
        } else {
            $option .= '<option value="">- Kosong -</option>';
        }
        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function add($val)
    {
        if ($val == 'gabung') :

            $this->db->set('link', $this->input->post('nomor'));
            $this->db->where('id', $this->input->post('nomor2'));
            $update = $this->db->update('kios');

            if ($update) :

                $this->db->set('link', $this->input->post('nomor'));
                $this->db->where('id', $this->input->post('nomor'));

                $this->db->update('kios');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil gabung kios!</div>');

                redirect('admin/gabung');

            endif;

        elseif ($val == 'pisah') :

            $this->db->set('link', $this->input->post('pnomor2'));
            $this->db->where('id', $this->input->post('pnomor2'));

            $this->db->update('kios');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil sekat kios!</div>');

            redirect('admin/gabung');
        endif;
    }

    public function getgabungbyblok()
    {
        $option = '';

        $blok = $this->input->post('blok');
        $kode = $this->input->post('kode');

        $this->db->where('blok_id', $blok);
        if ($kode == 1) :
            $this->db->where('link = id');
        else :
            $this->db->where('link != id');
        endif;

        $data = $this->db->get('kios');

        if ($data->num_rows() < 1) :
        else :
            $option .= '<option value="">- Nomor -</option>';
            foreach ($data->result() as $key) :
                $option .= '<option value="' . $key->id . '">' . $key->nomor . '</option>';
            endforeach;
        endif;

        echo json_encode(['status' => 200, 'html' => $option]);
    }

    // public function asd()
    // {
    //     $option = '';

    //     $this->db->select('bulantahun as id');
    //     $this->db->where('kios_id', $_POST['id']);
    //     $this->db->where('RIGHT(bulantahun, 4) = ', $_POST['tahun']);
    //     $abc = $this->db->get('kwhbulan')->result_array();
    //     if ($abc) {
    //         foreach ($abc as $a) :
    //             $datas[] = substr($a['id'], 0, -4);
    //         endforeach;

    //         $this->db->where_not_in('id', $datas);
    //         $data = $this->db->get('bulan')->result_array();

    //         if ($data) {
    //             $option .= '<option value="">- Pilih -</option>';
    //             foreach ($data as $key) {
    //                 $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
    //             }
    //         } else {
    //             $option .= '<option>Kosong</option>';
    //         }
    //     } else {
    //         $bulan = $this->db->get('bulan')->result_array();
    //         $option .= '<option value="">- Pilih -</option>';
    //         foreach ($bulan as $key) {
    //             $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
    //         }
    //     }

    //     echo json_encode(['status' => 'ok', 'html' => $option]);
    // }
}
