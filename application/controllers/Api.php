<?php

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pasar_model', 'pasar');
        $this->load->model('Retribusi_model', 'retribusi');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Inventaris_model', 'inventaris');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query = $this->db->get_where('pegawai', ['username' => $username]);

        if ($query->num_rows() < 1) :
            	http_response_code(404); // Not Found
        	echo json_encode(['status' => 404, 'results' => 'Username tidak terdaftar']);
        else :
            // if (password_verify($pass, $users['password'])) :
            if (md5($password) == $query->row()->password) :
                echo json_encode(['status' => 200, 'results' => $query->row()]);
            else :
                http_response_code(401); // Unauthorized
            	echo json_encode(['status' => 401, 'results' => 'Password salah']);
            	endif;
        endif;
    }

    public function inventaris()
    {
        echo json_encode(['status' => 200, 'results' => $this->inventaris->get()]);
    }

    public function kios()
    {
        $this->db->order_by('blok_id', 'ASC');
        $this->db->order_by('nomor', 'ASC');
        echo json_encode(['status' => 1, 'results' => $this->pasar->getKiosAll()]);
    }

    public function mydailybill()
    {
    }
}
