<?php

class Keuangan_model extends CI_Model
{
    public function getPotongan()
    {
        return $this->db->get('potongan')->result_array();
    }

    public function addPotongan()
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'nominal' => $this->input->post('nominal'),
        ];

        $this->db->insert('potongan', $data);

        redirect('keuangan');
    }

    public function editPotongan($id)
    {
        $data = [
            'id' => $id,
            'keterangan' => $this->input->post('uketerangan'),
            'nominal' => $this->input->post('unominal'),
        ];

        $this->db->replace('potongan', $data);

        redirect('keuangan');
    }

    public function delPotongan($id)
    {
        // $this->db->delete('potongan', ['id' => $id]);
        $this->db->delete('potongan', ['id' => $id]);

        redirect('keuangan');
    }

    public function earnging($id)
    {

        $pokok = $this->input->post('pokok');
        $tunjangan = $this->input->post('tunjangan');

        $this->db->where('id', $id);
        $this->db->update('user_role', ['pokok' => $pokok, 'tunjangan' => $tunjangan]);

        redirect('keuangan');
    }

    public function gaji($bulantahun)
    {

        $this->db->select('a.id, b.nama, c.pokok, c.tunjangan, a.masuk, a.sakit, a.izin, a.alpa, b.foto');
        $this->db->join('pegawai b', 'b.id = a.pegawai_id');
        $this->db->join('user_role c', 'c.id = b.role_id');
        $this->db->group_by('a.pegawai_id');
        $this->db->where('a.bulantahun', $bulantahun);
        return $this->db->get('absensi a')->result_array();
    }

    public function cetak($id)
    {
        $this->db->select('a.id, b.nip, b.nama, c.pokok, c.tunjangan, a.masuk, a.sakit, a.izin, a.alpa, b.foto, c.role, a.bulantahun');
        $this->db->join('pegawai b', 'b.id = a.pegawai_id');
        $this->db->join('user_role c', 'c.id = b.role_id');
        $this->db->group_by('a.pegawai_id');
        $this->db->where('a.id', $id);
        return $this->db->get('absensi a')->row_array();
    }
}
