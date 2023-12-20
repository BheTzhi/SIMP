<?php

class Pengelola_model extends CI_Model
{

    public function getBbab($id, $bulantahun)
    {
        $this->db->select('a.id, a.kios_id, d.nama, c.blok, (SELECT GROUP_CONCAT(nomor) FROM kios WHERE link = a.kios_id GROUP BY link) nomor, b.lantai, b.blok_id, a.blalu, a.bini, a.pemakaian, e.daya, e.pkwh, e.harga, a.beban, a.status, a.awal, a.akhir, a.bulantahun, a.kblalu, a.kbbl, a.foto');
        $this->db->from('kwhbulan a');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $this->db->join('pedagang d', 'd.id=b.pedagang_id');
        $this->db->join('listrik e', 'e.id=b.listrik_id');
        $this->db->where('b.l_status <>', null);
        $this->db->where('c.id', $id);
        $this->db->where('a.bulantahun', $bulantahun);

        return $this->db->get()->result_array();
    }

    public function getAll($id)
    {
        $this->db->select('a.id, a.kios_id, d.nama, c.blok, (SELECT GROUP_CONCAT(nomor) FROM kios WHERE link = a.kios_id GROUP BY link) nomor, b.lantai, b.blok_id, a.blalu, a.bini, a.pemakaian, e.daya, e.pkwh, e.harga, a.beban, a.status, a.awal, a.akhir, a.bulantahun, a.kblalu, a.kbbl, a.foto');
        $this->db->from('kwhbulan a');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $this->db->join('pedagang d', 'd.id=b.pedagang_id');
        $this->db->join('listrik e', 'e.id=b.listrik_id');
        $this->db->where('c.id', $id);

        return $this->db->get()->result_array();
    }

    public function getBbabAir($id, $bulantahun)
    {
        $select = 'a.id, a.kios_id, d.nama, c.blok, (SELECT GROUP_CONCAT(nomor) FROM kios WHERE link = a.kios_id GROUP BY link) nomor, b.lantai,';
        $select .= 'a.blalu, a.bini, a.awal, a.akhir, a.pemakaian, a.status, a.bulantahun, b.blok_id, a.kblalu, a.kbbl, a.foto';

        $this->db->select($select);
        $this->db->from('wmeter a');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $this->db->join('pedagang d', 'd.id=b.pedagang_id');
        $this->db->where('b.a_status <>', null);
        $this->db->where('c.id', $id);
        $this->db->where('a.bulantahun', $bulantahun);

        return $this->db->get()->result_array();
    }

    public function getAllAir($id)
    {
        $select = 'a.id, a.kios_id, d.nama, c.blok, (SELECT GROUP_CONCAT(nomor) FROM kios WHERE link = a.kios_id GROUP BY link) nomor, b.lantai,';
        $select .= 'a.blalu, a.bini, a.awal, a.akhir, a.pemakaian, a.status, a.bulantahun, b.blok_id, a.kblalu, a.kbbl, a.foto';

        $this->db->select($select);
        $this->db->from('wmeter a');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $this->db->join('pedagang d', 'd.id=b.pedagang_id');
        $this->db->where('c.id', $id);

        return $this->db->get()->result_array();
    }

    public function bayar($jenis, $id)
    {
        if ($jenis == 'lst') :

            $this->db->set('status', 1);
            $this->db->where('id', $id);
            $this->db->update('kwhbulan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil bayar tagihan listrik!</div>');

            redirect('pengelola/listrik');

        elseif ($jenis == 'air') :
            $this->db->set('status', 1);
            $this->db->where('id', $id);
            $this->db->update('wmeter');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil bayar tagihan air!</div>');

            redirect('pengelola/air');

        endif;
    }
}
