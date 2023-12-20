<?php

class SubMenu_model extends CI_Model
{

    public function get()
    {
        $this->db->select('b.menu, a.title, a.url, a.icon, a.id, a.menu_id');
        $this->db->from('user_sub_menu a');
        $this->db->join('user_menu b', 'b.id = a.menu_id');

        return $this->db->get()->result_array();
    }

    public function add()
    {
        $data = [
            'menu_id' => $this->input->post('menu'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
        ];

        $this->db->insert('user_sub_menu', $data);

        redirect('submenu');
    }


    public function edit($id)
    {
        $data = [
            'id' => $id,
            'menu_id' => $this->input->post('umenu'),
            'title' => $this->input->post('utitle'),
            'url' => $this->input->post('uurl'),
            'icon' => $this->input->post('uicon'),
        ];

        $this->db->replace('user_sub_menu', $data);

        redirect('submenu');
    }

    public function delet($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);

        redirect('submenu');
    }
}
