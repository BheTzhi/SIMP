<?php

class Air_model extends CI_Model
{

    public function status($id, $val, $redirect)
    {
        if ($val == 1) {
            $val = $val;
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Pasang!</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Buka!</div>');
            $val = null;
        }

        $this->db->set('a_status', $val);

        $this->db->where('id', $id);
        $this->db->update('kios');

        redirect('air/meteran/' . $redirect);
    }

    public function getJson($id, $bulan)
    {
        return $this->db->get_where('wmeter', ['kios_id' => $id, 'bulantahun' => $bulan])->row_array();
    }

    public function add($blok, $id)
    {
        $kid = $this->input->post('kid');
        $bulantahun = $this->input->post('bulan') . $this->input->post('tahun');

        $get = $this->db->get_where('wmeter', ['kios_id' => $kid, 'bulantahun' => $bulantahun]);

        $blalu = $this->input->post('blalu');
        $bini = $this->input->post('bini');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $pemakaian = $this->input->post('pemakaian');
        $kblalu = $this->input->post('kblalu');
        $kbbl = $this->input->post('kbbl');
        $user_id = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array()['id'];

        if ($get->num_rows() < 1) :
            $foto = $this->foto($kid, $bulantahun);
            $data = [
                'kios_id' => $kid,
                'blalu' => $blalu,
                'bini' => $bini,
                'awal' => $awal,
                'akhir' => $akhir,
                'pemakaian' => $pemakaian,
                'bulantahun' => $bulantahun,
                'foto' => $foto,
                'kblalu' => $kblalu,
                'kbbl' => $kbbl,
                'user_id' => $user_id,
            ];

            $this->db->insert('wmeter', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil!</div>');

            redirect('air/meteran/' . $blok);

        else :

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data sudah pernah di input!</div>');
            redirect('air/meteran/' . $blok . '/' . $id);

        endif;
    }

    private function foto($id, $bulantahun)
    {
        $this->db->select('a.nomor, b.blok');
        $this->db->join('blok b', 'b.id=a.blok_id');
        $getKios = $this->db->get_where('kios a', ['a.id' => $id])->row_array();

        $nama = $getKios['blok'] . $getKios['nomor'] . $bulantahun;

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/wmeter/';
            $config['file_name'] = $nama;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            }
        }
    }

    public function edit($blok, $id)
    {
        $kid = $this->input->post('kid');
        $bulantahun = $this->input->post('bulan') . $this->input->post('tahun');

        $get = $this->db->get_where('wmeter', ['kios_id' => $kid, 'bulantahun' => $bulantahun]);

        $blalu = $this->input->post('blalu');
        $bini = $this->input->post('bini');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $pemakaian = $this->input->post('pemakaian');
        $kblalu = $this->input->post('kblalu');
        $kbbl = $this->input->post('kbbl');
        $user_id = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array()['id'];


        if ($get->num_rows() > 0) :
            $foto = $this->ufoto($kid, $bulantahun);
            $data = [
                'blalu' => $blalu,
                'bini' => $bini,
                'awal' => $awal,
                'akhir' => $akhir,
                'pemakaian' => $pemakaian,
                'foto' => $foto,
                'kblalu' => $kblalu,
                'kbbl' => $kbbl,
                'user_id' => $user_id,
            ];

            $this->db->where('kios_id', $kid);
            $this->db->where('bulantahun', $bulantahun);
            $this->db->update('wmeter', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil diubah!</div>');

            redirect('air/meteran/' . $blok . '/' . $id);

        else :

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan periksa kembali!</div>');
            redirect('air/meteran/' . $blok . '/' . $id . '/edit');

        endif;
    }

    private function ufoto($id, $bulantahun)
    {
        $this->db->select('a.nomor, b.blok');
        $this->db->join('blok b', 'b.id=a.blok_id');
        $getKios = $this->db->get_where('kios a', ['a.id' => $id])->row_array();

        $nama = $getKios['blok'] . $getKios['nomor'] . $bulantahun;

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/wmeter/';
            $config['file_name'] = $nama;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {

                $get = $this->db->get_where('wmeter', ['kios_id' => $id, 'bulantahun' => $bulantahun])->row_array();
                $lama = $get['foto'];

                if ($lama != 'default.jpg') {

                    unlink(FCPATH . 'assets/wmeter/' . $lama);
                    return $this->upload->data('file_name');
                }
            }
        }
    }
}
