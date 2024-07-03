<?php

class Karyawan extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
    }

    function fetch_karyawan()
    {
        $data = $this->M_karyawan->tampilKaryawan()->result_array();

        // Buat nomor urut
        $result = array();
        $no = 1;
        foreach ($data as $key => $value) {
            $value['No'] = $no++;
            $value['Nik'] = $value['nik'];
            $value['NamaKaryawan'] = $value['nama'];
            $value['JenisKelamin'] = $value['jk'];
            $value['TanggalLahir'] = $value['tgl_lahir'];
            $value['Dept'] = $value['dept'];
            $value['Action'] = '<button class="btn btn-warning" onclick="editKaryawan(' . $value['id_karyawan'] . ')">Edit</button> <button class="btn btn-danger" onclick="deleteKaryawan(' . $value['id_karyawan'] . ')">Delete</button>';
            $result[] = $value;
        }

        echo json_encode(array("data" => $result));
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/v_tampil');
    }

    public function add() 
    {
        $data = [
            'id_karyawan' => $this->input->post('id_karyawan'),
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'dept' => $this->input->post('dept'),
        ];

        $this->M_karyawan->addKaryawan($data);
        echo json_encode(array("status" => TRUE));
    }

    public function editKaryawan($id)
    {
        $where = ['id_karyawan' => $id]; 
        $data = $this->M_karyawan->get_karyawan($where)->row_array();
        echo json_encode($data);
    }

    public function updateKaryawan() 
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'dept' => $this->input->post('dept'),
        ];

        $this->M_karyawan->updateKaryawan($this->input->post('id_karyawan'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function deleteKaryawan($id)
    {
        $where = ['id_karyawan' => $id];
        $this->M_karyawan->deleteKaryawan($where);
        echo json_encode(array("status" => TRUE));
    }
}