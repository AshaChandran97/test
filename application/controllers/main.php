<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
  $this->load->view('index');
	}
	
public function register()
{
  $this->load->view('register');
}
public function loginreg()
{
  $this->load->view('loginreg');
}
public function regi()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules("firstname","name",'required');
      $this->form_validation->set_rules("lastname","name",'required');
      $this->form_validation->set_rules("username","name",'required');
      $this->form_validation->set_rules("password","password",'required');
      $this->form_validation->set_rules("mobile","mobile",'required');
        $this->form_validation->set_rules("email","email",'required');
      if($this->form_validation->run())
      {
         $this->load->model('mainmodel');
         $pass=$this->input->post("password");
         $encpass=$this->mainmodel->encpasswor($pass);
      $a=array("firstname"=>$this->input->post("firstname"),
                "lastname"=>$this->input->post("lastname"),
                "username"=>$this->input->post("username"),
                "password"=>$encpass,
                "mobile"=>$this->input->post("mobile"),
                "email"=>$this->input->post("email"));
      $this->mainmodel->regi($a);
  
      redirect(base_url().'main/register');
    }
}
public function rview()
{
  $this->load->model('mainmodel');
  $data['n']=$this->mainmodel->rview();
  $this->load->view('regview',$data);
}
public function approvedetai()
{
  $this->load->model("mainmodel");
  $id=$this->uri->segment(3);
  $this->mainmodel->approvedetai($id);
  redirect('main/rview','refresh');
}
public function rejectdetai()
{
  $this->load->model("mainmodel");
  $id=$this->uri->segment(3);
  $this->mainmodel->rejectdetai($id);
  redirect('main/rview','refresh');
}

public function logc()
{
    $this->load->library('form_validation');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
         $this->load->model('mainmodel');
          $pass=$this->input->post("password");
         $email=$this->input->post("email");
         $rslt=$this->mainmodel->selectpas($email,$pass);
         if($rslt)
         {
            $id=$this->mainmodel->getuseri($email);
            $user=$this->mainmodel->getuse($id);
            $this->load->library(array('session'));
            $this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status));

            if($_SESSION['status']=='1')
            {
                redirect(base_url().'main/userpage');

            }
            else
            {
                echo "waiting for approval";

            }
        }
         else
          {
            echo "invalid user";

         }

    }
    else
    {
        redirect('main/loginreg','refresh');
    }
}
public function userpage()
{
  $this->load->view('userpage');
}
}