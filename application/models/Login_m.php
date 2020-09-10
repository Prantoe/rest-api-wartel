<?php 

class Login_m extends CI_Model{
    public function checkLogin($data){
        $checkUsername = $this->db->get_where("admin", array("username" => $data["username"]))->row_array();
        if($checkUsername > 0){
            if(password_verify($data["password"], $checkUsername["password"])){
                $getDetailUser = $this->db->get_where("admin", array("username" => $data["username"]))->result_array();
                $userdata = [
                    "username" => $getDetailUser[0]["username"],
                    "nama" => $getDetailUser[0]["nama"],
                    "isLogin"  => true
                ];
                $this->session->set_userdata($userdata);
                redirect("dashboard");
            }else{
                $this->session->set_flashdata("pesan", "Password Salah!");
                redirect("login");
            }
        }else{
            $this->session->set_flashdata("pesan", "Username Salah!");
            redirect("login");
        }
    }
}
