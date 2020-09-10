<?php
class Admin_m extends CI_Model
{
    public function getKomik()
    {
        return $this->db->get("users")->result_array();
    }
    public function getTotalKomik()
    {
        $this->db->select("SUM(jumlah) as jumlah");
        $this->db->from("komik");
        return $this->db->get()->result_array();
    }
    public function getTotalKomikTersewa()
    {
        $this->db->select("COUNT(id_komik) as tersewa");
        $this->db->from("sewa");
        return $this->db->get()->result_array();
    }
    public function addData($data)
    {
        $this->db->set("nama_cust", $data["nama_customers"]);
        $this->db->set("contact_cust", $data["contact_customers"]);
        $this->db->set("nama_jalan", $data["alamat_customers"]);
        $this->db->set("kode_pos", $data["kode_pos"]);
        $customers = $this->db->insert("customer");
        if ($customers) {
            $this->db->set("id_komik", $data["id_komik"]);
            $this->db->set("tgl_sewa", $data["tanggal_booking"]);
            $this->db->set("tgl_kembali", $data["tanggal_pengembalian"]);
            $sewa = $this->db->insert("sewa");
            if ($sewa) {
                // Get Last Data Customers
                $getIdCustomers = $this->db->order_by("id_cust", "desc")
                    ->limit(1)
                    ->get("customer")
                    ->row();
                $idCustomers = $getIdCustomers->id_cust;
                $this->db->set("id_komik", $data["id_komik"]);
                $this->db->set("id_cust", $idCustomers);
                $this->db->set("total_bayar", $data["harga"]);
                $transaksi = $this->db->insert("transaksi");
                if ($transaksi) {
                    return true;
                }
            }
        }
    }

    public function getCustomers()
    {
        return $this->db->get("call")->result_array();
    }
    public function addKomik($data)
    {
        $this->db->set("username", $data["username"]);
        $this->db->set("password", $data["password"]);
        $this->db->set("full_name", $data["full_name"]);
        $this->db->set("last_login", $data["jumlah"]);

        return $this->db->insert("users");
    }

    public function deleteCustomers($id)
    {
        return $this->db->delete("call", array("id" => $id));
    }
    public function updateKomik($data)
    {

        $this->db->set("username", $data["username"]);
        $this->db->set("full_name", $data["full_name"]);
        $this->db->set("last_login", $data["last_login"]);

        $this->db->where("user_id", $data["user_id"]);
        return $this->db->update("users");
    }
    public function deleteKomiks($id)
    {
        return $this->db->delete("users", array("user_id" => $id));
    }
    // method for Home/Landing page or Front-End
    public function getKomikForHome()
    {
        $this->db->select("komik.id_komik, komik.judul_komik, komik.pengarang, komik.penerbit, komik.harga, komik.gambar, komik.jumlah, COUNT(sewa.id_komik) as tersewa, komik.jumlah - COUNT(sewa.id_komik) as tersedia");
        $this->db->from("komik");
        $this->db->join("sewa", "komik.id_komik = sewa.id_komik", "left");
        $this->db->group_by("komik.id_komik");
        return $this->db->get()->result_array();
    }
}
