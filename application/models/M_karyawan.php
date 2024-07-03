<?php
class M_karyawan extends CI_Model {

    function tampilKaryawan(){
        return $this->db->get('tb_karyawan');
    }

    function addKaryawan($data){
        $this->db->insert('tb_karyawan', $data);
    }

    function get_karyawan($where) {
        return $this->db->get_where('tb_karyawan', $where);
    }
    
    function updateKaryawan($id, $data) {
        $this->db->where('id_karyawan', $id);
        return $this->db->update('tb_karyawan', $data);
    }

    function deleteKaryawan($where) {
        $this->db->delete('tb_karyawan', $where);
    }
}
