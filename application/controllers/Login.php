<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("isLogin") == true) {
            redirect("dashboard");
        }
        $this->load->model("Login_m");
    }
    public function index()
    {
        $this->load->view("login_v");
    }
    public function isLogin()
    {
        $data = [
            "username" => htmlspecialchars(trim($this->input->post("username"))),
            "password" => htmlspecialchars(trim($this->input->post("password")))
        ];
        $isDone = $this->Login_m->checkLogin($data);
        if ($isDone) {
            var_dump("Berhasil");
        }
    }
}
