<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requests_model extends CI_Model
{

	public function create()
	{
		$data = array(
			'userid' => $this->input->post('userid'),
			'id_cont' => $this->input->post('cont_id'),
			// 'specify' => $this->input->post('contact'),
			'reason' => $this->input->post('reason'),
		);
		$this->db->insert('request', $data);
	}

	public function read()
	{
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('user', 'request.userid = user.userid');
		$this->db->join('contact', 'request.id_cont = contact.cont_id');
		$query = $this->db->get();
		return $query->result();
	}
	/*
	public function readdataby($id)
	{
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('user', 'request.userid = user.userid');
		$this->db->join('contact', 'request.id_cont = contact.cont_id');
		$query = $this->db->get();
		return $query->result();
	}*/

	public function readby($id)
	{
		$this->db->where('userid', $id);
		$query = $this->db->get('request');
		return $query->result();
	}

	public function readby1($id)
	{
		$this->db->where('req_id', $id);
		$query = $this->db->get('request');
		return $query->row();;
	}

	public function readtype($type)
	{
		$this->db->where('type', $type);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function readtype1($type)
	{
		if ($type == '') {
			$query = $this->db->get('contact');
			return $query->result();
		} else {
			$this->db->where('type', $type);
			$query = $this->db->get('contact');
			return $query->result();
		}
	}

	public function sendmail($id)
	{
		$this->db->set('sendmail', '1');
		$this->db->where('req_id', $id);
		$this->db->update('request');
	}

	public function responsacc($id)
	{
		$this->db->set('respons', '1');
		$this->db->set('req_status', 'Accepted');
		$this->db->set('req_result', $this->input->post('message'));
		$this->db->where('req_id', $id);
		$this->db->update('request');
	}

	public function responsdec($id)
	{
		$this->db->set('respons', '1');
		$this->db->set('req_status', 'Rejected');
		$this->db->set('req_result', 'Please Try Again Later! Your request was rejected');
		$this->db->where('req_id', $id);
		$this->db->update('request');
	}

	public function delete($id)
	{
		$this->db->where('req_id', $id);
		$this->db->delete('request');
	}
}
