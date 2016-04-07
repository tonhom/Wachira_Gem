<?php

class Member extends MY_Controller {
    
    public function myorder(){
        
    }
    
    public function profile(){
        
    }

    public function signup() {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();

        $this->setNavbar("", ["current" => "signup"]);
        $this->load->model("DateTimeModel");
        $data["months"] = $this->DateTimeModel->getMonthTh();
        $this->render($this->loadView("member/signup", $data));
    }

    public function signupProcess() {
        $this->load->model("MemberModel");
        $data = $this->input->post();
        $data["birthday"] = $data["year"] . "-" . $data["month"] . "-" . $data["date"];
        unset($data["year"]);
        unset($data["month"]);
        unset($data["date"]);
        $result = $this->MemberModel->insert($data);

        if ($result === true) {
            redirect("member/signupComplete");
        } else {
            redirect("member/signupDuplicate");
        }
    }

    public function signupComplete() {
        $this->setNavbar("", ["current" => "signup"]);
        $this->render($this->loadView("member/signup_complete"));
    }

    public function signupDuplicate() {
        $this->setNavbar("", ["current" => "signup"]);
        $content = $this->loadView("member/duplicate");
        $this->render($content);
    }

    public function signin() {
        $this->load->model("MemberModel");
        $data = $this->input->post();
        $user = $this->MemberModel->Identity($data["username"], $data["password"]);
        if ($user != false) {
            $this->session->set_userdata("user", $user);
            redirect("home/");
        } else {
            $this->session->set_flashdata("login_error", true);
            redirect("home/");
        }
    }

    public function signout() {
        $this->session->sess_destroy();
        redirect("home/");
    }

    public function GetMembernfo($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("member");
        return $query->row();
    }

}
