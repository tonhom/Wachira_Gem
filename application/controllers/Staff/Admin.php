<?php

class Admin extends MY_Controller{
    public function signin(){
        $this->setNavbar("partial/admin_nav", ["current" => "home"]);
        $this->emptyFooter();
        $this->render($this->loadView("staff/login"));
    }
    public function signout(){
        $this->session->sess_destroy();
        redirect("Home/");
    }
    
    public function signinProcess(){
        $this->load->model("AdminModel");
        $data = $this->input->post();
        $user = $this->AdminModel->Identity($data["admin_username"], $data["admin_password"]);
        if ($user != false) {
            $this->session->set_userdata("admin", $user);
            redirect("Staff/Main");
        } else {
            $this->session->set_flashdata("login_error", true);
            redirect("Staff/Admin/signin");
        }
    }
}
