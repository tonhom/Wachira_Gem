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
        $this->db->order_by("order_date_order", "desc");
        $this->db->limit(5);
        $query = $this->db->get("order");
        return $query->result();
    }

    public function GetMaxId() {
        $this->db->select_max("order_id");
        $query = $this->db->get("order");
        $maxRow = $query->row();
        if ($maxRow->order_id == NULL) {
            return 0;
        }
        return $maxRow->order_id;
    }
    
    public function GetDetail($order_id) {
        $this->db->where("order_id", $order_id);
        $query = $this->db->get("order");
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return FALSE;
        }
    }

    public function GetDetailByOrderNumber($order_number) {
        $this->db->where("order_number", $order_number);
        $query = $this->db->get("order");
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return FALSE;
        }
    }

    public function GetOrderDetailList($id) {
        $this->db->select("*");
        $this->db->from("order_detail");
        $this->db->join("product", "product.product_id = order_detail.product_id");
        $this->db->where("order_detail.order_id", $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function GetMyOrder($member_id) {
        $this->db->where("member_id", $member_id);
        $query = $this->db->get("order");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    
    public function Paid($order_number){
        $this->db->where("order_number", $order_number);
        $this->db->update("order", ["order_status"=> "รอการจัดส่ง"]);
    }

}
