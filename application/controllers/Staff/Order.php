<?php

class Order extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->setNavbar("partial/admin_nav", ["current"=> "home"]);
        $this->emptyFooter();
    }

    public function GetDetail() {
        $order_id = $this->input->post("order_id");
        $this->load->model("OrderModel");
        $data = $this->OrderModel->GetDetail($order_id);
        if($data === FALSE){
            $data = new \stdClass();
            $data->error = TRUE;
        }else{
            $data->items = $this->OrderModel->GetOrderDetailList($data->order_id);
        }
        echo json_encode($data);
    }
    
    public function Detail($order_id){
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
        
        $content = $this->loadView("staff/order_detail", $data);
        $this->render($content);
    }
    
    public function printOrder($order_id){
        $this->load->model("OrderModel");
        $data["order"] = $this->OrderModel->GetDetail($order_id);
        $data["detail"] = $this->OrderModel->GetOrderDetailList($order_id);
        
        $this->load->model("DateTimeModel");
        $data["DateTime"] = $this->DateTimeModel;
        
        $this->load->model("PaymentModel");
        $data["IPayment"] = $this->PaymentModel;
        
        $this->load->model("MemberModel");
        $data["IMember"] = $this->MemberModel;
        
        $content = $this->loadView("staff/order_print", $data);
        echo $content;
    }

}
