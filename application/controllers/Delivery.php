<?php

class Delivery extends MY_Controller{
    public function index(){
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->setNavbar("", ["current"=> "delivery"]);
        $this->render($this->loadView("delivery/index", $data));
    }
}
