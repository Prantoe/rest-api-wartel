<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class Dashboard extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata("isLogin") != true) {
        //     $this->session->set_flashdata("pesan", "Login Terlebih Dahulu!");
        //     redirect("login");
        // }
        $this->load->model("Admin_m");
    }
    public function index_get()
    {

        $this->load->view("home_v");
    }
}
