<?php

class Air extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Pasar_model', 'pasar');
        $this->load->model('Air_model', 'air');
    }

    public function index()
    {
        redirect('air/meteran');
    }

    public function meteran()
    {
        $data['title'] = 'Meteran Air';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->uri->segment('4') == true) :
            $data['tahun'] = $this->edittahun(decrypt_url($this->uri->segment('4')));
            $data['blok'] = $this->pasar->getBlokById(decrypt_url($this->uri->segment(3)));
            $data['kios'] = $this->pasar->getkios(decrypt_url($this->uri->segment('4')));
        elseif ($this->uri->segment('3') == true) :
            $data['blok'] = $this->pasar->getBlokById(decrypt_url($this->uri->segment(3)));

            $this->db->order_by('a_status', 'desc');
            $data['kios'] = $this->pasar->getKiosByBlokGabung($data['blok']['id']);
        else :
            $data['blok'] = $this->pasar->getBlok();
        endif;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('air/meteran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function status($z, $id, $blok)
    {
        $id = decrypt_url($id);
        $z = decrypt_url($z);

        $this->air->status($id, $z, $blok);
    }

    public function getblalu($id, $bulan)
    {
        echo json_encode($this->air->getJson($id, $bulan));
    }

    public function edittahun($id)
    {
        $this->db->select('RIGHT(bulantahun, 4) as tahun');
        $this->db->group_by('RIGHT(bulantahun, 4)');
        $this->db->where('kios_id', $id);

        return $this->db->get('wmeter')->result_array();
    }

    public function editbulan()
    {
        $option = '';

        $this->db->select('bulantahun as id');
        $this->db->where('kios_id', $_POST['id']);
        $this->db->where('RIGHT(bulantahun, 4) = ', $_POST['tahun']);
        $abc = $this->db->get('wmeter')->result_array();

        foreach ($abc as $a) :
            $datas[] = substr($a['id'], 0, -4);
        endforeach;

        $this->db->where_in('id', $datas);
        $data = $this->db->get('bulan')->result_array();

        if ($data) {
            $option .= '<option value="">- Pilih -</option>';
            foreach ($data as $key) {
                $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
            }
        } else {
            $option .= '<option value="">Kosong</option>';
        }

        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function addbulan()
    {
        $option = '';

        $this->db->select('bulantahun as id');
        $this->db->where('kios_id', $_POST['id']);
        $this->db->where('RIGHT(bulantahun, 4) = ', $_POST['tahun']);
        $abc = $this->db->get('wmeter')->result_array();
        if ($abc) {
            foreach ($abc as $a) :
                $datas[] = substr($a['id'], 0, -4);
            endforeach;

            $this->db->where_not_in('id', $datas);
            $data = $this->db->get('bulan')->result_array();

            if ($data) {
                $option .= '<option value="">- Pilih -</option>';
                foreach ($data as $key) {
                    $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
                }
            } else {
                $option .= '<option value="">Kosong</option>';
            }
        } else {
            $bulan = $this->db->get('bulan')->result_array();
            foreach ($bulan as $key) {
                $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
            }
        }

        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function add($blok, $id)
    {
        $this->air->add($blok, $id);
    }

    public function edit($blok, $id)
    {
        // echo json_encode([$_POST, $_FILES['foto']['name']]);
        $this->air->edit($blok, $id);
    }
}
