<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacts extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contacts_model');
	}

	public function index()
	{
		$data['contacts'] = $this->Contacts_model->read();
		$this->load->view('contacts/contact_list', $data);
	}
	public function reader()
	{
		if ($this->input->post('sorting')) {
			$data['contacts'] = $this->Contacts_model->readtype($this->input->post('type'));
			$this->load->view('contacts/contact_list', $data);
		}
	}
	public function add()
	{
		if ($this->input->post('submit')) {
			$this->Contacts_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:380px; padding:10px; margin: auto">Contact successfully added ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:330px; padding:10px; margin: auto">Add Contact failed ! </p>');
			}

			redirect('contacts');
		}
		$this->load->view('contacts/contact_form');
	}
	public function edit($id)
	{
		if ($this->input->post('submit')) {
			$this->Contacts_model->update($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:380px; padding:10px; margin: auto"> Contact successfully updated ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:340px; padding:10px; margin: auto">Contact Update failed ! </p>');
			}
			redirect('contacts');
		}
		$data['contact'] = $this->Contacts_model->read_by($id);
		$this->load->view('contacts/contact_form', $data);
	}

	public function delete($id)
	{
		$this->Contacts_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:320px; padding:10px; margin: auto">Contact Deleted ! </p>');
		} else {
			$this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:350px; padding:10px; margin: auto">Contact Delete failed ! </p>');
			}
			redirect('contacts');
		}
	}

