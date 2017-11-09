<?php
if (!(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) {
    header('Location:index.php');
    exit;
}

$error = array();
if (trim($_POST['title']) == '') {
    $error['title'] = 'Please input title';
}
if (trim($_POST['url']) == '') {
    $error['url'] = 'Please input title';
}
if (count($error) > 0) {
    echo json_encode($error);
    exit;
}
$conn = mysqli_connect('localhost', 'root', '', 'aoramaterial');
$data = $_POST;
$data['user_id'] = 1;
$sql = 'INSERT INTO aoramaterial ';
$fields = "(";
$values = '(';
$weight_type = $data['weight_type'];
if ($data['weight_type'] == 'lbs') {
    if (trim($data['shipping_weight']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_weight'])))) {
        $data['shipping_weight'] = round(trim(str_replace(",", "", $data['shipping_weight'])) * 0.45359237, 2);
    }
}
unset($data['weight_type']);

if ($data['length_type'] == 'inch') {
    if (trim($data['shipping_length']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_length'])))) {
        $data['shipping_length'] = round(trim(str_replace(",", "", $data['shipping_length'])) * 2.54, 2);
    }
    if (trim($data['shipping_width']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_width'])))) {
        $data['shipping_width'] = round(trim(str_replace(",", "", $data['shipping_width'])) * 2.54, 2);
    }
    if (trim($data['shipping_height']) != '' && is_numeric(trim(str_replace(",", "", $data['shipping_height'])))) {
        $data['shipping_height'] = round(trim(str_replace(",", "", $data['shipping_height'])) * 2.54, 2);
    }
}
unset($data['length_type']);

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
$fields .= ")";
$values .= ")";

mysqli_query($conn, "INSERT INTO aoramaterial $fields VALUES $values");

echo 'success';
exit;
