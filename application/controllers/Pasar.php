<?php

class Pasar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pasar_model', 'pasar');
        $this->load->model('Listrik_model', 'listrik');
        $this->load->model('Pedagang_model', 'pedagang');
        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Pasar Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['blok'] = $this->pasar->getBlok();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasar/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addBlok()
    {
        $this->pasar->addBlok();
    }

    public function kios($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Kios Manajemen';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['blok'] = $this->pasar->getBlokById($id);

        $this->db->order_by('nomor', 'asc');
        $data['kios'] = $this->pasar->getKiosByBlok($id);
        $data['min'] = $this->pasar->getAwal($id);
        $data['terakhir'] = $this->pasar->getTerakhir($id);

        $data['listrik'] = $this->listrik->get();

        // pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('pasar/kios/' . encrypt_url($id) . '/');
        $config['total_rows'] = count($data['kios']);
        $config['per_page'] = 15;
        $from = $this->uri->segment(4);

        // style
        $config['first_link']       = '<<';
        $config['last_link']        = '>>';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $this->db->order_by('nomor', 'asc');
        $data['sort'] = $this->pasar->pagination($config['per_page'], $from, $id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasar/kios', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addkios($id)
    {
        $id = decrypt_url($id);
        $this->pasar->addKios($id);
    }

    public function editkios($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);
        $this->pasar->editKios($id, $blok);
    }

    public function deletekios($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);

        $this->pasar->deletKios($id, $blok);
    }

    public function detailkios($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);

        $data['title'] = 'Detail Kios';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['kios'] = $this->pasar->getKios($id);
        $data['terakhir'] = $this->pasar->getTerakhir($blok);

        $this->db->where('id != 0');
        $this->db->order_by('nama', 'asc');
        $data['pedagang'] = $this->pedagang->get();
        $data['pembayaran'] = $this->pembayaran->get();

        $data['empatpuluh'] = $data['kios']['harga'] * (40 / 100);
        $string = $data['kios']['nomor'];
        $a = preg_replace("/[^0-9]/", "", $string);
        $data['prev'] = $this->pasar->prev($blok, $a);
        $data['next'] = $this->pasar->next($blok, $a);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasar/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function jual($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);
        $this->pasar->jual($id, $blok);
    }

    public function bayar($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);

        $this->pasar->bayarKios($id, $blok);
    }

    public function pelunasan($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);

        $this->pasar->pelunasanKios($id, $blok);
    }

    public function diskonkios($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);

        $this->pasar->diskonKios($id, $blok);
    }

    public function batalbeli($id, $blok)
    {
        $id = decrypt_url($id);
        $blok = decrypt_url($blok);

        $this->pasar->batalBeli($id, $blok);
    }
}
