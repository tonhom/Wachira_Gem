<?php

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->setNavbar("", ["current" => ""]);
    }

    public function GetDetail() {
        $order_id = $this->input->post("order_id");
        $this->load->model("OrderModel");
        $data = $this->OrderModel->GetDetail($order_id);
        if ($data === FALSE) {
            $data = new \stdClass();
            $data->error = TRUE;
        } else {
            $vat = number_format($data->order_total_price * 0.07, 2);
            $data->order_total_price_vat_number = $data->order_total_price;
            $data->order_total_price_vat = "<strong>" . number_format($data->order_total_price, 2) . "</strong> (Vat 7% = {$vat})";
            $data->items = $this->OrderModel->GetOrderDetailList($data->order_id);
            $totalNet = 0;
            foreach ($data->items as $item) {
                $totalNet += $item->order_detail_amount * $item->product_price;
            }
            $data->order_total_price = number_format($totalNet, 2);
        }
        echo json_encode($data);
    }

    public function Details($order_id) {
        $this->load->model("OrderModel");
        $data["order"] = $this->OrderModel->GetDetail($order_id);
        $data["detail"] = $this->OrderModel->GetOrderDetailList($order_id);

        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();

        $this->load->model("PaymentModel");
        $data["IPayment"] = $this->PaymentModel;

        $this->load->model("DateTimeModel");
        $data["DateTime"] = $this->DateTimeModel;

        $this->load->model("MemberModel");
        $data["IMember"] = $this->MemberModel;

        $content = $this->loadView("member/order_detail", $data);
        $this->render($content);
    }

    public function printOrder($order_id) {
        $this->load->model("OrderModel");
        $data["order"] = $this->OrderModel->GetDetail($order_id);
        $data["detail"] = $this->OrderModel->GetOrderDetailList($order_id);

        $this->load->model("DateTimeModel");
        $data["DateTime"] = $this->DateTimeModel;

        $this->load->model("PaymentModel");
        $data["IPayment"] = $this->PaymentModel;

        $this->load->model("MemberModel");
        $data["IMember"] = $this->MemberModel;

        $content = $this->loadView("member/order_print", $data);
        echo $content;
    }

}
