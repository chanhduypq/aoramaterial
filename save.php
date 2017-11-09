<?php

if (count($_POST) == 0) {
    header("Location:index.php");
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
    if(trim($data['shipping_weight'])!=''&& is_numeric(trim($data['shipping_weight']))){
        $data['shipping_weight'] = round(trim($data['shipping_weight']) * 0.45359237, 2);
    }    
}
unset($data['weight_type']);

if ($data['length_type'] == 'inch') {
    if(trim($data['shipping_length'])!=''&& is_numeric(trim($data['shipping_length']))){
        $data['shipping_length'] = round(trim($data['shipping_length']) * 2.54, 2);
    }  
    if(trim($data['shipping_width'])!=''&& is_numeric(trim($data['shipping_width']))){
        $data['shipping_width'] = round(trim($data['shipping_width']) * 2.54, 2);
    }  
    if(trim($data['shipping_height'])!=''&& is_numeric(trim($data['shipping_height']))){
        $data['shipping_height'] = round(trim($data['shipping_height']) * 2.54, 2);
    }  
}
unset($data['length_type']);

foreach ($data as $key => $value) {
    if (trim($value) != '') {
        $fields .= "$key,";
        $values .= "'" . str_replace("'", "\'", $value) . "',";
    }
}
$fields = rtrim($fields, ',');
$values = rtrim($values, ',');
$fields .= ")";
$values .= ")";

mysqli_query($conn, "INSERT INTO aoramaterial $fields VALUES $values");

header("Location:index.php");

