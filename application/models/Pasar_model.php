<?php

class Pasar_model extends CI_Model
{
    public function getBlok()
    {
        return $this->db->get('blok')->result_array();
    }

    public function addBlok()
    {
        $blok =  $this->input->post('blok');
        $type = $this->input->post('type');
        $ukuran = $this->input->post('ukuran');
        $gambar = $this->gambarBlok();

        $data = [
            'blok' => $blok,
            'type' => $type,
            'ukuran' => $ukuran,
            'gambar' => $gambar,
        ];

        $this->db->insert('blok', $data);

        redirect('pasar');
    }

    function gambarBlok()
    {
        $gambar = $_FILES['gambar']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/blok/';
            $config['file_name'] = $this->input->post('blok');

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('gambar');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            }
        }
    }

    public function getBlokById($id)
    {
        return $this->db->get_where('blok', ['id' => $id])->row_array();
    }

    public function getAwal($id)
    {
        $nomor = $this->db->get_where('kios', ['blok_id' => $id])->row_array();
        // var_dump($nomor);
        // die;
        if ($nomor == null) {
            return 0;
        } else {
            $this->db->select_min('nomor');
            $this->db->where('blok_id', $id);
            return $this->db->get('kios')->row_array();
        }
    }

    public function getTerakhir($id)
    {
        $nomor = $this->db->get_where('kios', ['blok_id' => $id])->row_array();
        // var_dump($nomor);
        // die;
        if ($nomor == null) {
            return 0;
        } else {
            $this->db->select_max('nomor');
            $this->db->where('blok_id', $id);
            return $this->db->get('kios')->row_array();
        }
    }

    public function getKiosByBlok($id)
    {
        $this->db->select('a.id, b.blok, b.ukuran, a.nomor, a.foto, c.nama, a.harga, a.status, a.blok_id, a.lantai, d.daya, a.l_status, a.a_status, a.listrik_id');
        $this->db->join('blok b', 'b.id=a.blok_id');
        $this->db->join('pedagang c', 'c.id = a.pedagang_id');
        $this->db->join('listrik d', 'a.listrik_id=d.id');
        $this->db->from('kios a');
        $this->db->where('blok_id', $id);
        return $this->db->get()->result_array();
    }

    public function getKiosByBlokGabung($id)
    {
        $this->db->select('a.id, a.blok_id, b.blok, b.ukuran, GROUP_CONCAT(a.nomor) nomor, a.foto, c.nama, a.harga, a.status, a.blok_id, a.lantai, d.daya, a.l_status, a.a_status, a.listrik_id');
        $this->db->join('blok b', 'b.id=a.blok_id');
        $this->db->join('pedagang c', 'c.id = a.pedagang_id');
        $this->db->join('listrik d', 'a.listrik_id=d.id');
        $this->db->from('kios a');
        $this->db->where('blok_id', $id);
        $this->db->group_by('link');

        return $this->db->get()->result_array();
    }

    // public function getKiosByBlokGabung($id)
    // {
    //     $query = "SELECT a.id, b.blok, b.ukuran, 
    //     IF(a.blok_id = 8 AND a.nomor = 001, 'Masjid', 
    //        IF(a.blok_id = 8 AND a.nomor = 002, 'PD Pasar', 
    //           IF(a.blok_id = 8 AND a.nomor = 003, 'Gudang ME', 
    //              IF(a.blok_id = 8 AND a.nomor = 004, 'Gudang Cleaning', 
    //                 IF(a.blok_id = 8 AND a.nomor = 005, 'Ruang ME', GROUP_CONCAT(a.nomor))
    //                )
    //             )
    //          )
    //       ) nomor,
    //     a.foto, c.nama, a.harga, a.status, 
    //     a.blok_id, a.lantai, d.daya, a.l_status, 
    //     a.a_status, a.listrik_id

    //     FROM kios a

    //     join blok b ON b.id=a.blok_id
    //     join pedagang c ON c.id = a.pedagang_id
    //     join listrik d ON a.listrik_id=d.id
    //     WHERE a.blok_id = $id
    //     GROUP BY a.link";

    //     return $this->db->query($query)->result_array();
    // }

    public function getKiosByPedagang($id)
    {
        $this->db->select('a.id, b.blok, b.type, b.ukuran, a.nomor, a.foto, c.nama, a.harga, a.status, a.blok_id, a.lantai, a.bayar, a.diskon, a.n_diskon');
        $this->db->join('blok b', 'b.id=a.blok_id');
        $this->db->join('pedagang c', 'c.id = a.pedagang_id');
        $this->db->from('kios a');
        $this->db->where('a.pedagang_id', $id);
        return $this->db->get()->result_array();
    }

    public function addKios($id)
    {

        $blok = $this->input->post('blok');
        $nomor = $this->input->post('nomor');
        $lantai = $this->input->post('lantai');
        $harga = preg_replace("/[^0-9]/", "", $this->input->post('harga'));
        $listrik = $this->input->post('listrik');
        $foto = $this->foto($blok, $nomor);

        $data = [
            'blok_id' => $blok,
            'nomor' => $nomor,
            'lantai' => $lantai,
            'harga' => $harga,
            'status' => 0,
            'pedagang_id' => 0,
            'gabung' => 0,
            'bayar' => 0,
            'diskon' => 0,
            'n_diskon' => 0,
            'pembayaran_id' => 0,
            'listrik_id' => $listrik,
            'foto' => $foto,
        ];

        $this->db->insert('kios', $data);

        redirect('pasar/kios/' . encrypt_url($id));
    }

    function foto($id, $nomor)
    {
        $blok = $this->db->get_where('blok', ['id' => $id])->row_array();

        $gambar = $_FILES['gambar']['name'];

        if ($gambar) {
            $config['allowed_types']        = 'jpeg|png|jpg';
            $config['max_size']             = 5000;
            $config['upload_path']          = './assets/kioss/';
            $config['file_name']            = $blok['blok'] . $nomor;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('gambar');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            } else {
                var_dump($is_upload);
                die;
            }
        }
    }

    public function editKios($id, $blok)
    {

        $this->db->set('harga', $this->input->post('uharga'));
        $this->db->where('id', $id);
        $this->db->update('kios');

        redirect('pasar/kios/' . encrypt_url($blok));
    }

    public function deletKios($id, $blok)
    {
        $get = $this->db->get_where('kios', ['id' => $id])->row_array();

        $delete = $this->db->delete('kios', ['id' => $id]);


        if ($delete) :

            $foto = unlink(FCPATH . 'assets/kioss/' . $get['foto']);

            if ($foto != false) :

                redirect('pasar/kios/' . encrypt_url($blok));

            endif;

        endif;
    }

    public function getKios($id)
    {
        $this->db->select('a.id, a.blok_id, a.foto , b.blok, a.nomor, b.type, b.ukuran, a.lantai, a.harga, a.bayar, a.diskon, a.n_diskon, a.pembayaran_id, a.status, c.nama, c.foto as fotos, c.ktp, c.npwp, c.kk, a.hptd');
        $this->db->from('kios a');
        $this->db->join('blok b', 'b.id = a.blok_id');
        $this->db->join('pedagang c', 'c.id = a.pedagang_id');
        $this->db->where('a.id', $id);
        return $this->db->get()->row_array();
    }

    public function getKiosAll()
    {
        $this->db->select('a.id, a.blok_id, a.foto , b.blok, a.nomor, b.type, b.ukuran, a.lantai, a.harga, a.bayar, a.diskon, a.n_diskon, a.pembayaran_id, a.status, c.nama, c.foto as fotos, c.ktp, c.npwp, c.kk, a.hptd');
        $this->db->from('kios a');
        $this->db->join('blok b', 'b.id = a.blok_id');
        $this->db->join('pedagang c', 'c.id = a.pedagang_id');
        return $this->db->get()->result_array();
    }

    public function phn()
    {
        $this->db->set('hptd', $this->input->post('phn'));
        $this->db->where('id', $this->input->post('id'));

        $this->db->update('kios');

        redirect('hptd');
    }

    public function prev($blok, $nomor)
    {
        return $this->db->query('select id, blok_id from kios where blok_id = ' . $blok . ' and nomor < ' . $nomor . ' order by nomor desc ')->row_array();
    }

    public function next($blok, $nomor)
    {
        return $this->db->query('select id, blok_id from kios where blok_id = ' . $blok . ' and nomor > ' . $nomor . ' ')->row_array();
    }

    public function jual($id, $blok)
    {
        $this->db->set('status', 1);
        $this->db->set('pedagang_id', $this->input->post('pedagang'));
        $this->db->where('id', $id);
        $this->db->update('kios');

        redirect('pasar/detailkios/' . encrypt_url($id) . '/' . encrypt_url($blok));
    }


    public function beliKios($id)
    {
        $this->db->set('status', 1);
        $this->db->set('pedagang_id', $id);
        $this->db->where('id', $this->input->post('kios'));
        $this->db->update('kios');

        redirect('pedagang/detail/' . encrypt_url($id));
    }

    public function bayarKios($id, $blok)
    {
        $get = $this->db->get_where('kios', ['id' => $id])->row_array();
        $lama = $get['bayar'];

        $baru = preg_replace("/[^0-9]/", "", $this->input->post('bayar'));

        // var_dump($baru);
        // die;
        $bayar = $lama + $baru;


        $this->db->set('bayar', $bayar);
        $this->db->where('id', $id);
        $this->db->update('kios');

        redirect('pasar/detailkios/' . encrypt_url($id) . '/' . encrypt_url($blok));
    }

    public function pelunasanKios($id, $blok)
    {
        $this->db->set('pembayaran_id', $this->input->post('pembayaran'));
        $this->db->where('id', $id);
        $this->db->update('kios');

        redirect('pasar/detailkios/' . encrypt_url($id) . '/' . encrypt_url($blok));
    }

    public function diskonKios($id, $blok)
    {
        $diskon = $this->input->post('diskon');
        $n_diskon = preg_replace("/[^0-9]/", "", $this->input->post('n_diskon'));

        $data = [
            'diskon' => $diskon,
            'n_diskon' => $n_diskon,
        ];

        $this->db->where('id', $id);
        $this->db->update('kios', $data);

        redirect('pasar/detailkios/' . encrypt_url($id) . '/' . encrypt_url($blok));
    }

    public function batalBeli($id, $blok)
    {
        $data = [
            'status' => 0,
            'pedagang_id' => 0,
            'gabung' => 0,
            'bayar' => 0,
            'diskon' => 0,
            'n_diskon' => 0,
            'pembayaran_id' => 0,
            'listrik_id' => 1,

        ];

        $this->db->where('id', $id);
        $this->db->update('kios', $data);

        redirect('pasar/detailkios/' . encrypt_url($id) . '/' . encrypt_url($blok));
    }

    public function pagination($number, $offset, $blok)
    {
        $this->db->select('a.id, b.blok, b.ukuran, a.nomor, a.foto, c.nama, a.harga, a.status, a.blok_id, a.lantai');
        $this->db->join('blok b', 'b.id=a.blok_id');
        $this->db->join('pedagang c', 'c.id = a.pedagang_id');
        $this->db->where('blok_id', $blok);
        return $this->db->get('kios a', $number, $offset)->result_array();
    }
}
