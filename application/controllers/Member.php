<?php

class Member extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->setNavbar("", ["current"=> ""]);
    }

    public function myorder() {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->load->model("DateTimeModel");
        $data["DateTime"] = $this->DateTimeModel;
        
        $this->load->model("PaymentModel");
        $data["IPayment"] = $this->PaymentModel;
        
        $this->load->model("OrderModel");
        $data["orders"] = $this->OrderModel->GetMyOrder($this->session->userdata("user")->member_id);
        
        $content = $this->loadView("member/orders", $data);
        $this->render($content);
    }
    
    public function save(){
        $data = $this->input->post();
        $this->load->model("MemberModel");
        $data["member_birthday"] = $data["year"] . "-" . $data["month"] . "-" . $data["date"];
        unset($data["year"]);
        unset($data["month"]);
        unset($data["date"]);
        if(!empty($data["new_password"])){
            $data["member_password"] = $data["new_password"];
        }
        unset($data["new_password"]);
        $this->MemberModel->update($this->session->userdata("user")->member_id, $data);
        $this->session->set_flashdata("success", TRUE);
        redirect("member/profile");
    }

    public function profile() {
        $this->load->model("DateTimeModel");
        $data["months"] = $this->DateTimeModel->getMonthTh();
        
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        
        $this->load->model("MemberModel");
        $data["data"] = $this->MemberModel->checkExistUsername($this->session->userdata("user")->member_username);
        $this->render($this->loadView("member/edit_profile", $data));
    }
    
    public function checkDuplicate(){
        $username = $this->input->post("username");
        $this->load->model("MemberModel");
        $result = $this->MemberModel->checkExistUsername($username);
        $response = new stdClass();
        if($result === FALSE){
            $response->duplicate = FALSE;
        }else{
            $response->duplicate = TRUE;
        }
        echo json_encode($response);
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
        $data["member_birthday"] = $data["year"] . "-" . $data["month"] . "-" . $data["date"];
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
        $user = $this->MemberModel->Identity($data["member_username"], $data["member_password"]);
        if ($user != false) {
            $this->session->set_userdata("user", $user);
            $forceRedirect = $this->session->userdata("force_to_cart_after_signin");
            if ($forceRedirect == "") {
                redirect("home/");
            } else {
                $this->session->unset_userdata("force_to_cart_after_signin");
                if ($forceRedirect === "cart") {
                    redirect("cart/orderDetail");
                } else if ($forceRedirect === "payment") {
                    redirect("payment/confirm");
                }
            }
        } else {
            $this->session->set_flashdata("login_error", true);
            redirect("home/login");
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
