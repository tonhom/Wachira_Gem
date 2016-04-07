<?php

class MemberModel extends CI_Model {

    public function GetMemberInfo($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("member");
        return $query->row();
    }

    public function insert($data) {
        $check = $this->checkExistUsername($data["username"]);
        if ($check == false) {
            $this->db->insert("member", $data);
            return true;
        } else {
            return $check;
        }
    }

    public function checkExistUsername($username) {
        $this->db->select("*");
        $this->db->from("member");
        $this->db->where("member.username", $username);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function Identity($username, $password) {
        $this->db->select("*");
        $this->db->from("member");
        $this->db->where("member.username", $username);
        $this->db->where("member.password", $password);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

}
