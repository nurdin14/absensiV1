<?php

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_absen');
    }
    public function index()
    {
        $data = [
            'tampilDatang' => $this->M_absen->tampilDatang()->result_array(),
            'tampilPulang' => $this->M_absen->tampilPulang()->result_array(),
            'tampilKerja' => $this->M_absen->tampilKerja()->result_array(),
            'tampilTabsen' => $this->M_absen->tampilTabsen()->result_array(),
            'tampilAll' => $this->M_absen->tampilAll()->result_array(),
        ];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
    }
}