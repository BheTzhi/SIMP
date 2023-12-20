<?php

class Etc_model extends CI_Model
{
    public function getKondisi()
    {
        return $this->db->get('kondisi')->result_array();
    }

    public function addKondisi()
    {
        $data = ['kondisi' => $this->input->post('kondisi')];
        $this->db->insert('kondisi', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data!</div>');
        redirect('manajemen/kondisi');
    }

    public function editKondisi()
    {
        $data = ['id' => $this->input->post('id'), 'kondisi' => $this->input->post('kondisi')];
        $this->db->replace('kondisi', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil edit data!</div>');
        redirect('manajemen/kondisi');
    }

    public function deleteKondisi($id)
    {

        $this->db->delete('kondisi', ['id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil hapus data!</div>');
        redirect('manajemen/kondisi');
    }

    public function getJenis()
    {
        return $this->db->get('jenis')->result_array();
    }

    public function getKJ()
    {
        $this->db->order_by('kode', 'desc');
        $res = $this->db->get('jenis');

        if ($res) :
            return json_encode(['status' => 1, 'results' => $res->row_array()]);
        else :
            return json_encode(['status' => 0, 'results' => null]);
        endif;
    }

    public function addJenis()
    {
        $data = ['kode' => $this->input->post('kode'), 'jenis' => $this->input->post('jenis')];
        $this->db->insert('jenis', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data!</div>');
        redirect('manajemen/jenis');
    }

    public function editJenis()
    {
        $data = ['kode' => $this->input->post('kode'), 'jenis' => $this->input->post('jenis')];
        $this->db->replace('jenis', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil edit data!</div>');
        redirect('manajemen/jenis');
    }

    public function deleteJenis($id)
    {
        $this->db->delete('jenis', ['kode' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil hapus data!</div>');
        redirect('manajemen/jenis');
    }

    public function getRuang()
    {
        return $this->db->get('ruang')->result();
    }

    public function getKR()
    {
        $this->db->order_by('kode', 'desc');
        $res = $this->db->get('ruang');

        if ($res) :
            return json_encode(['status' => 1, 'results' => $res->row_array()]);
        else :
            return json_encode(['status' => 0, 'results' => null]);
        endif;
    }

    public function addRuang()
    {
        $data = ['kode' => $this->input->post('kode'), 'ruang' => $this->input->post('ruang')];
        $this->db->insert('ruang', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data!</div>');
        redirect('manajemen/ruang');
    }

    public function editRuang()
    {
        $data = ['kode' => $this->input->post('kode'), 'ruang' => $this->input->post('ruang')];
        $this->db->replace('ruang', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil edit data!</div>');
        redirect('manajemen/ruang');
    }

    public function deleteRuang($id)
    {
        $this->db->delete('ruang', ['kode' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil hapus data!</div>');
        redirect('manajemen/ruang');
    }
}
