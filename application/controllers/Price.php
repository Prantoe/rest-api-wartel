<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class Price extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Price_model", 'price');
    }
    public function index()
    {


        $this->load->view("home_v");
    }

    public function index_get()
    {

        $id = $this->get('id');
        if ($id === null) {
            $price['price'] = $this->price->getPrice();
        } else {
            $price['price'] = $this->price->getPrice($id);
        }

        if ($price) {

            $this->load->view('price_v', $price);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $price = [
            'price_per_detik' => $this->put('price_per_detik'),
            'created_at' => $this->put('created_at'),
            'updated_at' => $this->put('updated_at')

        ];

        if ($this->price['price']->updatePrice($price, $id)) {

            redirect('dashboard');
        } else {
            $this->response([
                'status' => false,
                'data' => 'fail update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
