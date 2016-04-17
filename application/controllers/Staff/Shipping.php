<?php

class Shipping extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->requireAdmin();
        $this->setNavbar("partial/admin_nav", ["current" => "shipping"]);
        $this->emptyFooter();
    }

    public function index() {
        $this->load->model("DateTimeModel");
        $data["DateTime"] = $this->DateTimeModel;
        
        $this->load->model("OrderModel");
        if ($this->input->get("order_number") != "") {
            $data["shipping"] = $this->OrderModel->SearchByOrderNumber($this->input->get("order_number"));
        } else {
            $data["shipping"] = $this->OrderModel->GetShiped();
        }
        $data["order_number"] = $this->input->get("order_number");
        $viewData = $this->loadView("staff/shipping", $data);
        $this->render($viewData);
    }
    
    public function ship($order_id) {
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
        
        $content = $this->loadView("staff/shipping_detail", $data);
        $this->render($content);
    }
    
    public function shiped($order_id){
        $this->load->model("OrderModel");
        $this->OrderModel->Shiped($order_id);
        redirect("staff/shipping/ship/{$order_id}");
    }

}
