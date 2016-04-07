<?php

class Category extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->setNavbar("partial/admin_nav", ["current" => "category"]);
    }

    public function index() {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        $data["model"] = $this->CategoryModel;
        $viewData = $this->loadView("staff/category", $data);
        $this->render($viewData);
    }

    public function save() {
        $this->load->model("CategoryModel");
        $requestModel = $this->input->post();
        if (!empty($requestModel["id"])) {
            // save
            $id = $requestModel["id"];
            unset($requestModel["id"]);
            $this->CategoryModel->Update($id, $requestModel);
        } else {
            // insert
            $this->CategoryModel->Insert($requestModel);
        }
        redirect("staff/category");
    }

    public function edit($id) {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        $data["model"] = $this->CategoryModel;
        $data["dataEdit"] = $this->CategoryModel->GetData($id);
        $viewData = $this->loadView("staff/category", $data);
        $this->render($viewData);
    }

    public function remove($id) {
        $this->load->model("CategoryModel");
        $this->CategoryModel->Remove($id);
        redirect("staff/category");
    }

}