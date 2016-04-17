<?php

class ContactModel extends CI_Model {

    public function insert($data) {
        $this->db->insert("contact", $data);
    }

    public function GetAll() {
        $this->db->order_by("contact_id", "ASC");
        $query = $this->db->get("contact");
        return $query->result();
    }

    public function GetDetail($id) {
        $this->db->where("contact_id", $id);
        $query = $this->db->get("contact");
        return $query->row();
    }

    public function Delete($id) {
        $this->db->where("contact_id", $id);
        $this->db->delete("contact");
    }

}
