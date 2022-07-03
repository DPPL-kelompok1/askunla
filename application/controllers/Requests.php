<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';
use \Mailjet\Resources;


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
			$this->sendmail($id);
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

	public function sendmail($id)
	{
		// Konfigurasi email
		$this->load->model('Users_model');
        $var = $this->Users_model->read_by($id);

		$mj = new \Mailjet\Client('eeff72d050b4d364080d6a1b4b4dda20','0fdd4209c29a0915863eb2f9efb8ee9b',true,['version' => 'v3.1']);
		$msg = $this->input->post('Messages');
		$body = [
		'Messages' => [
			[
			'From' => [
				'Email' => "pwftubes21@gmail.com",
				'Name' => "ASKUNLA"
			],
			'To' => [
				[
				'Email' => $var->email,
				'Name' => $var->username
				]
			],
			
			'Subject' => "Confirm For Request",
			'TextPart' => "My first Mailjet email",
			'HTMLPart' => "Dear Mr./Mrs., <br>A student from Langlangbuana University named $msg <br>Please, reply this email with your
			Confirmation YES/NO!<br>Thank You for Attention, Have a nice day!",
			'CustomID' => "AppGettingStartedTest"
			]
		]
		];
		$response = $mj->post(Resources::$Email, ['body' => $body]);
		$response->success() && var_dump($response->getData());
	}

	public function cont_general()
	{
		$list['gencont'] = $this->Users_model->readtype('General');
		$this->load->view('requests/generalcont_list', $list);
	}

	public function cont_privt()
	{
		$list['privcont'] = $this->Contacts_model->read();
		$this->load->view('requests/privcont_list', $list);
	}

	public function reader()
	{
		if ($this->input->post('sorting')) {
			$data['privcont'] = $this->Requests_model->readtype1($this->input->post('type'));
			$this->load->view('requests/privcont_list', $data);
		}
	}

	public function delete($id)
	{
		$this->requests_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			redirect('requests');
		}
	}
}
