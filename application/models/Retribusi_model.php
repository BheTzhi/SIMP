<?php

class Retribusi_model extends CI_Model
{
    public function getToDay()
    {
        $selected = 'a.id, c.blok, b.nomor, a.tagihan, a.tglblnthn, a.status, d.nama';
        $this->db->select($selected);
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $this->db->join('pedagang d', 'd.id=b.pedagang_id');
        $this->db->order_by('c.blok', 'asc');
        $this->db->order_by('b.nomor', 'asc');
        return $this->db->get_where('retribusi a', ['a.tglblnthn' => strtotime(date('Y-m-d'))]);
    }

    public function getByDate($date)
    {
        $selected = 'a.id, c.blok, b.nomor, a.tagihan, a.tglblnthn, a.status, d.nama';
        $this->db->select($selected);
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $this->db->join('pedagang d', 'd.id=b.pedagang_id');
        $this->db->order_by('c.blok', 'asc');
        $this->db->order_by('b.nomor', 'asc');
        return $this->db->get_where('retribusi a', ['a.tglblnthn' => strtotime($date)]);
    }

    public function cetakTagihan()
    {
        $this->db->where('status != 0');
        $this->db->where('blok_id != 8');
        $this->db->order_by('id', 'ASC');
        $kios = $this->pasar->getKiosAll();

        foreach ($kios as $k) {
            $kios_id = $k['id'];
            $tagihan = 13000;
            $tglblnthn = strtotime(date('Y-m-d'));
            $status = 0;

            $data_to_insert[] = [
                'kios_id' => $kios_id,
                'tagihan' => $tagihan,
                'tglblnthn' => $tglblnthn,
                'status' => $status
            ];
        }

        if ($this->getToDay()->num_rows() < 1) :

            $this->db->insert_batch('retribusi', $data_to_insert);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tagihan hari ini Berhasil dicetak!</div>');

            redirect('retribusi');
        else :
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Tagihan hari ini sudah ada!</div>');

            redirect('retribusi');
        endif;
    }

    public function cetakTagihanOtomatis()
    {
        $this->db->where('status != 0');
        $this->db->where('blok_id != 8');
        $this->db->order_by('id', 'ASC');
        $kios = $this->pasar->getKiosAll();

        foreach ($kios as $k) {
            $kios_id = $k['id'];
            $tagihan = 13000;
            $tglblnthn = strtotime(date('Y-m-d'));
            $status = 0;

            $data_to_insert[] = [
                'kios_id' => $kios_id,
                'tagihan' => $tagihan,
                'tglblnthn' => $tglblnthn,
                'status' => $status
            ];
        }

        if ($this->getToDay()->num_rows() < 1) :

            $this->db->insert_batch('retribusi', $data_to_insert);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tagihan hari ini Berhasil dicetak!</div>');

            redirect('auth');
        else :
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Tagihan hari ini sudah ada!</div>');

            redirect('auth');
        endif;
    }

    public function bayar($id)
    {
        $this->db->set('status', 1);

        $this->db->where('id', $id);
        $this->db->update('retribusi');

        $this->db->select('a.id, b.nomor, c.blok');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $data = $this->db->get_where('retribusi a', ['a.id' => $id])->row_array();

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">' . $data['blok'] . '.' . $data['nomor'] . ' Sudah bayar retribusi!</div>');
        redirect('retribusi');
    }

    public function getPengelompokanRetribusi($date)
    {
        $selected = "d.nama, GROUP_CONCAT(CONCAT(c.blok,'-', b.nomor) ORDER BY c.blok, b.nomor) as nomor, a.tagihan, DATE_FORMAT(FROM_UNIXTIME(a.tglblnthn), '%W, %e %M %Y') as tglblnthn, a.status";
        $this->db->select($selected);
        $this->db->from('retribusi a');
        $this->db->join('kios b', 'b.id=a.kios_id');
        $this->db->join('blok c', 'c.id=b.blok_id');
        $this->db->join('pedagang d', 'd.id=b.pedagang_id');
        $this->db->where('a.tglblnthn', strtotime($date));
        $this->db->group_by('d.nama, a.tagihan, a.tglblnthn, a.status');
        $this->db->order_by('d.nama ASC, nomor ASC');

        return $this->db->get()->result_array();
    }
}
