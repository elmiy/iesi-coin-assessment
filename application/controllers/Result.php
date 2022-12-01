<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller 
{
	public function __construct()
    {   
        parent::__construct();
        $this->load->library('Pdf');
    }

	public function index()
	{
		$data['title'] = 'Result';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Result_model', 'result');
		$data['assessment'] = $this->result->getAssessment($this->session->userdata('email'));

		$data['teacher'] = $this->db->get('user')->result_array();
		$data['subject'] = $this->db->get('subjects')->result_array();
		$data['coin'] = $this->db->get('coins')->result_array();
		$data['class'] = $this->db->get('classes')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('result/index', $data);
		$this->load->view('templates/footer');		
	}

	public function printResult()
    {
    	$this->load->model('Result_model', 'result');
        $data['assessment'] = $this->result->get_result();
        
        $data['assessment'] = $this->result->getAssessment($this->session->userdata('email'));
        $data['teacher'] = $this->db->get('user')->result_array();
		$data['subject'] = $this->db->get('subjects')->result_array();
		$data['coin'] = $this->db->get('coins')->result_array();
		$data['class'] = $this->db->get('classes')->result_array();

        $this->load->view('result/print-result', $data);
    }   


}