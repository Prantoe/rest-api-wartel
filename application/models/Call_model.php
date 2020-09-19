<?php

class Call_model extends CI_Model
{
    public function getCall($id = null)
    {

        if ($id === null) {
            return $this->db->get('call')->result_array();
        } else {
            return $this->db->get_where('call', ['id' => $id])->result_array();
        }
    }
    public function deleteCall($id)
    {
        $this->db->delete('call', ['id' => $id]);

        return $this->db->affected_rows();
    }
}
