<?php

class Order extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->setNavbar("", ["current"=> ""]);
    }

    public function GetDetail() {
        $order_number = $this->input->post("order_number");
        $this->load->model("OrderModel");
        $data = $this->OrderModel->GetDetailByOrderNumber($order_number);
        if($data === FALSE){
            $data = new \stdClass();
            $data->error = TRUE;
        }else{
            $data->items = $this->OrderModel->GetOrderDetailList($data->order_id);
        }
        echo json_encode($data);
    }
    
    public function Details($order_id){
        $order_number = $this->input->post("order_number");
        $this->load->model("OrderModel");
        $data["order"] = $this->OrderModel->GetDetail($order_id);
        $data["detail"] = $this->OrderModel->GetOrderDetailList($order_id);
        
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->load->model("PaymentModel");
        $data["IPayment"] = $this->PaymentModel;
        
        $content = $this->loadView("member/order_detail", $data);
        $this->render($content);
    }

}