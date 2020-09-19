<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class Call extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata("isLogin") != true) {
        //     $this->session->set_flashdata("pesan", "Login Terlebih Dahulu!");
        //     redirect("login");
        // }
        $this->load->model("Call_model", 'call');
    }
    public function index()
    {
        // $jmlCall   = $this->Admin_m->getCall();
        // $jmlUsers       = $this->Admin_m->getUsers();
        // $price          = $this->Admin_m->getPrice();

        // $count["price"] = count($price);

        // $count["call"] = count($jmlCall);
        // $count["users"]     = $this->Admin_m->getTotalUsers();
        // $count["jnsUsers"]  = count($jmlUsers);



        $this->load->view("call_v");
    }
    // call ----
    // public function call()
    // {

    //     $data["call"] = $this->Admin_m->getCall();
    //     $this->load->view("call_v", $data);
    // }
    public function index_get()
    {

        $id = $this->get('id');
        if ($id === null) {
            $call['call'] = $this->call->getCall();
        } else {
            $call['call'] = $this->call->getCall($id);
        }

        if ($call) {

            $this->load->view('call_v', $call);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'data' => 'provide id not found!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $this->call->deleteCall($id);
            redirect("call");
        }
    }
}



    // public function deleteCall($id)
    // {
    //     $isDelete = $this->Admin_m->deleteCall($id);
    //     if ($isDelete) {
    //         redirect("dashboard/call");
    //     }
    // }
    // end call ----

    // users ----
    // public function users()
    // {
    //     $data["users"] = $this->Admin_m->getUsers();
    //     $this->load->view("users_v", $data);
    // }
    // public function tambahUsers()
    // {

    //     $data = [
    //         "username" => $this->input->post("username"),
    //         "password" => $this->input->post("password"),
    //         "full_name" => $this->input->post("full_name"),
    //         "last_login" => $this->input->post("last_login"),
    //         "user_id" => $this->input->post("user_id"),

    //     ];
    //     $isInput = $this->Admin_m->addUsers($data);
    //     if ($isInput) {
    //         $this->session->set_flashdata("pesan", "Pesanan Berhasil!!");
    //         redirect("dashboard/users");
    //     }
    // }
    // public function editUsers()
    // {

    //     $data = [
    //         "username" => $this->input->post("username"),
    //         "password" => $this->input->post("password"),
    //         "full_name" => $this->input->post("full_name"),
    //         "last_login" => $this->input->post("last_login"),
    //         "user_id" => $this->input->post("user_id")
    //     ];
    //     $isEdit = $this->Admin_m->updateUsers($data);
    //     if ($isEdit) {
    //         $this->session->set_flashdata("pesan", "Update Data User Berhasil!!");
    //         redirect("dashboard/users");
    //     }
    // }
    // public function deleteUsers($id)
    // {
    //     $isDelete = $this->Admin_m->deleteUsers($id);
    //     if ($isDelete) {
    //         redirect("dashboard/users");
    //     }
    // }
    // // end users ----

    // // price ----
    // public function price()
    // {
    //     $data["price"] = $this->Admin_m->getPrice();
    //     $this->load->view("home_v", $data);
    // }

    // // end price ----
    // public function logout()
    // {
    //     $userdata = [
    //         "username" => "",
    //         "nama" => "",
    //         "isLogin" => false
    //     ];
    //     $this->session->unset_userdata($userdata);
    //     $this->session->sess_destroy();
    //     redirect("login");
    // }
