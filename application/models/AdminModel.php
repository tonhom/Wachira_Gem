<?php

class AdminModel extends CI_Model {

    public function GetAdminInfo($id) {
        $this->db->where("admin_username", $id);
        $query = $this->db->get("admin");
        return $query->row();
    }

    public function insert($data) {
        $check = $this->checkExistUsername($data["admin_username"]);
        if ($check == false) {
            $this->db->insert("admin", $data);
            return true;
        } else {
            return $check;
        }
    }

    public function checkExistUsername($username) {
        $this->db->select("*");
        $this->db->from("admin");
        $this->db->where("admin.admin_username", $username);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function Identity($username, $password) {
        $this->db->select("*");
        $this->db->from("admin");
        $this->db->where("admin.admin_username", $username);
        $this->db->where("admin.admin_password", $password);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

}
