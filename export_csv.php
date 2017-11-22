<?php
set_time_limit(0);
$columns = array(
    'url',
    'title',
    'price',
    'price_retail',
    'currency',
    'main_image',
    'other_image',
    'main_category',
    'sub_category',
    'sub_sub_category',
    'variant_specifics_url',
    'product_details',
    'shipping_weight',
    'shipping_length',
    'shipping_width',
    'shipping_height',
);
$fields = array_slice($columns, 0, -3);
$fields[] = 'dimension';

header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="data.csv"');
$file = fopen('php://output', 'w');
fputcsv($file, $fields);

include 'config.php';
$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$result = mysqli_query($conn, "SELECT " . implode(',', $columns) . " FROM aoramaterial");
while ($row = mysqli_fetch_array($result)) {
    unset($row[0]);
    foreach ($row as $key => $value) {
        if (!in_array($key, $columns)) {
            unset($row[$key]);
        }elseif(empty($value)) {
            $row[$key] = '';
        }
    }
    $row = array_map("utf8_decode", $row);
    $row['price'] = ($row['price'] != '' ? number_format($row['price'], 2, ".", ",") : '');
    $row['price_retail'] = ($row['price_retail'] != '' ? number_format($row['price_retail'], 2, ".", ",") : '');
    $row['shipping_weight'] = ($row['shipping_weight'] != '' ? number_format($row['shipping_weight'], 2, ".", ",") : '');
    $row['shipping_length'] = ($row['shipping_length'] != '' ? number_format($row['shipping_length'], 2, ".", ",").' x ' : '');
    $row['shipping_width'] = ($row['shipping_width'] != '' ? number_format($row['shipping_width'], 2, ".", ",").' x ' : '');
    $row['shipping_height'] = ($row['shipping_height'] != '' ? number_format($row['shipping_height'], 2, ".", ",") : '');
    $row['dimension'] = rtrim($row['shipping_length'].$row['shipping_width'].$row['shipping_height'],' x');
    unset($row['shipping_length']);
    unset($row['shipping_width']);
    unset($row['shipping_height']);
    fputcsv($file, $row);
}
fclose($file);