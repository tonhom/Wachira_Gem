<?php

class ProductModel extends CI_Model {

    public function Search($q) {
        $this->db->like('name', $q);
        $this->db->or_like('description', $q);
        $query = $this->db->get("product");
        return $query->result();
    }

    public function Insert($data) {
        $this->db->insert("product", $data);
        return $this->db->insert_id();
    }

    public function Update($id, $data) {
        $this->db->where("id", $id);
        $this->db->update("product", $data);
    }

    public function RemoveById($id) {
        $this->db->where("id", $id);
        $this->db->delete("product");
    }

    public function GetById($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("product");
        if ($query) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function GetRecent($max = 10) {
        $this->db->order_by("id", "asc");
        $this->db->limit($max);
        $query = $this->db->get("product");

        if ($query) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function GetByCategory($cat_id) {
        $this->db->where("category_id", $cat_id);
        $this->db->order_by("id", "desc");
        //$this->db->limit(10);
        $query = $this->db->get("product");
        if ($query) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function GetByLimit($currentPage = 1, $offset = 12) {
        $this->db->order_by("id", "asc");
        $this->db->limit($offset, ($currentPage - 1) * $offset);
        $query = $this->db->get("product");
        //echo $this->db->last_query(); exit();
        if ($query) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function GetBestSeller() {
        $sql = "SELECT product_id, SUM(amount) AS total FROM order_detail GROUP BY product_id ORDER BY total DESC LIMIT 0,5";
        $query = $this->db->query($sql);
        $data = $query->result();
        if (!empty($data)) {
            foreach ($data as $item) {
                $ids[] = $item->product_id;
            }
            $this->db->where_in("id", $ids);
            $query = $this->db->get("product");
            return $query->result();
        } else {
            $this->db->order_by("id", "DESC");
            $this->db->limit(4);
            $query = $this->db->get("product");
            return $query->result();
        }
    }

}
