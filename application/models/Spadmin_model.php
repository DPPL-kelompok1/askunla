<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spadmin_model extends CI_Model
{
  public function readby($type)
  {
    $this->db->where('type', $type);
    $query = $this->db->get('user');
    return $query->result();
  }
  public function create()
  {
    $pass = random_string('alnum', '10');
    $data = array(
      'username' => $this->input->post('username'),
      'password' => $pass,
      'type' => 'Administrator',
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
}
