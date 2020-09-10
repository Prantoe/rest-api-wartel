<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("isLogin") != true) {
            $this->session->set_flashdata("pesan", "Login Terlebih Dahulu!");
            redirect("login");
        }
        $this->load->model("Admin_m");
    }
    public function index()
    {
        $jmlCustomers   = $this->Admin_m->getCustomers();
        $jmlKomik       = $this->Admin_m->getKomik();

        $count["customers"] = count($jmlCustomers);
        $count["komik"]     = $this->Admin_m->getTotalKomik();
        $count["jnsKomik"]  = count($jmlKomik);
        $count["tersewa"]   = $this->Admin_m->getTotalKomikTersewa();

        $this->load->view("home_v", $count);
    }

    public function customers()
    {
        $data['call'] = $this->Admin_m->getCustomers();
        $this->load->view("customers_v", $data);
    }

    public function deleteCustomer($id)
    {
        $isDelete = $this->Admin_m->deleteCustomers($id);
        if ($isDelete) {
            redirect("dashboard/customers");
        }
    }
    public function komik()
    {
        $data["users"] = $this->Admin_m->getKomik();
        $this->load->view("komik_v", $data);
    }
    public function tambahKomik()
    {

        $data = [
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password"),
            "full_name" => $this->input->post("full_name"),
            "last_login" => $this->input->post("last_login"),
            "user_id" => $this->input->post("user_id"),

        ];
        $isInput = $this->Admin_m->addKomik($data);
        if ($isInput) {
            $this->session->set_flashdata("pesan", "Pesanan Berhasil!!");
            redirect("dashboard/komik");
        }
    }
    public function editKomik()
    {

        $data = [
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password"),
            "full_name" => $this->input->post("full_name"),
            "last_login" => $this->input->post("last_login"),
            "user_id" => $this->input->post("user_id")
        ];
        $isEdit = $this->Admin_m->updateKomik($data);
        if ($isEdit) {
            $this->session->set_flashdata("pesan", "Update Data User Berhasil!!");
            redirect("dashboard/komik");
        }
    }
    public function deleteKomik($id)
    {
        $isDelete = $this->Admin_m->deleteKomiks($id);
        if ($isDelete) {
            redirect("dashboard/komik");
        }
    }
    public function logout()
    {
        $userdata = [
            "username" => "",
            "nama" => "",
            "isLogin" => false
        ];
        $this->session->unset_userdata($userdata);
        $this->session->sess_destroy();
        redirect("login");
    }
}
