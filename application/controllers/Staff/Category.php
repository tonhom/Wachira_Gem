<?php

class Category extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->requireAdmin();
        $this->setNavbar("partial/admin_nav", ["current" => "category"]);
        $this->emptyFooter();
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
        if (!empty($requestModel["category_id"])) {
            // save
            $id = $requestModel["category_id"];
            unset($requestModel["category_id"]);
            $this->session->set_flashdata("success", "ระบบได้บันทึกข้อมูลประเภทสินค้าแล้ว");
            $this->CategoryModel->Update($id, $requestModel);
        } else {
            // insert
            $this->session->set_flashdata("success", "ระบบได้เพิ่มประเภทสินค้าแล้ว");
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
        $this->session->set_flashdata("success", "ระบบได้ลบข้อมูลประเภทสินค้าแล้ว");
        redirect("staff/category");
    }

}
