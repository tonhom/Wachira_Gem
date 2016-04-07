<?php

class Product  extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->setNavbar("", ["current"=> "product"]);
    }
    public function index(){
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->load->model("ProductModel");
        $data["products"] = $this->ProductModel->GetRecent();
        
        $this->render($this->loadView("product/items", $data));
    }
    
    public function view($id){
        $this->load->model("CategoryModel");
        $data["categoryDict"] = $this->CategoryModel->GetAlToDictionary();
        
        $this->load->model("ProductModel");
        $data["product"] = $this->ProductModel->GetById($id);
        $this->render($this->loadView("product/view", $data));
    }
    
    public function category($id){
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->load->model("ProductModel");
        $data["products"] = $this->ProductModel->GetByCategory($id);
        
        $this->render($this->loadView("product/items", $data));
    }
    
    public function search(){
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->load->model("ProductModel");
        $data["products"] = $this->ProductModel->Search($this->input->post("q"));
        
        $this->render($this->loadView("product/items", $data));
    }
}
