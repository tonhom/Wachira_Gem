<?php

class ProductModel extends CI_Model {

    public function Restock() {
        $sql = "SELECT * FROM `order` where DATE_ADD(order_date_order, interval 7 day) <= NOW() AND order_status = 1;";
        $query = $this->db->query($sql);
        $this->db->trans_begin();
        foreach ($query->result() as $row) {
            $this->db->where("order_id", $row->order_id);
            $details_query = $this->db->get("order_detail");
            $details = $details_query->result();
            foreach ($details as $order_detail) {
                // get first 
                $this->db->where("product_id", $order_detail->product_id);
                $product = $this->db->get("product");
                $product = $product->row();

                // then update product
                $this->db->where("product_id", $order_detail->product_id);
                $this->db->update("product", ["product_stock" => $product->product_stock + $order_detail->order_detail_amount]);
            }
            // update order_status
            $this->db->where("order_id", $row->order_id);
            $this->db->update("order", ["order_status" => 4]);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function Reserve($id, $amount) {
        $data = $this->GetById($id);
        $this->db->where("product_id", $id);
        $this->db->update("product", ["product_stock" => $data->product_stock - $amount]);
    }

    public function Search($q) {
        $this->db->like('product_name', $q);
        $this->db->or_like('product_description', $q);
        $query = $this->db->get("product");
        return $query->result();
    }

    public function Insert($data) {
        $this->db->insert("product", $data);
        return $this->db->insert_id();
    }

    public function Update($id, $data) {
        $this->db->where("product_id", $id);
        $this->db->update("product", $data);
    }

    public function RemoveById($id) {
        $this->db->where("product_id", $id);
        $this->db->delete("product");
    }

    public function GetById($id) {
        $this->db->where("product_id", $id);
        $query = $this->db->get("product");
        if ($query) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function GetRecent($max = 10) {
        $this->db->order_by("product_id", "asc");
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
        $this->db->order_by("product_id", "desc");
        //$this->db->limit(10);
        $query = $this->db->get("product");
        if ($query) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function GetByLimit($currentPage = 1, $offset = 12) {
        $this->db->order_by("product_id", "asc");
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
        $sql = "SELECT product_id, SUM(order_detail_amount) AS total FROM order_detail GROUP BY product_id ORDER BY total DESC LIMIT 0,5";
        $query = $this->db->query($sql);
        $data = $query->result();
        if (!empty($data)) {
            foreach ($data as $item) {
                $ids[] = $item->product_id;
            }
            $this->db->where_in("product_id", $ids);
            $query = $this->db->get("product");
            return $query->result();
        } else {
            $this->db->order_by("product_id", "DESC");
            $this->db->limit(4);
            $query = $this->db->get("product");
            return $query->result();
        }
    }

    public function InUse($id) {
        $this->db->where("product_id", $id);
        $query = $this->db->count_all_results("order_detail");
        return $query;
    }

}
