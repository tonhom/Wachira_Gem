<?php

class DateTimeModel extends CI_Model {

    public function getMonthTh() {
        return ["01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน", "05" => "พฤษภาคม", "06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม", "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม"];
    }

    public function ToThaiDate($raw, $withTime = false, $timeNewLine = FALSE) {
        $temp = explode(" ", $raw);
        $temp2 = explode("-", $temp[0]);
        $month = array(
            "01" => "มกราคม",
            "02" => "กุมภาพันธ์",
            "03" => "มีนาคม",
            "04" => "เมษายน",
            "05" => "พฤษภาคม",
            "06" => "มิถุนายน",
            "07" => "กรกฎาคม",
            "08" => "สิงหาคม",
            "09" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        if (!$withTime){
            return $temp2[2] . " " . $month[$temp2[1]] . " " . ($temp2[0] * 1 + 543);
        }
        else{
            return $temp2[2] . " " . $month[$temp2[1]] . ($timeNewLine == TRUE ? "<br />": " ") . ($temp2[0] * 1 + 543) . " เวลา " . $temp[1];
        }
    }

}
