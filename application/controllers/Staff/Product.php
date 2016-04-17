<?php

class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->requireAdmin();
        $this->setNavbar("partial/admin_nav", ["current" => "product"]);
        $this->emptyFooter();
    }

    public function index() {
        $this->collection();
    }

    public function collection($page = 1) {
        $filter = $this->input->get();
        $filter["currentPage"] = $page;
        $this->load->model("ProductModel");
        $data["filter"] = $filter;
        $data["products"] = $this->ProductModel->GetByLimit($page, 15);
        $data["IProduct"] = $this->ProductModel;
        $viewData = $this->loadView("staff/products_list", $data);
        $this->render($viewData);
    }

    public function add() {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();

        $viewData = $this->loadView("staff/product_form", $data);
        $this->render($viewData);
    }

    public function edit($id) {
        $this->load->model("ProductModel");
        $data["info"] = $this->ProductModel->GetById($id);

        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();

        $viewData = $this->loadView("staff/product_form", $data);
        $this->render($viewData);
    }

    public function remove($id) {
        $this->load->model("ProductModel");
        $this->ProductModel->RemoveById($id);
        $this->session->set_flashdata("success", 3);
        redirect("staff/product/");
    }

    // call from FORM submit
    public function save() {
        $this->load->model("ProductModel");
        $data = $this->input->post();
        if ($data["product_id"] == "") {
            // insert
            $id = $this->ProductModel->Insert($data);
            $this->session->set_flashdata("success", 1);
        } else {
            // save
            $id = $data["product_id"];
            unset($data["product_id"]);
            $this->ProductModel->Update($id, $data);
            $this->session->set_flashdata("success", 2);
        }
        redirect("staff/product/");
    }

}
