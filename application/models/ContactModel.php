<?php

class ContactModel extends CI_Model{
    public function insert($data){
        $this->db->insert("contact", $data);
    }
}
