<?php

class Pembayaran_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('pembayaran')->result_array();
    }

    public function add()
    {
        $data = [
            'pembayaran' => $this->input->post('pembayaran'),
            'kode' => $this->input->post('kode')
        ];

        $this->db->insert('pembayaran', $data);

        redirect('pembayaran');
    }

    public function edit($id)
    {
        $pembayaran = $this->input->post('upembayaran');
        $kode = $this->input->post('ukode');

        $data = [
            'id' => $id,
            'pembayaran' => $pembayaran,
            'kode' => $kode,
        ];

        $this->db->replace('pembayaran', $data);

        redirect('pembayaran');
    }

    public function delete($id)
    {
        $this->db->delete('pembayaran', ['id' => $id]);

        redirect('pembayaran');
    }
}
