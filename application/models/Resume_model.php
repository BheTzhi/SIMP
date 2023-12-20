<?php

class Resume_model extends CI_Model
{
    public function getJenis()
    {
    }

    public function getTahunAir()
    {
        $option = '';

        $this->db->select('RIGHT(bulantahun, 4) as tahun');
        $this->db->group_by('RIGHT(bulantahun, 4)');
        $tahun = $this->db->get('wmeter')->result_array();

        if ($tahun) {
            $option .=  '<option value="">- Pilih -</option>';
            foreach ($tahun as $key) :
                $option .=  '<option value="' . $key['tahun'] . '">' . $key['tahun'] . '</option>';
            endforeach;
        } else {
            $option .= '<option>Kosong</option>';
        }

        return json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function getTahunListrik()
    {
        $option = '';

        $this->db->select('RIGHT(bulantahun, 4) as tahun');
        $this->db->group_by('RIGHT(bulantahun, 4)');
        $tahun = $this->db->get('kwhbulan')->result_array();

        if ($tahun) {
            $option .=  '<option value="">- Pilih -</option>';
            foreach ($tahun as $key) :
                $option .=  '<option value="' . $key['tahun'] . '">' . $key['tahun'] . '</option>';
            endforeach;
        } else {
            $option .= '<option>Kosong</option>';
        }

        return json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function getBulanAir($tahun)
    {
        $option = '';

        $this->db->select('bulantahun as id');
        $this->db->where('RIGHT(bulantahun, 4) =', $tahun);
        $result = $this->db->get('wmeter')->result_array();

        foreach ($result as $res) {
            $data[] = substr($res['id'], 0, -4);
        }

        $this->db->where_in('id', $data);
        $hasil = $this->db->get('bulan')->result_array();

        if ($hasil) {
            foreach ($hasil as $key) :
                $option .=  '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
            endforeach;
        } else {
            $option .= '<option value=""> Kosong </option>';
        }

        return json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function getBulanListrik($tahun)
    {
        $option = '';

        $this->db->select('bulantahun as id');
        $this->db->where('RIGHT(bulantahun, 4) =', $tahun);
        $result = $this->db->get('kwhbulan')->result_array();

        foreach ($result as $res) {
            $data[] = substr($res['id'], 0, -4);
        }

        $this->db->where_in('id', $data);
        $hasil = $this->db->get('bulan')->result_array();

        if ($hasil) {
            foreach ($hasil as $key) :
                $option .=  '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
            endforeach;
        } else {
            $option .= '<option value=""> Kosong </option>';
        }

        return json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function contoh()
    {
        $option = '';

        $this->db->select('bulantahun as id');
        $this->db->where('kios_id', $_POST['id']);
        $this->db->where('RIGHT(bulantahun, 4) = ', $_POST['tahun']);
        $abc = $this->db->get('kwhbulan')->result_array();
        if ($abc) {
            foreach ($abc as $a) :
                $datas[] = substr($a['id'], 0, -4);
            endforeach;

            $this->db->where_not_in('id', $datas);
            $data = $this->db->get('bulan')->result_array();

            if ($data) {
                foreach ($data as $key) {
                    $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
                }
            } else {
                $option .= '<option>Kosong</option>';
            }
        } else {
            $bulan = $this->db->get('bulan')->result_array();
            foreach ($bulan as $key) {
                $option .= '<option value="' . $key['id'] . '">' . $key['bulan'] . '</option>';
            }
        }

        echo json_encode(['status' => 'ok', 'html' => $option]);
    }


    public function getAllKiosByBulan($data, $jenis)
    {
        if ($jenis == 'listrik') :

            $select = 'a.kios_id, d.nama, c.blok, b.nomor, b.lantai, b.blok_id, a.blalu, a.bini, a.pemakaian,';
            $select .= 'e.daya, e.pkwh, e.harga, a.beban, a.status, a.awal, a.akhir, a.bulantahun, b.blok_id,';
            $select .= 'a.kblalu, a.kbbl, a.foto';

            $this->db->select($select);
            $this->db->from('kwhbulan a');
            $this->db->join('kios b', 'b.id=a.kios_id');
            $this->db->join('blok c', 'c.id=b.blok_id');
            $this->db->join('pedagang d', 'd.id=b.pedagang_id');
            $this->db->join('listrik e', 'e.id=b.listrik_id');
            $this->db->where('a.bulantahun', $data);

        elseif ($jenis == 'air') :

            $select = 'a.kios_id, d.nama, c.blok, b.nomor, b.lantai,';
            $select .= 'a.blalu, a.bini, a.awal, a.akhir, a.pemakaian, a.status, a.bulantahun, b.blok_id,';
            $select .= 'a.kblalu, a.kbbl';

            $this->db->select($select);
            $this->db->from('wmeter a');
            $this->db->join('kios b', 'b.id=a.kios_id');
            $this->db->join('blok c', 'c.id=b.blok_id');
            $this->db->join('pedagang d', 'd.id = b.pedagang_id');
            $this->db->where('a.bulantahun', $data);

        endif;

        return $this->db->get()->result_array();
    }
}
