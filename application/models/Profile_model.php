<?php

class Profile_model extends CI_Model
{

    public function edit($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'foto' => $this->foto($id),
        ];

        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);

        $user = $this->db->get_where('pegawai', ['username' => $this->input->post('username')])->row_array();

        if ($user) {
            $data = [
                'username' => $user['username'],
                'role_id' => $user['role_id'],
            ];

            $this->session->set_userdata($data);

            redirect('profile');
        }
    }

    private function foto($id)
    {
        $get = $this->db->get_where('pegawai', ['id' => $id])->row_array();
        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/img/';
            $config['file_name'] = 'foto ' . $this->input->post('username');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                $lama = $get['foto'];

                if ($lama) {
                    unlink(FCPATH . 'assets/img/' . $lama);

                    return $this->upload->data('file_name');
                }
            }
        } else {

            return $this->input->post('foto');
        }
    }

    public function gantipassword()
    {
        $lama = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();

        $pLama = $this->input->post('lama');
        $baru = $this->input->post('baru');

        if ($lama['password'] != md5($pLama)) :

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');

            redirect('profile/password');

        else :

            if ($pLama == $baru) :
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password baru sama dengan yang lama!</div>');

                redirect('profile/password');
            else :
                $this->db->set('password', md5($baru));
                $this->db->where('id', $lama['id']);
                $this->db->update('pegawai');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');

                redirect('profile/password');

            endif;

        endif;
    }
}
