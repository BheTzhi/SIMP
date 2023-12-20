<?php

class Menu_model extends CI_Model
{

    public function get()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function add()
    {
        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

        redirect('menu');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            'menu' => $this->input->post('umenu'),
        ];

        $this->db->replace('user_menu', $data);

        redirect('menu');
    }

    public function delet($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);

        redirect('menu');
    }
}
