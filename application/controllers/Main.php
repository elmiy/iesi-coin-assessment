<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model', 'main');
	}

	public function index()
	{
		$data['title'] = 'Assessment Form';
		$data['assessment'] = $this->main->getAssessment();

		$data['teacher'] = $this->db->get('user')->result_array();
		$data['subject'] = $this->db->get('subjects')->result_array();
		$data['coin'] = $this->db->get('coins')->result_array();
		$data['class'] = $this->db->get('classes')->result_array();

		$this->form_validation->set_rules('user_id', 'Teacher', 'required');
		$this->form_validation->set_rules('subject_id', 'Subject', 'required');
		$this->form_validation->set_rules('coin_id', 'Coin', 'required');
		$this->form_validation->set_rules('class_id', 'Class', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('main/index', $data);		
		}

		else{
			$data =[
				'user_id' => $this->input->post('user_id'),
				'subject_id' => $this->input->post('subject_id'),
				'coin_id' => $this->input->post('coin_id'),
				'class_id' => $this->input->post('class_id')
			];
			$this->db->insert('assessment', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New Assessment added! </div>');
			redirect('main/index');
		}
	}
}