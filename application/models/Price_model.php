<?php

class Price_model extends CI_Model
{
    public function getPrice($id = null)
    {

        if ($id === null) {
            return $this->db->get('price')->result_array();
        } else {
            return $this->db->get_where('price', ['id' => $id])->result_array();
        }
    }

    public function updatePrice($data, $id)
    {
        $this->db->update('price', $data, ['id' => $id]);
        return $this->db->affected_rows()->result_array;
    }
}
