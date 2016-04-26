<?php

class Payment extends MY_Controller {

    public function confirm($order_id = "") {
        $this->load->model("DateTimeModel");
        $data["months"] = $this->DateTimeModel->getMonthTh();

        $data["order_id"] = $order_id;
        if(!empty($order_id)){
            $this->load->model("OrderModel");
            $data["order_detail"] = $this->OrderModel->GetDetail($order_id);
            $data["order_list"] = $this->OrderModel->GetOrderDetailList($data["order_detail"]->order_id);
        }

        $this->setNavbar("", ["current" => "confirm_payment"]);
        $this->render($this->loadView("payment/confirm_payment", $data));
    }

    public function instruction() {
        $this->setNavbar("", ["current" => "payment_instruction"]);
        $this->render($this->loadView("payment/instruction"));
    }

    public function save() {
        $data = $this->input->post();

        if ($this->session->userdata("user") != "") {
            $field_name = "payment_evidence";
            if ($_FILES[$field_name]["size"] > 0) {
                // load uploader
                $config['upload_path'] = './content/slip_transfer/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048'; // 2Megabyte(MB) (default unit is kilobyte)
                $config['max_width'] = '1920';
                $config['max_height'] = '1080';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload($field_name)) {
                    $uploadData = $this->upload->data();
                    $model["payment_evidence"] = $uploadData["file_name"];
                } else {
                    $this->load->model("DateTimeModel");
                    $dataView["months"] = $this->DateTimeModel->getMonthTh();

                    $this->load->model("CategoryModel");
                    $dataView["category"] = $this->CategoryModel->getAll();
                    $dataView["error"] = $this->upload->display_errors();
                    $this->setNavbar("", ["current" => "confirm_payment"]);
                    $this->render($this->loadView("payment/confirm_payment", $dataView));
                }
            } else {
                $this->load->model("DateTimeModel");
                $dataView["months"] = $this->DateTimeModel->getMonthTh();

                $this->load->model("CategoryModel");
                $dataView["category"] = $this->CategoryModel->getAll();
                $dataView["error"] = "กรุณาระบุไฟล์สลิป";
                $this->setNavbar("", ["current" => "confirm_payment"]);
                $this->render($this->loadView("payment/confirm_payment", $dataView));
            }

            if (isset($model["payment_evidence"])) {
                $model["order_id"] = $data["order_id"];
                $model["member_id"] = $this->session->userdata("user")->member_id;
                $model["payment_bank"] = $data["payment_bank"];
                $model["payment_branch"] = $data["payment_branch"];
                $model["payment_amount"] = $data["payment_amount"];
                $model["payment_remark"] = $data["payment_remark"];
                $model["payment_time_transfer"] = $data["payment_time_transfer"];
                $model["payment_date_transfer"] = "{$data["paid_year"]}-{$data["paid_month"]}-{$data["paid_date"]}";

                $this->load->model("PaymentModel");
                $this->load->model("OrderModel");
                $this->db->trans_begin();
                $this->PaymentModel->Insert($model);
                // update payment status
                $this->OrderModel->Paid($data["order_id"]);
                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata("save_error", true);
                    $this->db->trans_rollback();
                } else {
                    $this->session->set_flashdata("save_success", true);
                    $this->session->unset_userdata("payment_form_data");
                    $this->db->trans_commit();
                }
                redirect("payment/confirm");
            }
        } else {
            $this->session->set_userdata("payment_form_data", $data);
            $this->session->set_userdata("force_to_cart_after_signin", "payment");
            redirect("home/login");
        }
    }

}
