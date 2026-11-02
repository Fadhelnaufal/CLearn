<?php
class M_Auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function do_register($data)
    {
        $this->db->insert('users', $data);
    }

    public function email_check($email)
    {
        $this->db->select('count(*) as c');
        $this->db->where('UserEmail', $email);
        $row = $this->db->get('users')->row();
        if ($row->c==0) {
            return false;
        }else {
            return true;
        }
    }

    public function getUserByEmail($email)
    {
        $this->db->where('UserEmail', $email);
        return $this->db->get('users')->row();
    }
    public function password_check($email)
    {
        $this->db->where('UserEmail', $email);
        $row = $this->db->get('users')->row();
        return $row->UserPassword;
    }  
     public function old_check()
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('UserID', $id);
        $row = $this->db->get('users')->row();
        return $row->UserPassword;
    }   
    public function getProfil()
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('UserID', $id);
        return $this->db->get('users')->row();
    }
    public function update($data)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('UserID', $id);
        $this->db->update('users', $data);    
    }

    function updatePasswordhash($data,$email)
	{
		$this->db->where('UserEmail',$email);
		$this->db->update('users',$data);
	}

}
