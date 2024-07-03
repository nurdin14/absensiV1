<?php

class M_absen extends CI_Model {

    public function tampilAbsen()
    {
        return $this->db->get('tb_absen');
    }

    function addAbsen($data) 
    {
        $this->db->insert('tb_absen', $data);
    }

    function get_absen($where) {
        return $this->db->get_where('tb_absen', $where);
    }

    function updateAbsen($id, $data)
    {
        $this->db->where('id_absen', $id);
        return $this->db->update('tb_absen', $data);
    }

    function deleteAbsen($where)
    {
        $this->db->delete('tb_absen', $where);
    }

    //laporan 
    public function tampilDatang()
    {
        return $this->db->get("tabel_masuk_cepat");
    }

    public function tampilPulang()
    {
        return $this->db->get('tabel_pulang_cepat');
    }

    public function tampilKerja()
    {
        return $this->db->get('tabel_lama_kerja');
    }
    public function tampilAll()
    {
        return $this->db->get('tabel_hasil_query');
    }

    public function tampilTabsen()
    {
        return $this->db->query('SELECT * FROM `tabel_hasil_query` WHERE masuk IS NULL AND keluar IS NULL;');
    }
}