<?php

class Cart extends MY_Controller {

    public function items() {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();

        $this->load->model("ProductModel");
        $data["instantProduct"] = $this->ProductModel;

        $this->setNavbar("", ["current" => "cart"]);
        $data["items"] = $this->session->userdata("order_items") == "" ? [] : $this->session->userdata("order_items");
        $this->render($this->loadView("cart/items", $data));
    }

    public function orderDetail() {
        $data["items"] = $this->session->userdata("order_items");
        if (empty($data["items"])) {
            $this->session->set_flashdata("empty_cart", TRUE);
            redirect("cart/items");
        }
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();

        $this->load->model("ProductModel");
        $data["instantProduct"] = $this->ProductModel;



        $this->setNavbar("", ["current" => "cart"]);
        $this->render($this->loadView("cart/order_detail", $data));
    }

    public function clear() {
        $this->session->set_userdata("order_items", []);
        redirect("cart/items");
    }

    public function updateItem($id, $amount) {
        $data = $this->session->userdata("order_items");
        $data[$id] = $amount;
        $this->session->set_userdata("order_items", $data);
        redirect("cart/items");
    }

    public function confirmOrder() {
        $user = $this->session->userdata("user");
        if ($user == "") {
            $this->session->set_userdata("force_to_cart_after_signin", "cart");
            redirect("home/login");
        } else {
            // first create order
            $this->load->model("OrderModel");
            $this->load->model("ProductModel");
            $dataOrder = [
                "order_number" => $this->generateOrderNumber(),
                "member_id" => $this->session->userdata("user")->member_id,
                "order_date_order" => date("Y-m-d H:i:s"),
                "order_total_price" => $this->calculateTotalPrice()
            ];

            $this->db->trans_begin();
            $order_id = $this->OrderModel->InsertHead($dataOrder);

            foreach ($this->session->userdata("order_items") as $id => $amount) {
                $dataOrderRow = [
                    "order_id" => $order_id,
                    "product_id" => $id,
                    "order_detail_amount" => $amount
                ];
                $this->OrderModel->InsertRow($dataOrderRow);
                $this->ProductModel->Reserve($id, $amount);
            }

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata("save_error", TRUE);
                $this->db->trans_rollback();
            } else {
                $this->session->set_flashdata("save_success", TRUE);
                $this->db->trans_commit();
            }
            $this->clear();
        }
    }

    private function calculateTotalPrice() {
        $this->load->model("ProductModel");
        $data = $this->session->userdata("order_items");
        $totalPrice = 0;
        foreach ($data as $id => $amount) {
            $detail = $this->ProductModel->GetById($id);
            $totalPrice += $detail->product_price * $amount;
        }
        return $totalPrice;
    }

    private function generateOrderNumber() {
        $lastId = $this->OrderModel->GetMaxID();
        $lastId++;
        $newId = str_pad($lastId, 5, "0", STR_PAD_LEFT);
        return $newId;
    }

    public function addItem($id, $amount) {
        $data = $this->session->userdata("order_items");
        $data[$id] = $amount;
        $this->session->set_userdata("order_items", $data);
        redirect("product/view/{$id}");
    }

    public function removeItem($id) {
        $data = $this->session->userdata("order_items");
        unset($data[$id]);
        $this->session->set_userdata("order_items", $data);
        redirect("cart/items/");
    }

}
