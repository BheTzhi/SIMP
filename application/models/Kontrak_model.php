<?php

class Kontrak_model extends CI_Model
{
    public function get()
    {
        $select = 'a.id, a.start, a.end, b.nama, d.blok, c.nomor';

        $this->db->select($select);
        $this->db->from('kontrak a');
        $this->db->join('pedagang b', 'b.id = a.pedagang_id');
        $this->db->join('kios c', 'c.id = a.kios_id');
        $this->db->join('blok d', 'd.id = c.blok_id');

        return $this->db->get()->result_array();
    }

    public function getById($id)
    {
        $select = 'a.id, a.nilai, a.start, a.end, b.nama, d.blok, c.foto, c.nomor';

        $this->db->select($select);
        $this->db->from('kontrak a');
        $this->db->join('pedagang b', 'b.id = a.pedagang_id');
        $this->db->join('kios c', 'c.id = a.kios_id');
        $this->db->join('blok d', 'd.id = c.blok_id');
        $this->db->where('a.id', $id);

        return $this->db->get()->row_array();
    }

    public function add()
    {
        $data = [
            'pedagang_id' => $this->input->post('nama'),
            'kios_id' => $this->input->post('kios'),
            'nilai' => preg_replace('/\D/', '', $this->input->post('nominal')),
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
        ];

        $this->db->insert('kontrak', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data kontrak!</div>');

        redirect('kontrak');
    }

    public function getDetail($id)
    {

        return $this->db->get_where('dkontrak', ['kontrak_id' => $id])->result_array();
    }

    public function bayar($id)
    {
        $data = [
            'kontrak_id' => $id,
            'kwt' => $this->input->post('kwt'),
            'nominal' => preg_replace('/\D/', '', $this->input->post('nominal')),
        ];

        $this->db->insert('dkontrak', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data kontrak!</div>');

        redirect('kontrak/detail/' . encrypt_url($id));
    }

    public function getNomKwt()
    {
        $this->db->select('MAX(SUBSTRING(kwt, 1,2)) kwt');
        return $this->db->get('dkontrak')->row_array();
    }

    public function getTotal($id)
    {
        $this->db->select_sum('nominal', 'ttl');
        return $this->db->get_where('dkontrak', ['kontrak_id' => $id])->row_array();
    }

    public function delete($id)
    {
        $kontrak = $this->db->delete('kontrak', ['id' => $id]);

        if ($kontrak) {
            $this->db->delete('dkontrak', ['kontrak_id' => $id]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hapus Kontrak.!</div>');

            redirect('kontrak');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hapus Kontrak.!</div>');

            redirect('kontrak');
        }
    }

    public function delKon($id, $link)
    {

        $this->db->delete('dkontrak', ['id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hapus bukti pembayaran.!</div>');

        redirect('kontrak/detail/' . $link);
    }
}
