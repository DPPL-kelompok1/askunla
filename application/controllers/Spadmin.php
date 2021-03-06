<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spadmin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Spadmin_model');
    $this->load->model('Users_model');
  }
  public function index()
  {
    $type = 'administrator';
    $data['user'] = $this->Spadmin_model->readby($type);
    $this->load->view('spadmin/admin_list', $data);
  }

  public function delete($id)
  {
    $this->Spadmin_model->delete($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:380px;; padding:10px; margin: auto">Data successfully Deleted ! </p>');
    } else {
      $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:330px; padding:10px; margin: auto">Data Delete failed ! </p>');
    }
    redirect('spadmin');
  }

  public function add()
  {
    if ($this->input->post('submit')) {
      $this->Spadmin_model->create();
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:380px; padding:10px; margin: auto">User Admin successfully added ! </p>');
      } else {
        $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:330px; padding:10px; margin: auto">Create User Admin failed ! </p>');
      }

      redirect('spadmin');
    }
    $this->load->view('spadmin/user_form');
  }

  public function verify($id)
  {
    $this->Users_model->updateverify($id);
    $this->sendmail($id);
    $this->Users_model->encrypt($id);
    $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:600px; padding:10px; margin: auto">You have successfully verified one of the users ! </p>');
    redirect('spadmin');
  }
  private function sendmail($id)
  {
    $data = $this->Users_model->read_by($id);
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
    $this->email->to($data->email); // Ganti dengan email tujuan

    // Lampiran email, isi dengan url/path file
    //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

    // Subject email
    $this->email->subject('Your Account has been Verified! | Askunla.com');

    // Isi email
    $pass = $data->password;
    $fullname = $data->fullname;
    $this->email->message("Selamat $fullname, Akun anda sudah bisa digunakan. <br><br> Password : $pass  <br><br> Klik <strong><a href='http://localhost/askunla/index.php/auth/login' target='_blank' rel='noopener'>disini</a></strong> untuk login.");

    // Tampilkan pesan sukses atau error
    if ($this->email->send()) {
      echo $this->email->send();
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }
}
