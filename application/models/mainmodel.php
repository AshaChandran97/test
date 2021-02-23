<?php
class mainmodel extends CI_model
{


public function regi($a)
{
  $this->db->insert("reg",$a);
}
public function encpasswor($pass)
{
  return password_hash($pass,PASSWORD_BCRYPT);
}
public function rview()
{
  //$this->db->select('*');
  $qry=$this->db->get("reg");
  return $qry;
}
public function approvedetai($id)
{
  $this->db->set('status','1');
  $this->db->where('id',$id);
  $this->db->update("reg");
}

public function rejectdetai($id)
{
  $this->db->set('status','2');
  $this->db->where('id',$id);
  $this->db->update("reg");
}
 public function selectpas($email,$pass)
  {
    $this->db->select('password');
    $this->db->from("reg");
    $this->db->where("email","$email");
    $qry=$this->db->get()->row('password');
    return $this->db->get()->row($pass,$qry);
  }
  public function verifypas($pass,$qry)
  {
    return password_verify($pass,$qry);
  }
  public function getuseri($email)
  {
    $this->db->select('id');
    $this->db->from("reg");
    $this->db->where("email",$email);
    return $this->db->get()->row('id');

  }
  public function getuse($id)
  {
    $this->db->select("*");
    $this->db->from("reg");
    $this->db->where("id",$id);
    return $this->db->get()->row();

  }
}
?>