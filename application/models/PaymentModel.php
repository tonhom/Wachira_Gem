<?php

class PaymentModel extends CI_Model {
    public function GetLastPayment(){
        $this->db->order_by("date_transfer", "desc");
        $this->db->limit(5);
        $query = $this->db->get("payment");
        return $query->result();
    }
    
    public function Insert($data){
        $this->db->insert("payment", $data);
    }
}
