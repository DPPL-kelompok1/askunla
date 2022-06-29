<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public function create()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'type' => $this->input->post('type'),
			'fullname' => $this->input->post('fullname'),
			'no_identitas' => $this->input->post('no_identitas'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tmpt_tgl_lahir' => $this->input->post('tmpt_tgl_lahir'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
		);
		$this->db->insert('user', $data);
	}

	public function read()
	{
		$query = $this->db->get('user');
		return $query->result();
	}

	public function read_by($id)
	{
		$this->db->where('userid', $id);
		$query = $this->db->get('user');
		return $query->row();
	}

	public function read_type($type)
	{
		$this->db->where('type', $type);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function encrypt($id)
	{
		$data = $this->read_by($id);
		$this->db->where('userid', $id);
		$this->db->set('password', password_hash($data->password, PASSWORD_DEFAULT));
		$this->db->update('user');
	}
	public function update($id)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'type' => $this->input->post('type'),
			'fullname' => $this->input->post('fullname'),
			'no_identitas' => $this->input->post('no_identitas'),
			'alamat' => $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tmpt_tgl_lahir' => $this->input->post('tmpt_tgl_lahir'),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
		);
		$this->db->where('userid', $id);
		$this->db->update('user', $data);
	}

	public function delete($id)
	{
		$this->db->where('userid', $id);
		$this->db->delete('user');
	}

	public function register()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
		);
		$this->db->insert('user', $data);
	}
	public function updateverify($id)
	{
		$this->db->set('verifikasi', '1');
		$this->db->where('userid', $id);
		$this->db->update('user');
	}
}
