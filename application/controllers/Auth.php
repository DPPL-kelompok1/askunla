<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use \Mailjet\Resources;


class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function regist()
    {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'required|numeric|is_unique[user.no_identitas]');
            $this->form_validation->set_rules('fullname', 'Fullname', 'required|max_length[150]|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $this->Auth_model->create();
                $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Register Successfully, Check Your Email Address!</p>');
                // echo 'true';
            } else {
                $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Your email has been registered!</p>');
                // echo 'failed';
            }
        }
        // if ($this->input->post('submit') && $this->val_reg('submit')) {
        //     $var = $this->Auth_model->getuserby($this->input->post('email'));
        //     if ($var != NULL) {
        //         $this->session->set_flashdata('msg', '<p style="color : red">Your email has been registered!</p>');
        //         redirect('welcome');
        //     } else {
        //         $this->Auth_model->create();
        //         $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Check Your Email Address!</p>');
        //         redirect('welcome');
        //     }
        //     //$this->sendEmail();
        // }
        $this->load->view('auth/form_register');
    }

    public function login()
    {
        if ($this->input->post('login') && $this->validation('login')) {
            $login = $this->Auth_model->getuser($this->input->post('username'));
            if ($login != NULL) {
                if (password_verify($this->input->post('password'), $login->password)  && $login->verifikasi == '1') {
                    $data = array(
                        'userid' => $login->userid,
                        'username' => $login->username,
                        'fullname' => $login->fullname,
                        'type' => $login->type,
                        'userid' => $login->userid,
                        'identity' => $login->no_identitas,
                        'photo' => $login->photo
                    );
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">You are login !</p>');
                    redirect('welcome');
                } else if (password_verify($this->input->post('password'), $login->password) && $login->verifikasi != '1') {
                    $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Your Account not Verified !</p>');
                    redirect('welcome');
                }
            }
            $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Invalid username or password !</p>');
        }
        $this->load->view('auth/form_login');
    }

    public function validation($username)
    {
        $this->load->library('form_validation');

        if ($username == 'login') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
        } else {
            $this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        }

        if ($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }

    public function respass()
    {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == TRUE) {
                $usercheck = $this->Auth_model->getuser($this->input->post('username'));
                // $emailcheck = $this->Auth_model->getuserby($this->input->post('email'));
                if ($usercheck == NULL) {

                    $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Please input Username Correctly!</p>');

                    // echo 'wrong';
                } else if ($usercheck != NULL) {
                    if ($this->input->post('email') == $usercheck->email) {
                        $this->Auth_model->forgotpass($this->input->post('username'));
                        $this->sendmail($usercheck->userid);
                        $this->Auth_model->encrypt($usercheck->userid);
                        $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Reset password successfully, Check your email</p>');

                        redirect('auth/login');
                    } else {
                        $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Email is not Registered!</p>');
                    }
                    // echo 'invalid username or email';
                }
            } else {
                $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Please enter the data correctly! </p>');
                // echo 'Input username dan email yang benar';
            }

            // $this->Auth_model->val_reg();
            // echo 'test';
            // $usercheck = $this->Auth_model->getuser($this->input->post('username'));
            // if ($this->val_reg()) {
            //     $this->Auth_model->forgotpass($this->input->post('username'));
            //     $this->sendmail($usercheck->userid);
            //     $this->Auth_model->encrypt($usercheck->userid);
            //     $this->session->set_flashdata('msg', '<p style="color:green">Reset password successfully, Check your email</p>');
            //     echo "test";

            //     redirect('auth/login');
            // }
        }

        $this->load->view('auth/form_respass');
    }

    public function val_reg($input)
    {
        $this->load->library('form_validation');

        if ($input == 'submit') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('fullname', 'Fullname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric');
        }

        if ($this->form_validation->run())
            return TRUE;
        else
            $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Your email has been registered!</p>');
        return FALSE;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }


    public function sendmail($id)
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
            'Subject' => "Reset Password",
            'TextPart' => "My first Mailjet email",
            'HTMLPart' => "Dear $var->fullname,<br>This is your new password : $var->password<br> Do not tell anyone your password, for the security of your account.<br>Thank You.",
            'CustomID' => "AppGettingStartedTest"
			]
		]
		];
		$response = $mj->post(Resources::$Email, ['body' => $body]);
		$response->success() && var_dump($response->getData());

        // $this->load->model('Users_model');
        // $var = $this->Users_model->read_by($id);
        // // Konfigurasi email
        // $config = [
		// 	'mailtype'  => 'html',
		// 	'charset'   => 'utf-8',
		// 	'protocol'  => 'smtp',
		// 	'smtp_host' => 'smtp.googlemail.com',
		// 	'smtp_user' => 'pwftubes21@gmail.com',  // Email gmail
		// 	'smtp_pass'   => 'PWFTubes2021',  // Password gmail
		// 	'smtp_crypto' => 'ssl',
		// 	'smtp_port'   => 465,
		// 	'newline' => "\r\n"
		// ];

		// $this->email->initialize($config);
		// // Load library email dan konfigurasinya
		// $this->load->library('email', $config);

		// // Email dan nama pengirim
		// $this->email->from('pwftubes21@gmail.com', 'Askunla.com');

        // // Email penerima
        // $this->email->to($var->email); // Ganti dengan email tujuan

        // // Lampiran email, isi dengan url/path file
        // //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // // Subject email
        // $this->email->subject("Reset Password");

        // Isi email
        //$this->email->message("Dear $var->fullname,<br>This is your new password : $var->password<br> Do not tell anyone your password, for the security of your account.<br>Thank You.");

        // // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
        //     echo $this->email->send();
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }

    public function changepass()
    {
        if (!$this->session->userdata('username')) redirect('auth/login'); //filter login
        if ($this->input->post('change') && $this->validation('change')) {
            $change = $this->Auth_model->getuser($this->session->userdata('username'));
            if (password_verify($this->input->post('oldpassword'), $change->password)) {
                if ($this->Auth_model->changepass())
                    $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Password successfuly changed !</p>');
                else
                    $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Change password failed !</p>');
            } else {
                $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Wrong old password !</p>');
            }
        }
        $this->load->view('auth/form_pass');
    }

    public function changephoto()
    {
        if (!$this->session->userdata('username')) redirect('auth/login'); //filter login
        $data['error'] = '';
        if ($this->input->post('upload')) {
            if ($this->upload()) { //jika sukses upload
                $this->Auth_model->changephoto($this->upload->data('file_name')); //ubah data photo di database
                $this->session->set_userdata('photo', $this->upload->data('file_name')); //update data session
                $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Photo Successfully Changed !</p>'); //pesan sukes
            } else $data['error'] = $this->upload->display_errors(); //jika gagal upload
        }
        $this->load->view('auth/form_photo', $data);
    }

    public function upload()
    {
        $config['upload_path']          = './uploads/users/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('photo');
    }
    public function edit($userid)
    {
        if ($this->input->post('submit')) {
            $this->Auth_model->update($userid);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">User successfully updates ! </p>');
            } else {
                $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto"> User update failed ! </p>');
            }
            redirect('welcome');
        }

        $data['user'] = $this->Auth_model->read_by($userid);
        $this->load->view('auth/form_profile', $data);
    }
}