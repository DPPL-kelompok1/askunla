<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requests extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) redirect('auth/login');
		$this->load->model('Requests_model');
		$this->load->model('Contacts_model');
		$this->load->model('Users_model');
	}

	public function index()
	{
		$data['requests'] = $this->Requests_model->read();
		$this->load->view('requests/request_list', $data);
	}

	public function history($id)
	{
		$data['requests'] = $this->Requests_model->readby($id);
		$this->load->view('requests/request_list', $data);
	}
	public function add($id)
	{
		if ($this->input->post('submit')) {
			$this->Requests_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">New Request successfully added ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:310px; padding:10px; margin: auto">Your request is failed ! </p>');
			}
			redirect('requests/cont_privt');
		}
		$data['contacts'] = $this->Contacts_model->read_by($id);
		$this->load->view('requests/request_form', $data);
	}
	public function responsacc($id)
	{

		$var = $this->Requests_model->readby1($id);
		if ($var->sendmail == '0') {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:310px; padding:10px; margin: auto"> Please Send Mail First ! </p>');
			redirect('requests');
		} else {
			if ($this->input->post('submit')) {
				$this->Requests_model->responsacc($id);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:300px; padding:10px; margin: auto"> Response Accepted ! </p>');
				} else {
					$this->session->set_flashdata('msg', '<p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:300px; padding:10px; margin: auto"> Response Rejected ! </p>');
				}
				redirect('requests');
			}
			$prev['cont'] = $this->Contacts_model->read_by($var->id_cont);
			$prev['req'] = $this->Requests_model->readby1($var->req_id);
			$this->load->view('requests/previewreq_form', $prev);
		}
	}
	public function responsdec($id)
	{
		$var = $this->Requests_model->readby1($id);
		if ($var->sendmail == '0') {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:310px; padding:10px; margin: auto">Please Send Mail First ! </p>');
			redirect('requests');
		} else {
			$this->Requests_model->responsdec($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:300px; padding:10px; margin: auto"> Response Rejected ! </p>');
			}
			redirect('requests');
		}
	}
	public function sendmailprivate($id)
	{
		if ($this->input->post('submit')) {
			$this->sendmail();
			$this->Requests_model->sendmail($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:310px; padding:10px; margin: auto"> Your Mail is Sent ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:310px; padding:10px; margin: auto"> Your Mail is Fail ! </p>');
			}

			redirect('requests');
		}

		$var = $this->Requests_model->readby1($id);
		$quest['cont'] = $this->Contacts_model->read_by($var->id_cont);
		$quest['usr'] = $this->Users_model->read_by($var->userid);
		$quest['req'] = $this->Requests_model->readby1($var->req_id);
		$this->load->view('requests/sendmail_form', $quest);
	}
	public function sendmail()
	{
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_user' => 'pwftubes21@gmail.com',  // Email gmail
			'smtp_pass'   => 'PWFTubes2021',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'newline' => "\r\n"
		];

		$this->email->initialize($config);
		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('pwftubes21@gmail.com', 'Askunla.com');

		// Email penerima
		$this->email->to($this->input->post('address')); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
		//$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject($this->input->post('subject'));

		// Isi email
		$msg = $this->input->post('message');
		$this->email->message("Dear Mr./Mrs.,<br>A Student from Langlangbuana University named $msg <br>Please, reply this email with
		your confirmation YES/NO!<br>Thank You for Attention, Have a nice day!");

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			echo $this->email->send();
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function cont_general()
	{
		$list['gencont'] = $this->Contacts_model->readtype('General');
		$this->load->view('requests/generalcont_list', $list);
	}

	public function cont_privt()
	{
		$list['privcont'] = $this->Contacts_model->readtype('Private');
		$this->load->view('requests/privcont_list', $list);
	}
	public function delete($id)
	{
		$this->requests_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			redirect('requests');
		}
	}
}
