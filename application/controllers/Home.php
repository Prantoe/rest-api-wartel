<?php
class Home extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_m");
    }
    public function index()
    {
        $data["data"] = $this->Admin_m->getKomikForHome();
        $this->load->view("Front_end", $data);
    }
}
