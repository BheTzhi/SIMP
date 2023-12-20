<?php

class Listrik_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('listrik')->result_array();
    }

    public function add()
    {
        $data = [
            'daya' => $this->input->post('daya'),
            'harga' => $this->input->post('harga'),
            'pkwh' => $this->input->post('pkwh'),
        ];

        $this->db->insert('listrik', $data);

        redirect('listrik');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            'daya' => $this->input->post('udaya'),
            'harga' => $this->input->post('uharga'),
            'pkwh' => $this->input->post('upkwh'),
        ];

        $this->db->replace('listrik', $data);

        redirect('listrik');
    }

    public function delete($id)
    {
        $this->db->delete('listrik', ['id' => $id]);

        redirect('listrik');
    }

    public function ubahDaya()
    {

        $this->db->set('listrik_id', $this->input->post('daya'));

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kios');

        redirect('listrik/meteran/' . $this->input->post('blok'));
    }

    public function getJson($id, $bulan)
    {
        return $this->db->get_where('kwhbulan', ['kios_id' => $id, 'bulantahun' => $bulan])->row_array();
    }

    public function addKwh($blok, $id)
    {
        $kid = $this->input->post('kid');
        $bulantahun = $this->input->post('bulan') . $this->input->post('tahun');

        $get = $this->db->get_where('kwhbulan', ['kios_id' => $kid, 'bulantahun' => $bulantahun]);

        $blalu = $this->input->post('blalu');
        $bini = $this->input->post('bini');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $pemakaian = $this->input->post('pemakaian');
        $beban = $this->input->post('beban');
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
                'beban' => $beban,
                'user_id' => $user_id,
            ];

            $this->db->insert('kwhbulan', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil!</div>');

            redirect('listrik/meteran/' . $blok);

        else :

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data sudah pernah di input!</div>');
            redirect('listrik/meteran/' . $blok . '/' . $id);

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
            $config['upload_path'] = './assets/kwh/';
            $config['file_name'] = $nama;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            }
        }
    }

    public function editKwh($blok, $id)
    {
        $kid = $this->input->post('kid');
        $bulantahun = $this->input->post('bulan') . $this->input->post('tahun');

        $get = $this->db->get_where('kwhbulan', ['kios_id' => $kid, 'bulantahun' => $bulantahun]);

        $blalu = $this->input->post('blalu');
        $bini = $this->input->post('bini');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $pemakaian = $this->input->post('pemakaian');
        $kblalu = $this->input->post('kblalu');
        $kbbl = $this->input->post('kbbl');
        $beban = $this->input->post('beban');
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
                'beban' => $beban,
                'user_id' => $user_id,
            ];

            $this->db->where('kios_id', $kid);
            $this->db->where('bulantahun', $bulantahun);
            $this->db->update('kwhbulan', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil diubah!</div>');

            redirect('listrik/meteran/' . $blok . '/' . $id);

        else :

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan periksa kembali!</div>');
            redirect('listrik/meteran/' . $blok . '/' . $id . '/edit');

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
            $config['upload_path'] = './assets/kwh/';
            $config['file_name'] = $nama;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {

                $get = $this->db->get_where('kwhbulan', ['kios_id' => $id, 'bulantahun' => $bulantahun])->row_array();
                $lama = $get['foto'];

                if ($lama != 'default.jpg') {

                    unlink(FCPATH . 'assets/kwh/' . $lama);
                    return $this->upload->data('file_name');
                }
            }
        }
    }

    public function status($id, $val, $blok)
    {
        if ($val == 1) {
            $val = $val;
        } else {
            $val = null;
        }

        $this->db->set('l_status', $val);

        $this->db->where('id', $id);
        $this->db->update('kios');

        redirect('listrik/meteran/' . $blok);
    }
}
