<?php

class Absensi_model extends CI_Model
{
    public function get($bulantahun)
    {
        $this->db->select('b.foto, b.nama, c.role, a.masuk, a.izin, a.sakit, a.alpa');
        $this->db->join('pegawai b', 'b.id = a.pegawai_id');
        $this->db->join('user_role c', 'c.id = b.role_id');
        return $this->db->get_where('absensi a', ['a.bulantahun' => $bulantahun])->result_array();
    }

    public function inputAbsen()
    {
        $id = $this->input->post('pegawai');
        $masuk = $this->input->post('masuk');
        $izin = $this->input->post('izin');
        $sakit = $this->input->post('sakit');
        $alpa = $this->input->post('alpa');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        for ($i = 0; $i < count($id); $i++) :
            $data[$i] = [
                'pegawai_id' => $id[$i],
                'masuk' => $masuk[$i],
                'izin' => $izin[$i],
                'sakit' => $sakit[$i],
                'alpa' => $alpa[$i],
                'bulantahun' => $bulan . $tahun,
            ];
        endfor;

        $this->db->insert_batch('absensi', $data);

        redirect('absensi');
    }

    public function harian()
    {
        $tanggal = date('Y-m-d');
        $this->db->select('b.foto, b.nama, b.nip, c.role, a.masuk, a.pulang, a.keterangan, a.tanggal');
        $this->db->join('pegawai b', 'b.id = a.pegawai_id');
        $this->db->join('user_role c', 'c.id = b.role_id');
        $this->db->where('a.tanggal', $tanggal);
        return $this->db->get('harian a')->result_array();
    }

    public function inpMsk()
    {
        $pegawaiId = $_POST['pegawaiId'];
        $tanggal = date('Y-m-d');
        $jam = date('H:i:s');

        $cekMasuk = $this->db->get_where('harian', ['pegawai_id' => $pegawaiId, 'tanggal' => $tanggal,])->row_array();

        if ($cekMasuk != true) {

            $query = 'INSERT INTO harian (pegawai_id, tanggal, masuk, keterangan) VALUES ("' . $pegawaiId . '","' . $tanggal . '","' . $jam . '", "Masuk")';
            $this->db->query($query);
        }
    }

    public function inpPlg()
    {
        $pegawaiId = $_POST['pegawaiId'];
        $tanggal = date('Y-m-d');
        $jam = date('H:i:s');

        $cekMasuk = $this->db->get_where('harian', ['pegawai_id' => $pegawaiId, 'tanggal' => $tanggal,])->row_array();

        if ($cekMasuk != false) {

            $this->db->set('pulang', $jam);
            $this->db->where('pegawai_id',  $pegawaiId);
            $this->db->where('tanggal',  $tanggal);
            $this->db->update('harian');
        }
    }

    public function bulanan()
    {
        $current = date('d');
        if ($current == 31) {
        }
    }

    private function hitungMinggu()
    {
        $awal = date('Y-m-01');

        $firstDayInMonth = (int) date('N', strtotime($awal));
        $theFirstCustomDay = (7 - $firstDayInMonth + 7) % 7 + 1;
        $lastDayInMonth = (int) date('t', strtotime($awal));

        $customDayDates = [];

        for ($i = $theFirstCustomDay; $i <= $lastDayInMonth; $i = $i + 7) :
            $customDayDates[] = $i;
        endfor;

        return count($customDayDates);
    }

    public function absenBulanan()
    {
        $current = date('d');
        $jam = date('H:i');
        $jmlhari = date('t');

        if ($current == $jmlhari && $jam >= '13:00') {

            $cek = $this->db->get_where('absensi', ['bulantahun' => date('mY')])->num_rows();

            if ($cek < 1) {

                $data['pegawaiz'] = $this->db->get('pegawai')->result_array();

                foreach ($data['pegawaiz'] as $p) {

                    $masuk = $this->masuk($p['id']);

                    $sakit = $this->sakit($p['id']);

                    $izin = $this->izin($p['id']);

                    if ($p['id'] != $masuk['pegawai_id']) :
                        $pegawai_id = $p['id'];
                    else :
                        $pegawai_id = $masuk['pegawai_id'];
                    endif;

                    if ($p['id'] != $sakit['pegawai_id']) :
                        $pegawai_id = $p['id'];
                    else :
                        $pegawai_id = $sakit['pegawai_id'];
                    endif;

                    if ($p['id'] != $izin['pegawai_id']) :
                        $pegawai_id = $p['id'];
                    else :
                        $pegawai_id = $izin['pegawai_id'];
                    endif;

                    $abc[] = [
                        'pegawai_id' => $pegawai_id,
                        'masuk' => $masuk['msk'],
                        'izin' => $izin['izn'],
                        'sakit' => $sakit['skt'],
                        'alpa' => $jmlhari - $masuk['msk'] - $sakit['skt'] - $izin['izn'] - $this->hitungMinggu(),
                        'bulantahun' => date('mY'),
                    ];
                }

                $this->db->insert_batch('absensi', $abc);

                redirect('dashboard');
            } else {

                redirect('dashboard');
            }
        } else {
            redirect('dashboard');
        }
    }

    public function masuk($id)
    {
        $this->db->select('count(a.tanggal) msk, b.nama, a.pegawai_id');
        $this->db->join('pegawai b', 'b.id = a.pegawai_id');
        return $this->db->get_where('harian a', ['a.pegawai_id' => $id, 'a.keterangan' => 'masuk'])->row_array();
    }

    public function izin($id)
    {
        $this->db->select('count(a.tanggal) izn, b.nama, a.pegawai_id');
        $this->db->join('pegawai b', 'b.id = a.pegawai_id');

        return $this->db->get_where('harian a', ['a.pegawai_id' => $id, 'a.keterangan' => 'izin'])->row_array();
    }

    public function sakit($id)
    {
        $this->db->select('count(a.tanggal) skt, b.nama, a.pegawai_id');
        $this->db->join('pegawai b', 'b.id = a.pegawai_id');

        return $this->db->get_where('harian a', ['a.pegawai_id' => $id, 'a.keterangan' => 'sakit'])->row_array();
    }
}
