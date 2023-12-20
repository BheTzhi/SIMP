<?php

class Pegawai_model extends CI_Model
{

    public function get()
    {
        $this->db->select('a.id, a.nama, a.nip, a.npwp, a.foto, a.username, b.role, b.pokok, b.tunjangan');
        $this->db->join('user_role b', 'b.id = a.role_id');
        return $this->db->get('pegawai a')->result_array();
    }

    public function getByNip($nip)
    {
        $this->db->select('a.id, a.nama, a.nip, a.npwp, a.foto, a.username, b.role');
        $this->db->join('user_role b', 'b.id = a.role_id');
        $this->db->where('a.nip', $nip);
        return $this->db->get('pegawai a')->row_array();
    }

    public function add()
    {
        if ($this->foto() == null) {
            $foto = $this->input->post('foto');
        } else {
            $foto = $this->foto();
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'npwp' => $this->input->post('npwp'),
            'foto' => $foto,
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role_id' => $this->input->post('role'),
        ];

        $this->db->insert('pegawai', $data);

        redirect('pegawai');
    }

    private function foto()
    {

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/img/';
            $config['file_name'] = 'foto' . $this->input->post('username');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            }
        }
    }

    public function edit($id)
    {
        $data = [
            'nama' => $this->input->post('unama'),
            'nip' => $this->input->post('unip'),
            'npwp' => $this->input->post('unpwp'),
            'foto' => $this->ufoto($id),
            'username' => $this->input->post('uusername'),
            'role_id' => $this->input->post('urole'),
        ];

        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);

        redirect('pegawai');
    }

    private function ufoto($id)
    {
        $get = $this->db->get_where('pegawai', ['id' => $id])->row_array();
        $gambar = $_FILES['ufoto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/img/';
            $config['file_name'] = 'foto ' . $this->input->post('uusername');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('ufoto');

            if ($is_upload != false) {

                $lama = $get['foto'];

                if ($lama != 'default.jpg') {

                    unlink(FCPATH . 'assets/img/' . $lama);
                    return $this->upload->data('file_name');
                }
            }
        } else {
            return $this->input->post('ufoto');
        }
    }

    public function delete($id)
    {
        $get = $this->db->get_where('pegawai', ['id' => $id])->row_array();

        // var_dump($get['foto']);
        // die;

        if ($get['foto'] != 'default.jpg') {

            unlink(FCPATH . 'assets/img/' . $get['foto']);
            $this->db->delete('pegawai', ['id' => $id]);
            redirect('pegawai');
        } else {
            $this->db->delete('pegawai', ['id' => $id]);
            redirect('pegawai');
        }
    }
}
