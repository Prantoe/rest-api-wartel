<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Users extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
    }

    public function index_get()
    {

        $id = $this->get('user_id');
        if ($id === null) {
            $users['users'] = $this->users->getUsers();
        } else {
            $users['users'] = $this->users->getUsers($id);
        }

        if ($users) {
            $this->load->view('users_v', $users);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('user_id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'data' => 'provide id not found!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->users->deleteUsers($id) > 0) {

                redirect("users");
            } else {
                $this->response([
                    'status' => false,
                    'data' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'username' => $this->post('username'),
            // 'password' => $this->post('password'),
            'full_name' => $this->post('full_name'),
            'last_login' => $this->post('last_login')
        ];

        if ($this->users->createUsers($data) > 0) {
            redirect('users/createUsers');
        } else {
            $this->response([
                'status' => false,
                'data' => 'fail create data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $id = $this->put('user_id');
        $data = [
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'full_name' => $this->put('full_name'),
            'last_login' => $this->put('last_login')
        ];

        if ($this->users->updateUsers($data, $id)) {
            redirect('users/createUsers');
        } else {
            $this->response([
                'status' => false,
                'data' => 'fail update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
