<?php

class Manajemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Etc_model', 'etc');
        $this->load->model('Inventaris_model', 'inventaris');
    }

    public function index()
    {
        $data['title'] = 'Manajemen';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kondisi()
    {
        $data['title'] = 'Manajemen';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['kondisi'] = $this->etc->getKondisi();

        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/kondisi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            if ($this->input->post('edit') == true) :
                $this->etc->editKondisi();
            else :
                $this->etc->addKondisi();
            endif;
        }
    }

    public function deletekondisi($id)
    {
        $id = decrypt_url($id);

        $this->etc->deleteKondisi($id);
    }


    public function jenis()
    {
        $data['title'] = 'Manajemen';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['jenis'] = $this->etc->getJenis();

        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/jenis', $data);
            $this->load->view('templates/footer', $data);
        } else {
            if ($this->input->post('edit') == true) :
                $this->etc->editJenis();
            else :
                $this->etc->addJenis();
            endif;
        }
    }

    public function getkj()
    {
        echo $this->etc->getKJ();
    }

    public function deletejenis($id)
    {
        $id = decrypt_url($id);
        $this->etc->deleteJenis($id);
    }

    public function ruang()
    {
        $data['title'] = 'Manajemen';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $data['ruang'] = $this->etc->getRuang();

        $this->form_validation->set_rules('ruang', 'Ruang', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/ruang', $data);
            $this->load->view('templates/footer', $data);
        } else {
            if ($this->input->post('edit') == true) :
                $this->etc->editRuang();
            else :
                $this->etc->addRuang();
            endif;
        }
    }

    public function getkr()
    {
        echo $this->etc->getKR();
    }

    public function deleteruang($id)
    {
        $id = decrypt_url($id);
        $this->etc->deleteRuang($id);
    }

    public function inventaris()
    {
        $data['title'] = 'Manajemen';

        $data['role'] = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->order_by('idr', 'asc');
        $data['inventaris'] = $this->inventaris->get();

        $data['kondisi'] = $this->etc->getKondisi();
        $data['jenis'] = $this->etc->getJenis();
        $data['ruang'] = $this->etc->getRuang();

        $this->form_validation->set_rules('nama', 'Nama Barang', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/inventaris', $data);
            $this->load->view('templates/footer', $data);
        } else {
            if ($this->input->post('edit') == true) :
                $this->inventaris->edit();
                // var_dump($_POST);
                die;
            else :
                $this->inventaris->add();
            endif;
        }
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->inventaris->delete(($id));
    }

    public function save_qr()
    {
        echo $this->inventaris->save_qr();
    }

    public function getdata()
    {
        echo $this->inventaris->getData();
    }

    public function geturut()
    {
        echo $this->inventaris->getUrut();
    }

    public function getk()
    {
        echo $this->inventaris->getK();
    }
}
