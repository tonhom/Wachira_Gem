<?php

class Payment extends MY_Controller {

    public function confirm() {
        $this->load->model("DateTimeModel");
        $data["months"] = $this->DateTimeModel->getMonthTh();

        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();

        $this->setNavbar("", ["current" => "confirm_payment"]);
        $this->render($this->loadView("payment/confirm_payment", $data));
    }

    public function instruction() {
        $this->load->model("CategoryModel");
        $data["category"] = $this->CategoryModel->getAll();
        $this->setNavbar("", ["current" => "payment_instruction"]);
        $this->render($this->loadView("payment/instruction", $data));
    }

    public function save() {
        $data = $this->input->post();

        $model["order_number"] = $data["order_number"];
        $model["full_name"] = $data["full_name"];
        $model["email"] = $data["email"];
        $model["phone"] = $data["phone"];
        $model["bank"] = $data["bank"];
        $model["branch"] = $data["branch"];
        $model["amount"] = $data["amount"];
        $model["remark"] = $data["remark"];
        $model["time_transfer"] = $data["time_transfer"];
        $model["date_transfer"] = "{$data["paid_year"]}-{$data["paid_month"]}-{$data["paid_date"]}";

        $this->load->model("PaymentModel");
        $this->db->trans_begin();
        $this->PaymentModel->Insert($model);
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata("save_error", true);
            $this->db->trans_rollback();
        } else {
            $this->session->set_flashdata("save_success", true);
            $this->db->trans_commit();
        }
        redirect("payment/confirm");
    }

}
