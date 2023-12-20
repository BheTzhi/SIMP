<?php

class Pedagang_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('pedagang')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('pedagang', ['id' => $id])->row_array();
    }

    public function add()
    {
        $getnik = $this->db->get_where('pedagang', ['nik' => $this->input->post('nik')])->row_array();
        if ($getnik != false) :
            $this->session->set_flashdata('pesan1', '<div class="alert alert-danger" role="alert">Nik Sudah Terdaftar</div>');
            redirect('pedagang');
        else :
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $nik = $this->input->post('nik');
            $ju = $this->input->post('ju');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            // $foto = $this->foto($nama);
            // $ktp = $this->ktp();
            // $npwp = $this->npwp();
            // $kk = $this->kk();

            $role = $this->input->post('role');

            // var_dump($_FILES['kk']['size']);
            // die;

            $data = [
                'nama' => $nama,
                'alamat' => $alamat,
                'nik' => $nik,
                'jenis_usaha' => $ju,
                'foto' => 'default.jpg',
                'ktp' => 'default.jpg',
                'npwp' => 'default.jpg',
                'kk' => 'default.jpg',
                'username' => $username,
                'password' => $password,
                'role_id' => $role,
            ];

            $this->db->insert('pedagang', $data);
            $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Berhasil</div>');
            redirect('pedagang');
        endif;
    }

    function foto($nama)
    {
        $gambar = $_FILES['foto']['tmp_name'];

        if ($gambar) {
            $config['allowed_types']        = 'jpeg|png|jpg';
            $config['max_size']             = 5000;
            $config['upload_path']          = './assets/kioss/';
            $config['file_name']            = 'foto' . $nama;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            } else {
                return 'default.jpg';
            }
        }
    }

    function ktp()
    {
        $gambar = $_FILES['ktp']['name'];

        if ($gambar) {
            $config['allowed_types']        = 'jpeg|png|jpg';
            $config['max_size']             = 5000;
            $config['upload_path']          = './assets/kioss/';
            $config['file_name']            = 'ktp' . $this->input->post('nama');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('ktp');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            } else {
                return 'default.jpg';
            }
        }
    }

    function npwp()
    {
        $gambar = $_FILES['npwp']['name'];

        if ($gambar) {
            $config['allowed_types']        = 'jpeg|png|jpg';
            $config['max_size']             = 5000;
            $config['upload_path']          = './assets/kioss/';
            $config['file_name']            = 'npwp' . $this->input->post('nama');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('npwp');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            } else {
                return 'default.jpg';
            }
        }
    }

    function kk()
    {
        $gambar = $_FILES['kk']['name'];

        if ($gambar) {
            $config['allowed_types']        = 'jpeg|png|jpg';
            $config['max_size']             = 5000;
            $config['upload_path']          = './assets/kioss/';
            $config['file_name']            = 'kk' . $this->input->post('nama');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('kk');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            } else {
                return 'default.jpg';
            }
        }
    }

    public function edit($id)
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $nik = $this->input->post('nik');
        $ju = $this->input->post('ju');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $foto = $this->ufoto($id);
        $ktp = $this->uktp($id);
        $npwp = $this->unpwp($id);
        $kk = $this->ukk($id);
        $role = $this->input->post('role');

        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'nik' => $nik,
            'jenis_usaha' => $ju,
            'foto' => $foto,
            'ktp' => $ktp,
            'npwp' => $npwp,
            'kk' => $kk,
            'username' => $username,
            'password' => $password,
            'role_id' => $role,
        ];

        $this->db->where('id', $id);
        $this->db->update('pedagang', $data);

        redirect('pedagang/detail/' . encrypt_url($id));
    }

    function ufoto($id)
    {
        $gambar = $_FILES['foto']['name'];
        $get = $this->db->get_where('pedagang', ['id' => $id])->row_array();

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5000;
            $config['upload_path'] = './assets/pedagang/';
            $config['file_name'] = 'foto' . $this->input->post('nama');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                $lama = $get['foto'];
                if ($lama == 'default.jpg') {
                    return $this->upload->data('file_name');
                } else {
                    unlink(FCPATH . 'assets/pedagang/' . $lama);
                    return $this->upload->data('file_name');
                }
            }
        } else {
            return $this->input->post('foto');
        }
    }

    function uktp($id)
    {
        $gambar = $_FILES['ktp']['name'];
        $get = $this->db->get_where('pedagang', ['id' => $id])->row_array();

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5000;
            $config['upload_path'] = './assets/pedagang/';
            $config['file_name'] = 'ktp' . $this->input->post('nama');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('ktp');

            if ($is_upload != false) {
                $lama = $get['ktp'];
                if ($lama == 'default.jpg') {
                    return $this->upload->data('file_name');
                } else {
                    unlink(FCPATH . 'assets/pedagang/' . $lama);
                    return $this->upload->data('file_name');
                }
            }
        } else {
            return $this->input->post('ktp');
        }
    }

    function unpwp($id)
    {
        $gambar = $_FILES['npwp']['name'];
        $get = $this->db->get_where('pedagang', ['id' => $id])->row_array();

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5000;
            $config['upload_path'] = './assets/pedagang/';
            $config['file_name'] = 'npwp' . $this->input->post('nama');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('npwp');

            if ($is_upload != false) {
                $lama = $get['npwp'];
                if ($lama == 'default.jpg') {
                    return $this->upload->data('file_name');
                } else {
                    unlink(FCPATH . 'assets/pedagang/' . $lama);
                    return $this->upload->data('file_name');
                }
            }
        } else {
            return $this->input->post('npwp');
        }
    }

    function ukk($id)
    {
        $gambar = $_FILES['kk']['name'];
        $get = $this->db->get_where('pedagang', ['id' => $id])->row_array();

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5000;
            $config['upload_path'] = './assets/pedagang/';
            $config['file_name'] = 'kk' . $this->input->post('nama');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('kk');

            if ($is_upload != false) {
                $lama = $get['kk'];
                if ($lama == 'default.jpg') {
                    return $this->upload->data('file_name');
                } else {
                    unlink(FCPATH . 'assets/pedagang/' . $lama);
                    return $this->upload->data('file_name');
                }
            }
        } else {
            return $this->input->post('kk');
        }
    }

    public function delet($id)
    {
        $get = $this->db->get_where('pedagang', ['id' => $id])->row_array();

        if ($get['foto'] == 'default.jpg' && $get['ktp'] == 'default.jpg' && $get['kk'] == 'default.jpg' && $get['npwp'] == 'default.jpg') {
            $this->db->delete('pedagang', ['id' => $id]);
            $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Berhasil hapus data</div>');
            redirect('pedagang');
            redirect('pedagang');
        } else {
            $foto = unlink(FCPATH . 'assets/pedagang/' . $get['foto']);
            $ktp = unlink(FCPATH . 'assets/pedagang/' . $get['ktp']);
            $npwp = unlink(FCPATH . 'assets/pedagang/' . $get['npwp']);
            $kk = unlink(FCPATH . 'assets/pedagang/' . $get['kk']);

            if ($foto && $ktp && $npwp && $kk) {
                $this->db->delete('pedagang', ['id' => $id]);
                $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Berhasil hapus data</div>');
                redirect('pedagang');
            }
        }
    }

    public function next($nama)
    {
        $query = 'SELECT * FROM pedagang WHERE nama > "' . $nama . '" ORDER BY nama ASC';

        return $this->db->query($query)->row_array();
    }

    public function prev($nama)
    {
        $query = 'SELECT * FROM pedagang WHERE nama < "' . $nama . '" ORDER BY nama desc';

        return $this->db->query($query)->row_array();
    }
}
