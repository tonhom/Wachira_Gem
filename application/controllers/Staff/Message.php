<?php

class Message extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->requireAdmin();
        $this->setNavbar("partial/admin_nav", ["current" => "message"]);
        $this->emptyFooter();
    }
    
    public function index(){
        $this->load->model("ContactModel");
        $data["messages"] = $this->ContactModel->GetAll();
        $viewData = $this->loadView("staff/messages", $data);
        $this->render($viewData);
    }
    
    public function view($id){
        $this->load->model("ContactModel");
        $data["message"] = $this->ContactModel->GetDetail($id);
        $viewData = $this->loadView("staff/message_view", $data);
        $this->render($viewData);
    }
    
    public function delete($id){
        $this->load->model("ContactModel");
        $this->ContactModel->Delete($id);
        $this->session->set_flashdata("success", TRUE);
        redirect("staff/message");
    }
}
