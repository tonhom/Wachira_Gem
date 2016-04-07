<?php

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->setNavbar("partial/admin_nav", ["current" => "home"]);
    }

    public function index() {
        $this->load->model("OrderModel");
        $data["lastOrder"] = $this->OrderModel->GetLastOrder();
        
        $this->load->model("PaymentModel");
        $data["lastPayment"] = $this->PaymentModel->GetLastPayment();
        
        $this->load->model("MemberModel");
        $data["instantMember"] = $this->MemberModel;
        
        $viewData = $this->loadView("staff/main", $data);
        $this->render($viewData);
    }

}
