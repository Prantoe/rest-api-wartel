<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class Operator extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Operator_model", 'operator');
    }
    public function index()
    {


        $this->load->view("operator_v");
    }

    public function index_get()
    {

        $id = $this->get('id');
        if ($id === null) {
            $operator['operator'] = $this->operator->getOperator();
        } else {
            $price['operator'] = $this->operator->getOperator($id);
        }

        if ($price) {

            $this->load->view('operator_v', $price);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
