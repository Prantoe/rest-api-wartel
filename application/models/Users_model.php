<?php

class Users_model extends CI_Model
{
    public function getUsers($id = null)
    {

        if ($id === null) {
            return $this->db->get('users')->result_array();
        } else {
            return $this->db->get_where('users', ['user_id' => $id])->result_array();
        }
    }
    public function deleteUsers($id)
    {
        // $this->db->delete('users', ['user_id' => $id]);

        // return $this->db->affected_rows();
        return $this->db->delete("users", array("user_id" => $id));
    }


    public function createUsers($data)
    {
        $this->db->insert('users', $data);

        return $this->db->affected_rows();
    }

    public function updateUsers($data, $id)
    {
        $this->db->update('users', $data, ['user_id' => $id]);
        return $this->db->affected_rows()->result_array;

        // $this->db->where("user_id", $data, ["user_id" => $id]);
        // return $this->db->update("users");
    }
}
