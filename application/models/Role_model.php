<?php

class Role_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function add()
    {
        $data = [
            'role' => $this->input->post('role'),
            'pokok' => 0,
            'tunjangan' => 0,
        ];

        $this->db->insert('user_role', $data);

        redirect('role');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            'role' => $this->input->post('urole'),
        ];

        $this->db->replace('user_role', $data);

        redirect('role');
    }

    public function delet($id)
    {

        $this->db->delete('user_role', ['id' => $id]);

        redirect('role');
    }

    public function changeAkses()
    {
        $roleId = $this->input->post('roleId');
        $menuId = $this->input->post('menuId');

        $data = ['role_id' => $roleId, 'menu_id' => $menuId];

        $result = $this->db->get_where('user_access', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access', $data);
        } else {
            $this->db->delete('user_access', $data);
        }

        $this->session->set_flashdata('pakses', '<div class="alert alert-success" role="alert">Akses Diubah!</div>');
    }
}
