<?php
date_default_timezone_set ('Asia/Tokyo');

$now = date("YmdHis");
$out = "";
$out .= "===========================================\n";
$out .= $now . "\n";
$out .= "===========================================\n";

$out .= "-------------------------------------------\n";
$out .= "HEADERS\n";
$out .= "-------------------------------------------\n";

foreach (getallheaders() as $key => $value) {
    $out .= "$key : $value\n";
}

$out .= "-------------------------------------------\n";
$out .= "GET\n";
$out .= "-------------------------------------------\n";
foreach ($_GET as $key => $value) {
    $out .= "$key : $value\n";
}

$out .= "-------------------------------------------\n";
$out .= "POST\n";
$out .= "-------------------------------------------\n";
foreach ($_POST as $key => $value) {
    $out .= "$key : $value\n";
}

$out .= "-------------------------------------------\n";
$out .= "FILES\n";
$out .= "-------------------------------------------\n";
if (count($_FILES) > 0) {
    mkdir("logs/$now");
}
foreach ($_FILES as $key => $value) {
    $var_str = var_export($value, true);
    $out .= "$key : $var_str\n";
    $fname = $value['name'];
    move_uploaded_file($value['tmp_name'] , "logs/$now/$fname");
}

$out .= "-------------------------------------------\n";
$out .= "RAW\n";
$out .= "-------------------------------------------\n";
$out .= file_get_contents('php://input');

file_put_contents("logs/log.txt", $out, FILE_APPEND);
