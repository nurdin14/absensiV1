<?php

class Absen extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_absen');
        $this->load->model('M_karyawan');
    }

    function fetch_absen()
    {
        $data = $this->M_absen->tampilAbsen()->result_array();

        // Buat nomor urut
        $result = array();
        $no = 1;
        foreach ($data as $key => $value) {
            $value['No'] = $no++;
            $value['Nik'] = $value['nik'];
            $value['Masuk'] = $value['masuk'];
            $value['Keluar'] = $value['keluar'];
            $value['Action'] = '<button class="btn btn-warning" onclick="editAbsen(' . $value['id_absen'] . ')">Edit</button> <button class="btn btn-danger" onclick="deleteAbsen(' . $value['id_absen'] . ')">Delete</button>';
            $result[] = $value;
        }

        echo json_encode(array("data" => $result));
    }

    public function index()
    {
        $data ['data'] = $this->M_karyawan->tampilKaryawan()->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('absen/v_tampil', $data);
    }

    public function add() 
    {
        $data = [
            'id_absen' => $this->input->post('id_absen'),
            'nik' => $this->input->post('nik'),
            'masuk' => $this->input->post('masuk'),
            'keluar' => $this->input->post('keluar')
        ];

        $this->M_absen->addAbsen($data);
        echo json_encode(array("status" => TRUE));
    }

    public function editAbsensi($id)
    {
        $where = ['id_absen' => $id]; 
        $data = $this->M_absen->get_absen($where)->row_array();
        echo json_encode($data);
    }

    public function update() 
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'masuk' => $this->input->post('masuk'),
            'keluar' => $this->input->post('keluar')
        ];

        $this->M_absen->updateAbsen($this->input->post('id_absen'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function deleteAbsen($id)
    {
        $where = ['id_absen' => $id];
        $this->M_absen->deleteAbsen($where);
        echo json_encode(array("status" => TRUE));
    }
}