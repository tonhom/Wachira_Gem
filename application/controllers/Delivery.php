<?php

class Delivery extends MY_Controller{
    public function index(){
        
        $this->setNavbar("", ["current"=> "delivery"]);
        $this->render($this->loadView("delivery/index"));
    }
}
