<?php

function getValDefault($data, $key, $default = "") {
    if (is_object($data)) {
        if (isset($data->$key)) {
            return $data->$key;
        } else {
            return $default;
        }
    } else if (is_array($data)) {
        if (isset($data[$key])) {
            return $data[$key];
        } else {
            return $default;
        }
    } else {
        return $default;
    }
}

function order_status($code) {
    if ($code == 1) {
        return "รอการชำระเงิน";
    } else if ($code == 2) {
        return "รอการจัดส่ง";
    } else if ($code == 3) {
        return "จัดส่งแล้ว";
    } else if ($code == 4) {
        return "ไม่ชำระเงินภายใน 7 วัน";
    } else {
        return $code;
    }
}
