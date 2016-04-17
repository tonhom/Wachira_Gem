<?php

class MemberModel extends CI_Model {

    public function CheckMemberEmail($email) {
        $this->db->where("member_email", $email);
        $query = $this->db->count_all_results("member");
        if ($query > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function GetMemberInfo($id) {
        $this->db->where("member_id", $id);
        $query = $this->db->get("member");
        return $query->row();
    }

    public function insert($data) {
        $check = $this->checkExistUsername($data["member_username"]);
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
        $this->db->where("member.member_username", $username);
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
        $this->db->where("member.member_username", $username);
        $this->db->where("member.member_password", $password);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function update($id, $data) {
        $this->db->where("member_id", $id);
        $this->db->update("member", $data);
    }

}
