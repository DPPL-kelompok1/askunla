<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getuser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user')->row();
    }

    public function getuserby($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('user')->row();
    }

    public function create()
    {
        $pass = random_string('alnum', '10');
        $data = array(
            'no_identitas' => $this->input->post('username'),
            'username' => $this->input->post('username'),
            'password' => $pass,
            'type' => $this->input->post('type'),
            'fullname' => $this->input->post('fullname'),
            'no_telp' => $this->input->post('notelp'),
            'email' => $this->input->post('email')
        );
        $this->db->insert('user', $data);
    }

    public function changepass()
    {
        $this->db->set('password', password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT));
        $this->db->where('username', $this->session->userdata('username'));
        return $this->db->update('user');
    }

    public function forgotpass($username)
    {
        $newpass = random_string('alnum', '10');
        $this->db->set('password', $newpass);
        $this->db->where('username', $username);
        return $this->db->update('user');
    }

    public function encrypt($id)
    {
        $data = $this->read_by($id);
        $this->db->where('userid', $id);
        $this->db->set('password', password_hash($data->password, PASSWORD_DEFAULT));
        $this->db->update('user');
    }

    public function changephoto($photo)
    {
        if ($this->session->userdata('photo') !== "default.png")
            unlink('./uploads/users/' . $this->session->userdata('photo')); //menghaspus photo lama

        $this->db->set('photo', $photo);
        $this->db->where('username', $this->session->userdata('username'));
        return $this->db->update('user');
    }

    public function update($userid)
    {
        $data = array(
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'no_identitas' => $this->input->post('no_identitas'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tmpt_tgl_lahir' => $this->input->post('tmpt_tgl_lahir'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email')
        );
        $this->db->where('userid', $userid);
        $this->db->update('user', $data);
    }

    public function read_by($userid)
    {
        $this->db->where('userid', $userid);
        $query = $this->db->get('user');
        return $query->row();
    }
}
