<?php

class Contact extends MY_Controller {

    public function index() {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->setNavbar("", ["current" => "contact"]);
        $this->render($this->loadView("contact/contact", $data));
    }

    public function send() {
        $data = $this->input->post();
        $this->load->model("ContactModel");
        $this->ContactModel->insert($data);
        $this->session->set_flashdata("send_success", TRUE);
        redirect("contact/");
    }

}
