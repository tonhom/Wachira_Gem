<?php

class CategoryModel extends CI_Model {

    public function getAll() {
        $query = $this->db->get("category");
        return $query->result();
    }

    public function InUse($id) {
        $this->db->where("category_id", $id);
        $query = $this->db->count_all_results("product");
        if ($query > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function GetData($id) {
        $this->db->where("category_id", $id);
        $query = $this->db->get("category");
        return $query->row();
    }

    public function GetAlToDictionary() {
        $query = $this->db->get("category");
        foreach ($query->result() as $item) {
            $data[$item->category_id] = $item->category_name;
        }
        return $data;
    }

    public function Remove($id) {
        $this->db->where("category_id", $id);
        $this->db->delete("category");
    }

    public function Insert($data) {
        $this->db->insert("category", $data);
    }

    public function Update($id, $data) {
        $this->db->where("category_id", $id);
        $this->db->update("category", $data);
    }

}
