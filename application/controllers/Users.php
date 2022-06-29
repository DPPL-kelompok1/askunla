<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \Mailjet\Resources;


class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$type = 'mahasiswa';
		$data['user'] = $this->Users_model->read_type($type);
		$this->load->view('users/user_list', $data);
	}

	public function add()
	{
		if ($this->input->post('submit')) {
			$this->Users_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User successfully added ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> User Add failed ! </p>');
			}

			redirect('users');
		}
		$this->load->view('users/user_form');
	}

	public function edit($id)
	{
		if ($this->input->post('submit')) {
			$this->Users_model->update($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> Congratulation your data successfully updated ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> User update failed ! </p>');
			}
			redirect('users');
		}
		$data['user'] = $this->Users_model->read_by($id);
		$this->load->view('users/edit_form', $data);
	}

	public function delete($id)
	{
		$this->Users_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User successfully Deleted ! </p>');
		} else {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User Delete failed ! </p>');
		}
		redirect('users');
	}
	public function verify($id)
	{
		$this->Users_model->updateverify($id);
		$this->sendmail($id);
		$this->Users_model->encrypt($id);
		$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:600px; padding:10px; margin: auto">You have successfully verified one of the users ! </p>');
		redirect('users');
	}
	private function sendmail($id)
	{
		 // Konfigurasi email
		 $this->load->model('Users_model');
		 $var = $this->Users_model->read_by($id);
 
		 $mj = new \Mailjet\Client('eeff72d050b4d364080d6a1b4b4dda20','0fdd4209c29a0915863eb2f9efb8ee9b',true,['version' => 'v3.1']);
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
			 'Subject' => "Verifikasi Akun",
			 'TextPart' => "My first Mailjet email",
			 'HTMLPart' => "Dear $var->fullname,<br>This is your new password : $var->password<br> Do not tell anyone your password, for the security of your account.<br>Thank You.",
			 'CustomID' => "AppGettingStartedTest"
			 ]
		 ]
		 ];
		 $response = $mj->post(Resources::$Email, ['body' => $body]);
		 $response->success() && var_dump($response->getData());
	}
}
