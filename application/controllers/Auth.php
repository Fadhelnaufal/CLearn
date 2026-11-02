<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
        // $this->load->database();
    }
    public function index()
    {
        $this->load->view('landing/index');
    }
    public function login()
    {
        if ($this->session->userdata('role') == 'siswa') {
            redirect('siswa', 'refresh');
        }
        if ($this->session->userdata('role') == 'guru') {
            redirect('guru', 'refresh');
        }

        $this->form_validation->set_rules('email', 'email', 'callback_email_check');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $email = $this->input->post('email');
            $data = $this->M_Auth->getUserByEmail($email);
            $userdata =
                array(
                    'id_user'  => $data->UserID,
                    'nama'     => $data->UserName,
                    'role'     => $data->UserRole,
                    'ava'      => $data->UserAvatar,
                );
            $this->session->set_userdata($userdata);
            if ($data->UserRole == "siswa") {
                redirect('siswa', 'refresh');
            } elseif ($data->UserRole == "guru") {
                redirect('guru', 'refresh');
            }
        }
    }
    public function email_check($email)
    {
        $email_cek = $this->M_Auth->email_check($email);
        $password = $this->input->post('password');

        if ($email_cek == false) {
            $this->form_validation->set_message('email_check', '{field} tidak terdaftar');
            return false;
        } else {
            $hash = $this->M_Auth->password_check($email);
            if (password_verify($password, $hash)) {
                return true;
            } else {
                $this->form_validation->set_message('email_check', 'Password salah');
                return false;
            }
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('userRole', 'user role', 'required');
        $this->form_validation->set_rules(
            'telp',
            'Nomor Telepon',
            'required|numeric|min_length[10]|max_length[15]',
            array(
                'numeric'       => '%s harus berupa angka',
                'min_length'    => '%s terlalu pendek',
                'max_length'    => '%s terlalu panjang'
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[users.UserEmail]',
            array(
                'valid_email'   => "%s tidak valid",
                'is_unique'     => "%s sudah pernah terdaftar"
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[5]',
            array(
                'min_length'    => '%s terlalu pendek'
            )
        );
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi password',
            'required|matches[password]',
            array(
                'matches'   => '%s tidak sesuai'
            )
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/daftar');
        } else {
            $insert_data = [
                'UserName' => $this->input->post('nama'),
                'UserEmail' => $this->input->post('email'),
                'UserPassword' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'UserContactNo' => $this->input->post('telp'),
                'UserRole' => $this->input->post('userRole'),
            ];
            $this->M_Auth->do_register($insert_data);

            redirect('auth/login', 'refresh');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');

        redirect('auth/login', 'refresh');
    }
    public function lupapassword()
    {
        $this->load->model('M_Auth');
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('email','Email','required');
			if($this->form_validation->run()==TRUE)
			{
				$email  = $this->input->post('email');
				$validateEmail = $this->M_Auth->validateEmail($email);
				if($validateEmail!=false)
				{
					$row = $validateEmail;
					$user_id = $row->id;

					$string = time().$user_id.$email;
					$hash_string = hash('sha256',$string);
					$currentDate = date('Y-m-d H:i');
					$hash_expiry = date('Y-m-d H:i',strtotime($currentDate. ' + 1 days'));
					$data = array(
						'hash_key'=>$hash_string,
						'hash_expiry'=>$hash_expiry,
					);

					
					$resetLink = base_url().'reset/password?hash='.$hash_string;
					$message = '<p>Your reset password Link is here:</p>'.$resetLink;
					$subject = "Password Reset link";
					$sentStatus = $this->sendEmail($email,$subject,$message);
					if($sentStatus==true)
					{
						$this->M_Auth->updatePasswordhash($data,$email);
						$this->session->set_flashdata('success','Reset password link successfully sent');
						redirect(base_url('auth/login/'));
					}
					else
					{
						$this->session->set_flashdata('error','Email sending error');
						$this->load->view('auth/lupapassword');	
					}

				}	
				else
				{
					$this->session->set_flashdata('error','invalid email id');
					$this->load->view('auth/lupapassword');	
				}

			}
			else
			{
				$this->load->view('auth/lupapassword');	
			}
		}
		else
		{
			$this->load->view('auth/lupapassword');	
		}
    }

    /*user this email sending code */
	public function sendEmail($email,$subject,$message)
    {

    	/* use this on server */

    	/* $config = Array(
		      'mailtype' => 'html',
		      'charset' => 'iso-8859-1',
		      'wordwrap' => TRUE
	    	);
    	 */

    	
    	/*This email configuration for sending email by Google Email(Gmail Acccount) from localhost */
	    $config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.googlemail.com',
	     
	      'smtp_port' => 465,
	      'smtp_user' => 'your_email@gmail.com',  //gmail id
	      'smtp_pass' => 'your_app_password',   //gmail password
	      
	      'mailtype' => 'html',
	      'charset' => 'iso-8859-1',
	      'wordwrap' => TRUE
	    	);



          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('noreply - Coopas Team');
          $this->email->to($email);
          $this->email->subject($subject);
          $this->email->message($message);
          
          if($this->email->send())
         {
           return true;
         }
         else
         {
         	return false;
         }
    }

}
