<?php


class Kontrak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Kontrak_model', 'kontrak');
        $this->load->model('Pasar_model', 'pasar');
        $this->load->model('Pedagang_model', 'pedagang');
    }

    public function index()
    {
        $data['title'] = 'Kontrak';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        // get all data
        $data['kontrak'] = $this->kontrak->get();
        $this->db->where('id != 0');
        $this->db->order_by('nama', 'asc');
        $data['pedagang'] = $this->pedagang->get();
        $this->db->where('blok != "Utility"');
        $data['blok'] = $this->pasar->getBlok();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontrak/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getKios()
    {
        $option = '';

        $blok = $this->input->post('blok');

        $this->db->where('status != 1');
        $data = $this->pasar->getKiosByBlok($blok);

        if ($data) {
            foreach ($data as $key) {
                $option .= '<option value="' . $key['id'] . '">' . $key['nomor'] . '</option>';
            }
        } else {
            $option .= '<option>Kosong</option>';
        }

        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function add()
    {
        $this->kontrak->add();
    }

    public function detail($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Kontrak';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        // get all data
        $data['kontrak'] = $this->kontrak->getById($id);
        $data['detail'] = $this->kontrak->getDetail($id);

        $data['total'] = $this->kontrak->getTotal($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontrak/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function bayar($id)
    {
        $id = decrypt_url($id);

        $this->kontrak->bayar($id);
    }

    public function getnomkwt()
    {
        echo json_encode($this->kontrak->getNomKwt());
    }

    public function delete($id)
    {
        $id = decrypt_url($id);

        $this->kontrak->delete($id);
    }

    public function delkon($id, $link)
    {
        $id = decrypt_url($id);
        $this->kontrak->delKon($id, $link);
    }
}
