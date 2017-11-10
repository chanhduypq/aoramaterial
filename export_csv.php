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
    'variant_specifics_url',
    'product_details',
    'shipping_weight',
    'shipping_length',
    'shipping_width',
    'shipping_height',
);
$conn = mysqli_connect('localhost', 'root', '', 'aoramaterial');
$result = mysqli_query($conn, "SELECT " . implode(',', $columns) . " FROM aoramaterial");
$file = fopen("data.csv", "w");
fputcsv($file, $columns);
while ($row = mysqli_fetch_array($result)) {
    foreach ($row as $key => $value) {
        if (!in_array($key, $columns)) {
            unset($row[$key]);
        }
    }
    unset($row[0]);
    $row = array_map("utf8_decode", $row);
    $row['price'] = ($row['price'] != '' ? number_format($row['price'], 0, ".", ",") : '');
    $row['price_retail'] = ($row['price_retail'] != '' ? number_format($row['price_retail'], 0, ".", ",") : '');
    $row['shipping_weight'] = ($row['shipping_weight'] != '' ? number_format($row['shipping_weight'], 2, ".", ",") : '');
    $row['shipping_length'] = ($row['shipping_length'] != '' ? number_format($row['shipping_weight'], 2, ".", ",") : '');
    $row['shipping_width'] = ($row['shipping_width'] != '' ? number_format($row['shipping_weight'], 2, ".", ",") : '');
    $row['shipping_height'] = ($row['shipping_height'] != '' ? number_format($row['shipping_weight'], 2, ".", ",") : '');
    fputcsv($file, $row);
}
fclose($file);

$fileName = 'data.csv';

$seek_start = 0;
$seek_end = -1;
$data_section = false;
$buffsize = 2048;
$maxSpeed = 100;

if (isset($_SERVER['HTTP_RANGE'])) {
    $seek_range = substr($_SERVER['HTTP_RANGE'], strlen('bytes='));

    $range = explode('-', $seek_range);

    if ($range[0] > 0) {
        $seek_start = intval($range[0]);
    }
    if ($range[1] > 0) {
        $seek_end = intval($range[1]);
    }

    $data_section = true;
}

ob_end_clean();
$old_status = ignore_user_abort(true);
set_time_limit(0);

$size = filesize($fileName);

if ($seek_start > ($size - 1)) {
    $seek_start = 0;
}

$res = fopen($fileName, 'rb');
if ($seek_start) {
    fseek($res, $seek_start);
}
if ($seek_end < $seek_start) {
    $seek_end = $size - 1;
}

if (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE")) {
    $fileName = rawurlencode($fileName);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
}

header('Content-Type: application/octet-stream');
/**
 * 
 */
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Last-Modified: ' . date('D, d M Y H:i:s \G\M\T', filemtime($fileName)));

if ($data_section) {
    header("HTTP/1.0 206 Partial Content");
    header("Status: 206 Partial Content");
    header('Accept-Ranges: bytes');
    header("Content-Range: bytes $seek_start-$seek_end/$size");
    header("Content-Length: " . ($seek_end - $seek_start + 1));
} else {
    header('Content-Length: ' . $size);
}

while (!( connection_aborted() || connection_status() == 1) && !feof($res)) {
    print(fread($res, $buffsize * $maxSpeed));

    flush();
    @ob_flush();
//            sleep(1);
}

fclose($res);

ignore_user_abort($old_status);
set_time_limit(ini_get('max_execution_time'));

