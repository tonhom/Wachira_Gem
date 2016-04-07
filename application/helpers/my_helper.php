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
