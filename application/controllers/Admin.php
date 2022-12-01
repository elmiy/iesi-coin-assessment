<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'admin');
		$this->load->library('Pdf');
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
		}

		else{
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> New role added! </div>');
			redirect('admin/role');
		}
	}


	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role',['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);

		$data['menu'] = $this->db->get('user_menu')->result_array();

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		}
		else{
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function role_edit($id)
    {
        $data['title'] = 'Edit Role';
        $data['role'] = $this->db->get_where('user_role',  ['id' => $id])->row();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-edit', $data);
        $this->load->view('templates/footer');
    }

    public function role_update()
    {
        $id = $this->input->post('id');
        $role = $this->input->post('role');
        

        $data = array(
                'role' => $role
                
         );
         //yang ini, tinggal ganti nama tabelnya aja
         $where = ['id' => $id];
        $this->admin->update_role($data,'user_role',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your role has been update!</div>');
        redirect('admin/role');
    }

	 public function deleteRole($id)
    {
        $where = ['id' => $id];
        $this->admin->delete_data('user_role',$where);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your role has been delete!</div>');
        redirect('admin/role');
    }

    public function teacherResult()
	{
		$data['title'] = 'Teacher Result';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Admin_model', 'admin');

		$data['assessment'] = $this->admin->getAssessment();
		$data['teacher'] = $this->db->get('user')->result_array();
		$data['subject'] = $this->db->get('subjects')->result_array();
		$data['coin'] = $this->db->get('coins')->result_array();
		$data['class'] = $this->db->get('classes')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/teacher-result', $data);
		$this->load->view('templates/footer', $data);		
	}

	public function teacherReport()
    {
    	$this->load->model('admin_model', 'admin');
        $data['assessment'] = $this->admin->get_result();
        
        $data['assessment'] = $this->admin->getassessment();
        $data['teacher'] = $this->db->get('user')->result_array();
		$data['subject'] = $this->db->get('subjects')->result_array();
		$data['coin'] = $this->db->get('coins')->result_array();
		$data['class'] = $this->db->get('classes')->result_array();

        $this->load->view('admin/print-teacher-report', $data);
    }  

public function cari(){	
			redirect(base_url().'admin/teacherresult/'.$this->input->post('user_id').'/'.$this->input->post('class_id').'/'.$this->input->post('coin_id')); // /.
		}

}