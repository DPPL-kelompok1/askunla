<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacts_model extends CI_Model
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
			'prodi' => $this->input->post('prodi'),
            'fakultas' => $this->input->post('fakultas'),
            'whatsapp' => $this->input->post('whatsapp')
		);
		$this->db->insert('contact', $data);
	}

	public function read()
	{
		$query = $this->db->get('contact');
		return $query->result();
	}
	public function readtype($type)
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
	public function read_by($id)
	{
		$this->db->where('cont_id', $id);
		$query = $this->db->get('contact');
		return $query->row();
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
			'prodi' => $this->input->post('prodi'),
            'fakultas' => $this->input->post('fakultas'),
            'whatsapp' => $this->input->post('whatsapp')
		);
		$this->db->where('cont_id', $id);
		$this->db->update('contact', $data);
	}

	public function delete($id)
	{
		$this->db->where('cont_id', $id);
		$this->db->delete('contact');
	}
}
