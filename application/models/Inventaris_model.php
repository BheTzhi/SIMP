<?php

class Inventaris_model extends CI_Model
{
    public function get()
    {
        $selected = 'a.id, a.kode, a.nama, a.foto, b.kondisi, c.nama nama_pegawai, a.tanggal_beli, a.harga, a.tanggal_pengecekan, a.qr,';
        $selected .= '(SELECT d.jenis FROM jenis d WHERE d.kode = SUBSTRING(a.kode,4,3)) jenis,(SELECT e.ruang FROM ruang e WHERE e.kode = SUBSTRING(a.kode, 7,3)) ruang,';
        $selected .= '(SELECT e.kode FROM ruang e WHERE e.kode = SUBSTRING(a.kode, 7,3)) idr';
        $this->db->select($selected);
        $this->db->join('kondisi b', 'b.id=a.kondisi_id');
        $this->db->join('pegawai c', 'c.id=a.pegawai_id');
        return $this->db->get('inventaris a')->result();
    }

    public function getUrut()
    {
        $ruang = $this->input->post('ruang');

        $selected = 'SUBSTRING(kode,7,3) ruang, MAX(CAST(SUBSTRING(kode, 10,3) AS UNSIGNED)) res';
        $this->db->select($selected);
        $this->db->where('SUBSTRING(kode,7,3)', $ruang);
        $this->db->group_by('ruang');
        $res = $this->db->get('inventaris');

        $status = $res ? 1 : 0;
        return json_encode(['status' => $status, 'results' => $res->row()]);
    }

    public function getK()
    {
        $ruang = $this->input->post('ruang');

        $selected = 'SUBSTRING(kode,7,3) ruang, MAX(CAST(SUBSTRING(kode, 10,3) AS UNSIGNED)) res';
        $this->db->select($selected);
        $this->db->where('SUBSTRING(kode,7,3)', $ruang);
        $this->db->group_by('ruang');
        $data = $this->db->get('inventaris');

        return json_encode($data->row());
    }

    public function getData()
    {
        $selected = 'a.id, SUBSTRING(a.kode,-3) urut,a.kode, a.nama, a.foto, a.kondisi_id, a.pegawai_id, FROM_UNIXTIME(a.tanggal_beli,"%Y-%m-%d") tanggal_beli, FORMAT(a.harga, 0) harga,';
        $selected .= '(SELECT d.kode FROM jenis d WHERE d.kode = SUBSTRING(a.kode,4,3)) jenis, (SELECT e.kode FROM ruang e WHERE e.kode = SUBSTRING(a.kode, 7,3)) ruang';
        $this->db->select($selected);
        $this->db->where('a.kode', $this->input->post('kode'));
        $res = $this->db->get('inventaris a')->row();

        $status = $res ? 1 : 0;

        return json_encode(['status' => $status, 'results' => $res]);
    }

    public function add()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $kondisi = $this->input->post('kondisi');
        $tanggal_beli = strtotime($this->input->post('tanggal_beli'));
        $foto = $this->foto($kode);
        $harga = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
        $tanggal_pengecekan = strtotime($this->input->post('tanggal_beli'));
        $pegawai = $this->input->post('pegawai');

        $data = [
            'kode' => $kode,
            'nama' => $nama,
            'kondisi_id' => $kondisi,
            'tanggal_beli' => $tanggal_beli,
            'foto' => $foto,
            'harga' => $harga,
            'tanggal_pengecekan' => $tanggal_pengecekan,
            'pegawai_id' => $pegawai
        ];

        $this->db->insert('inventaris', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data!</div>');
        redirect('manajemen/inventaris');
    }

    private function foto($kode)
    {
        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/inventaris/';
            $config['file_name'] = $kode;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {

                return $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
                return 'default.jpg';
            }
        } else {
            return 'default.jpg';
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $kondisi = $this->input->post('kondisi');
        $tanggal_beli = strtotime($this->input->post('tanggal_beli'));
        $foto = $this->ufoto($id, $kode);
        $harga = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
        $tanggal_pengecekan = strtotime(date('Y-m-d'));
        $pegawai = $this->input->post('pegawai');

        $data = [
            'id' => $id,
            'kode' => $kode,
            'nama' => $nama,
            'kondisi_id' => $kondisi,
            'tanggal_beli' => $tanggal_beli,
            'foto' => $foto,
            'harga' => $harga,
            'tanggal_pengecekan' => $tanggal_pengecekan,
            'pegawai_id' => $pegawai
        ];

        try {
            $this->db->update('inventaris', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil edit data!</div>');
            redirect('manajemen/inventaris');
        } catch (Exception $e) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal edit data: ' . $e->getMessage() . '</div>');
            redirect('manajemen/inventaris');
        }
    }

    public function ufoto($id, $kode)
    {
        $get = $this->db->get_where('inventaris', ['id' => $id])->row();

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5000;
            $config['upload_path'] = './assets/inventaris/';
            $config['file_name'] = $kode;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $lama = $get->foto;

                if ($lama !== 'default.jpg' && file_exists(FCPATH . 'assets/inventaris/' . $lama)) {
                    unlink(FCPATH . 'assets/inventaris/' . $lama);
                }

                return $this->upload->data('file_name');
            } else {
                return $get->foto;
            }
        } else {
            return $get->foto;
        }
    }

    public function delete($id)
    {
        try {
            // Ambil data inventaris berdasarkan ID
            $data = $this->db->get_where('inventaris', ['id' => $id])->row();

            // Cek apakah data ditemukan
            if ($data) {
                // Hapus file foto jika bukan default.jpg
                $foto = $data->foto;

                if ($foto !== 'default.jpg' && file_exists(FCPATH . 'assets/inventaris/' . $foto)) {
                    unlink(FCPATH . 'assets/inventaris/' . $foto);
                }

                unlink(FCPATH . 'assets/qr/' . $data->qr);

                // Hapus data dari database
                $this->db->delete('inventaris', ['id' => $id]);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil hapus data!</div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data tidak ditemukan!</div>');
            }

            // Redirect ke halaman inventaris
            redirect('manajemen/inventaris');
        } catch (Exception $e) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal hapus data: ' . $e->getMessage() . '</div>');
            redirect('manajemen/inventaris');
        }
    }

    public function save_qr()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('text');
        $image = $this->input->post('image');

        // Decode base64
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('', '+', $image);
        $imageBinary = base64_decode($image);

        // Simpan
        $imageName = $kode . '_qr.png';
        $imagePath = FCPATH . 'assets/qr/' . $imageName;

        $save = file_put_contents($imagePath, $imageBinary);

        if ($save) {
            $this->saveToDb($id, $imageName);

            return json_encode(['status' => 200]);
        }
    }


    private function saveToDb($id, $name)
    {
        $this->db->set('qr', $name);
        $this->db->where('id', $id);
        $this->db->update('inventaris');
    }
}
