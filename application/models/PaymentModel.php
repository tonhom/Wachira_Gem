<?php

class PaymentModel extends CI_Model {

    public function GetLastPayment() {
        $this->db->order_by("payment_date_transfer", "desc");
        $this->db->limit(5);
        $query = $this->db->get("payment");
        return $query->result();
    }

    public function Insert($data) {
        $this->db->insert("payment", $data);
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
