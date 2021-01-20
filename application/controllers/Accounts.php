<?php

defined('BASEPATH') OR exit('No direct script access');

class Accounts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AccountModel');
	}

	public function index()
	{
		$data['users'] = $this->AccountModel->displayAll();
		$this->load->view('templates/header');
		$this->load->view('admin/manage', $data);
		$this->load->view('templates/footer');

	}

	public function Manage()
	{
		$data['users'] = $this->AccountModel->displayAll();
		$this->load->view('templates/header');
		$this->load->view('admin/manage', $data);
		$this->load->view('templates/footer');

	}

	public function addmember($id)
	{
		$this->load->view('templates/header');
		$this->load->view('admin/add_account');
		$this->load->view('templates/footer');
	}

	public function updatemem($id)
	{
		$data['user'] = $this->AccountModel->getById($id);
		$this->load->view('templates/header');
		$this->load->view('admin/update', $data);
		$this->load->view('templates/footer');
	}
	public function deletemember($id)
	{
		$this->AccountModel->deleteuser($id);
		$this->session->set_flashdata('success', 'Member Has Been Removed!');
		redirect('accounts/manage');
	}

	public function createMember()
	{
		$this->form_validation->set_rules('fname', 'Full Name', 'required');
		$this->form_validation->set_rules('paydue', 'Payment Due Date', 'required');


		if( $this->form_validation->run() == FALSE )
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('accounts/manage');
		}
		else
		{
			if($this->AccountModel->createUser())
			{
				$this->session->set_flashdata('success', 'New Member Has Been Added');
				redirect('accounts/manage');
			}
			else {
				$this->session->set_flashdata('error', 'A Error Has Occurred! Please Try Again');
				redirect('accounts/manage');
			}
		}
	}

	public function updateMember()
	{

		$this->form_validation->set_rules('fname', 'Full Name', 'required');
		$this->form_validation->set_rules('paydue', 'Payment Due Date', 'required');


		if( $this->form_validation->run() == FALSE )
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('accounts/manage');
		}
		else
		{
			if($this->AccountModel->updateUser())
			{
				$this->session->set_flashdata('success', 'New Member Has Been Updated');
				redirect('accounts/manage');
			}
			else {
				$this->session->set_flashdata('error', 'A Error Has Occurred! Please Try Again');
				redirect('accounts/manage');
			}
		}
	}


}
