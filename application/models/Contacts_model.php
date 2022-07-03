<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacts_model extends CI_Model
{

	public function create()
	{
		$data = array(
			'cont_nama' => $this->input->post('cont_nama'),
			'cont_type' => $this->input->post('cont_type'),
			'cont_jobdesk' => $this->input->post('cont_jobdesk'),
			'cont_prodi' => $this->input->post('cont_prodi'),
			'cont_fakultas' => $this->input->post('cont_fakultas'),
			'cont_telp1' => $this->input->post('cont_telp1'),
			'cont_telp2' => $this->input->post('cont_telp2'),
			'cont_fax' => $this->input->post('cont_fax'),
			'cont_email' => $this->input->post('cont_email'),
			'cont_wa' => $this->input->post('cont_wa'),
			'cont_sosmed' => $this->input->post('cont_sosmed')
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
			'cont_nama' => $this->input->post('cont_nama'),
			'cont_type' => $this->input->post('cont_type'),
			'cont_jobdesk' => $this->input->post('cont_jobdesk'),
			'cont_prodi' => $this->input->post('cont_prodi'),
			'cont_fakultas' => $this->input->post('cont_fakultas'),
			'cont_telp1' => $this->input->post('cont_telp1'),
			'cont_telp2' => $this->input->post('cont_telp2'),
			'cont_fax' => $this->input->post('cont_fax'),
			'cont_email' => $this->input->post('cont_email'),
			'cont_wa' => $this->input->post('cont_wa'),
			'cont_sosmed' => $this->input->post('cont_sosmed')
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
