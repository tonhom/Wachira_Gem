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
        $model["payment_full_name"] = $data["payment_full_name"];
        $model["payment_email"] = $data["payment_email"];
        $model["payment_phone"] = $data["payment_phone"];
        $model["payment_bank"] = $data["payment_bank"];
        $model["payment_branch"] = $data["payment_branch"];
        $model["payment_amount"] = $data["payment_amount"];
        $model["payment_remark"] = $data["payment_remark"];
        $model["payment_time_transfer"] = $data["payment_time_transfer"];
        $model["payment_date_transfer"] = "{$data["paid_year"]}-{$data["paid_month"]}-{$data["paid_date"]}";

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
