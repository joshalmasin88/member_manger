<?php

defined('BASEPATH') OR exit('No direct script access');

class AccountModel extends CI_Model
{
	public function createUser()
	{
		$memberDetails = array(
			'fname' => $this->input->post('fname', TRUE),
			'paydue' => $this->input->post('paydue', TRUE),
			'plan' => $this->input->post('plan', TRUE),
			'status' => $this->input->post('status', TRUE)
		);

		$this->db->insert('members', $memberDetails);

		if($this->db->affected_rows() > 0)
		{
			return true;
		} else {
			return false;
		}
	}

	public function displayAll()
	{
		$query = $this->db->get('members');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else
		{
			return false;
		}
	}

	public function getById($id)
	{
		$this->db->where('member_id',$id);
		$query = $this->db->get('members');
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function updateUser()
	{
		$id = $this->input->post('id');
		$memberDetails = array(
			'fname' => $this->input->post('fname', TRUE),
			'paydue' => $this->input->post('paydue', TRUE),
			'plan' => $this->input->post('plan', TRUE),
			'status' => $this->input->post('status', TRUE)
		);

		$this->db->where('member_id', $id);
		$this->db->update('members', $memberDetails);

		if ($this->db->affected_rows() > 0)
		{
			return true;
		}
		else {
			return false;
		}
	}

	public function deleteuser($id)
	{
		$this->db->where('member_id', $id);
		$this->db->delete('members');
		if ($this->db->affected_rows() > 0)
		{
			return true;
		}
		else {
			return false;
		}
	}
}
