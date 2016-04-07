<?php

class Home extends MY_Controller{
    public function index(){
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->load->model("ProductModel");
        $data["bestSeller"] = $this->ProductModel->GetBestSeller();
        
        $this->setNavbar("", ["current"=> "home"]);
        $this->render($this->loadView("home/homepage", $data));
    }
    
    public function login(){
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->setNavbar("", ["current"=> "home"]);
        $this->render($this->loadView("home/login", $data));
    }
}
