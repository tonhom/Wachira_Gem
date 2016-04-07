<?php

class OrderModel extends CI_Model {

    public function InsertHead($data) {
        $this->db->insert("order", $data);
        return $this->db->insert_id();
    }

    public function InsertRow($data) {
        $this->db->insert("order_detail", $data);
    }

    public function GetLastOrder() {
        $this->db->order_by("date_order", "desc");
        $this->db->limit(5);
        $query = $this->db->get("order");
        return $query->result();
    }

    public function GetMaxId() {
        $this->db->select_max("id");
        $query = $this->db->get("order");
        $maxRow = $query->row();
        if ($maxRow->id == NULL) {
            return 0;
        }
        return $maxRow->id;
    }

}
