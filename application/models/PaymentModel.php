<?php

class PaymentModel extends CI_Model {

    public function GetLastPayment() {
        $this->db->join("order", "order.order_number = payment.order_number");
        $this->db->where("order.order_status", "รอการจัดส่ง");
        $this->db->order_by("payment.payment_date_transfer", "desc");
        $query = $this->db->get("payment");
        return $query->result();
    }

    public function Insert($data) {
        $this->db->insert("payment", $data);
    }
    
    public function GetPayment($order_number){
        $this->db->where("order_number", $order_number);
        $query = $this->db->get("payment");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function CheckPaymentPaid($order_number) {
        $this->db->where("order_number", $order_number);
        $query = $this->db->get("payment");
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
