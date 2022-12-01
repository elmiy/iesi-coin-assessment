<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tables extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('table_model', 'table');
	}

	// CONTROLLER SUBJECT

	public function subject()
	{
		$data['title'] = 'Subject';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['subject'] = $this->db->get('subjects')->result_array();

		$this->form_validation->set_rules('subject', 'Subject', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('tables/subject', $data);
			$this->load->view('templates/footer');
		}

		else{
			$this->db->insert('subjects', ['subject' => $this->input->post('subject')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New subject added! </div>');
			redirect('tables/subject');
		}		
	}

	public function subject_edit($id)
    {
        $data['title'] = 'Edit Subject';
        $data['subject'] = $this->db->get_where('subjects', ['id' => $id])->row();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tables/subject-edit', $data);
        $this->load->view('templates/footer');
    }

    public function subject_update()
    {
        $id = $this->input->post('id');
        $subject = $this->input->post('subject');
        

        $data = array(
                'subject' => $subject
                
        );
        //yang ini, tinggal ganti nama tabelnya aja
        $where = ['id' => $id];
        $this->table->update_data($data,'subjects',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your subject has been updated!</div>');
        redirect('tables/subject');
    }

    public function subject_delete($id)
    {
        $check_data = $this->table->countTeaching(['subject_id' => $id]);
        if($check_data > 0){
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Delete the teaching distribution first to delete this subject</div>');
            redirect('tables/subject');
        }else{
            $where = ['id' => $id];
            $this->table->delete_data('subjects',$where);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Subject has been delete!</div>');
        redirect('tables/subject');
    }

	

    //CONTROLLER TEACHING DISTRIBUTION

	public function teaching()
	{
		$data['title'] = 'Teaching Distribution';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Table_model', 'table');

		$data['teaching'] = $this->table->getTeaching();
		$data['name'] = $this->db->get('user')->result_array();
		$data['subject'] = $this->db->get('subjects')->result_array();

		$this->form_validation->set_rules('user_id', 'Teacher', 'required');
		$this->form_validation->set_rules('subject_id', 'Subject', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('tables/teaching', $data);
			$this->load->view('templates/footer');		
		}

		else{
			$data =[
				'user_id' => $this->input->post('user_id'),
				'subject_id' => $this->input->post('subject_id')
			];
			$this->db->insert('teaching_distribution', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New teaching distribution added! </div>');
			redirect('tables/teaching');
		}
	}

	public function teaching_edit($id)
    {
        $where = ['teaching_distribution.id' => $id];
        $data_teaching = $this->table->getOneTeachingWhere($where);
        $data['title'] = 'Edit Teaching Distribution';
        $data['teaching_distribution'] = $data_teaching;

        $data['subject'] = $this->db->get('subjects')->result_array();
        $data['name'] = $this->db->get('user')->result_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tables/teaching-edit', $data);
        $this->load->view('templates/footer');
    }

    public function teaching_update()
    {
        $id = $this->input->post('id');
        $user_id = $this->input->post('user_id');
        $subject_id = $this->input->post('subject_id');

        $data = array(
                'user_id' => $user_id,
                'subject_id' => $subject_id,
         );
         //yang ini, tinggal ganti nama tabelnya aja
         $where = ['id' => $id];
        $this->table->update_data($data,'teaching_distribution',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your teaching distribution has been updated!</div>');
        redirect('tables/teaching');
    }

    public function teaching_delete($id)
    {
        $where = ['id' => $id];
        $this->table->delete_data('teaching_distribution',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your teaching distribution has been delete!</div>');
        redirect('tables/teaching');
    }

	// CONTROLLER COIN

	public function coin()
	{
		$data['title'] = 'Coin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['coin'] = $this->db->get('coins')->result_array();

		$this->form_validation->set_rules('coin', 'Coin', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('tables/coin', $data);
			$this->load->view('templates/footer');
		}

		else{
			$data =[
				'coin' => $this->input->post('coin'),
				'explanation' => $this->input->post('explanation')
			];
			$this->db->insert('coins', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New coin added! </div>');
			redirect('tables/coin');
		}		
	}

	public function coin_edit($id)
    {
        $data['title'] = 'Edit Coin';
        $data['coin'] = $this->db->get_where('coins',  ['id' => $id])->row();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tables/coin-edit', $data);
        $this->load->view('templates/footer');
    }

    public function coin_update()
    {
        $id = $this->input->post('id');
        $coin = $this->input->post('coin');
        $explanation = $this->input->post('explanation'); 
        

        $data = array(
            'coin' => $coin,
            'explanation' => $explanation
                
         );
         //yang ini, tinggal ganti nama tabelnya aja
        $where = ['id' => $id];
        $this->table->update_data($data,'coins',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your coin has been update!</div>');
        redirect('tables/coin');
    }

	 public function deleteCoin($id)
    {
        $where = ['id' => $id];
        $this->table->delete_data('coins',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your coin has been delete!</div>');
        redirect('tables/coin');
    }

	// CONTROLLER CLASS

	public function classes()
	{
		$data['title'] = 'Class';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['classes'] = $this->db->get('classes')->result_array();

		$this->form_validation->set_rules('class', 'Class', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('tables/classes', $data);
			$this->load->view('templates/footer');
		}

		else{
			$this->db->insert('classes', ['class' => $this->input->post('class')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New class added! </div>');
			redirect('tables/classes');
		}		
	}

	public function classes_edit($id)
    {
        $data['title'] = 'Edit Class';
        $data['classes'] = $this->db->get_where('classes',  ['id' => $id])->row();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tables/classes-edit', $data);
        $this->load->view('templates/footer');
    }

    public function classes_update()
    {
        $id = $this->input->post('id');
        $class = $this->input->post('class'); 
        

        $data = array(
            'class' => $class
                
         );
         //yang ini, tinggal ganti nama tabelnya aja
        $where = ['id' => $id];
        $this->table->update_data($data,'classes',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your class has been update!</div>');
        redirect('tables/classes');
    }

	 public function deleteClasses($id)
    {
        $where = ['id' => $id];
        $this->table->delete_data('classes',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your class has been delete!</div>');
        redirect('tables/classes');
    }

	


}