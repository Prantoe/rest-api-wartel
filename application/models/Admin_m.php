<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_m extends CI_Model
{
    // response jika field ada yang kosong

    public function getUsers()
    {
        return $this->db->get("users")->result_array();
    }
    public function getTotalUsers()
    {
        $this->db->select("SUM(username) as username");
        $this->db->from("users");
        return $this->db->get()->result_array();
    }

    public function getPrice()
    {
        return $this->db->get("price")->result_array();
    }
}
