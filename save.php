<?php

session_start();

if (!(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) {
    header('Location:index.php');
    exit;
}

$error = array();
if (trim($_POST['title']) == '') {
    $error['title'] = 'Please input title';
}
if (trim($_POST['url']) == '') {
    $error['url'] = 'Please input url';
}
if (count($error) > 0) {
    echo json_encode($error);
    exit;
}
include 'config.php';
$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$data = $_POST;

setup($data);

buildQuery($data, $fields, $values);

mysqli_query($conn, "INSERT INTO aoramaterial ($fields) VALUES ($values)");

echo 'success';
exit;

function setup(&$data) {
    $data['user_id'] = $_SESSION['user_id'];

    if ($data['variant_specifics_url_change'] == '0') {
        unset($data['variant_specifics_url']);
    }


    if (isset($data['weight_type']) && $data['weight_type'] == 'lbs') {
        if (isset($data['shipping_weight']) && trim($data['shipping_weight']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_weight'])))) {
            $data['shipping_weight'] = round(trim(str_replace(",", "", $data['shipping_weight'])) * 0.45359237, 2);
        }
    }
    if (isset($data['weight_type'])) {
        unset($data['weight_type']);
    }


    if (isset($data['length_type']) && $data['length_type'] == 'inch') {
        if (isset($data['shipping_length']) && trim($data['shipping_length']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_length'])))) {
            $data['shipping_length'] = round(trim(str_replace(",", "", $data['shipping_length'])) * 2.54, 2);
        }
        if (isset($data['shipping_width']) && trim($data['shipping_width']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_width'])))) {
            $data['shipping_width'] = round(trim(str_replace(",", "", $data['shipping_width'])) * 2.54, 2);
        }
        if (isset($data['shipping_height']) && trim($data['shipping_height']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_height'])))) {
            $data['shipping_height'] = round(trim(str_replace(",", "", $data['shipping_height'])) * 2.54, 2);
        }
    }
    if (isset($data['length_type'])) {
        unset($data['length_type']);
    }
    
    unset($data['variant_specifics_url_change']);
}

function buildQuery($data, &$fields, &$values) {
    $fields = $values = '';
    foreach ($data as $key => $value) {
        if (trim($value) != '') {
            $fields .= "$key,";
            if (in_array($key, array('price', 'price_retail', 'shipping_weight', 'shipping_length', 'shipping_width', 'shipping_height'))) {
                $values .= "'" . str_replace(",", "", $value) . "',";
            } else {
                $values .= "'" . str_replace("'", "\'", $value) . "',";
            }
        }
    }
    $fields = rtrim($fields, ',');
    $values = rtrim($values, ',');
}
