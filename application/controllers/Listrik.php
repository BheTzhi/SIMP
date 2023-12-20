<?php

class Listrik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Listrik_model', 'listrik');
        $this->load->model('Pasar_model', 'pasar');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Daya';
        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['listrik'] = $this->listrik->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('listrik/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $this->listrik->add();
    }

    public function edit($id)
    {
        $id = decrypt_url($id);
        $this->listrik->edit($id);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->listrik->delete($id);
    }

    public function meteran()
    {

        $data['title'] = 'Meteran Listrik';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->uri->segment(3) == false) :

            $data['blok'] = $this->pasar->getBlok();

        elseif ($this->uri->segment(4) == false) :

            $data['blok'] = $this->pasar->getBlokById(decrypt_url($this->uri->segment(3)));

            $data['listrik'] = $this->listrik->get();
            $data['kios'] = $this->pasar->getKiosByBlokGabung(decrypt_url($this->uri->segment(3)));

        elseif ($this->uri->segment(4) == true && $this->uri->segment(5) == false) :

            $data['blok'] = $this->pasar->getBlokById(decrypt_url($this->uri->segment(3)));

            $data['bulan'] = $this->db->get('bulan')->result_array();
            $data['kios'] = $this->pasar->getKios(decrypt_url($this->uri->segment(4)));

        elseif ($this->uri->segment(4) == true && $this->uri->segment(5) == 'edit') :

            $data['tahun'] = $this->edittahun(decrypt_url($this->uri->segment(4)));
            $data['blok'] = $this->pasar->getBlokById(decrypt_url($this->uri->segment(3)));

            $data['bulan'] = $this->db->get('bulan')->result_array();
            $data['kios'] = $this->pasar->getKios(decrypt_url($this->uri->segment(4)));

        endif;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('listrik/meteran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function ubahdaya()
    {
        $this->listrik->ubahDaya();
        // echo $this->input->post('id');
    }

    public function getblalu($id, $bulan)
    {
        echo json_encode($this->listrik->getJson($id, $bulan));
    }

    public function status($z, $id, $blok)
    {
        $id = decrypt_url($id);
        $z = decrypt_url($z);

        $this->listrik->status($id, $z, $blok);
    }

    public function addkwh($blok, $id)
    {
        $this->listrik->addKwh($blok, $id);
    }

    public function editkwh($blok, $id)
    {
        // echo json_encode([$_POST, $_FILES['foto']['name']]);
        $this->listrik->editKwh($blok, $id);
    }

    public function editbulan()
    {
        $option = '';

        $this->db->select('bulantahun as id');
        $this->db->where('kios_id', $_POST['id']);
        $this->db->where('RIGHT(bulantahun, 4) = ', $_POST['tahun']);
        $abc = $this->db->get('kwhbulan')->result_array();

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
            $option .= '<option>Kosong</option>';
        }

        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function addbulan()
    {
        $option = '';

        $this->db->select('bulantahun as id');
        $this->db->where('kios_id', $_POST['id']);
        $this->db->where('RIGHT(bulantahun, 4) = ', $_POST['tahun']);
        $abc = $this->db->get('kwhbulan')->result_array();
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
                $option .= '<option>Kosong</option>';
            }
        } else {
            $bulan = $this->db->get('bulan')->result_array();
            $option .= '<option value="">- Pilih -</option>';
            foreach ($bulan as $key) {
                $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
            }
        }

        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function edittahun($id)
    {
        $this->db->select('RIGHT(bulantahun, 4) as tahun');
        $this->db->group_by('RIGHT(bulantahun, 4)');
        $this->db->where('kios_id', $id);
        $a = $this->db->get('kwhbulan')->result_array();

        return $a;
    }

    public function coba()
    {
        // $option = '';

        // $this->db->select('bulantahun as id');
        // $this->db->where('kios_id', 7);
        // $this->db->where('RIGHT(bulantahun, 4) = ', 2023);
        // $abc = $this->db->get('kwhbulan')->result_array();
        // if ($abc) {
        //     foreach ($abc as $a) :
        //         $datas[] = substr($a['id'], 0, -4);
        //     endforeach;

        //     $this->db->where_not_in('id', $datas);
        //     $data = $this->db->get('bulan')->result_array();

        //     if ($data) {
        //         foreach ($data as $key) {
        //             $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
        //         }
        //     } else {
        //         $option .= '<option>Kosong</option>';
        //     }
        // } else {
        //     $bulan = $this->db->get('bulan')->result_array();
        //     foreach ($bulan as $key) {
        //         $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
        //     }
        // }
        // echo json_encode(['status' => 'ok', 'html' => $option]);
    }
    
}
