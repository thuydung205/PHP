<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>kiểm tra số nhập vào có phải số nguyên tố không? </title>
</head>
<body>

<h2>kết quả: </h2>
<?php
if (isset($_GET["n"])) {
    $n = $_GET["n"];

    if ($n < 2) {
        echo "$n không phải số nguyên tố";
        return;
    }

    $kt = true;

    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            $kt = false;
            break;
        }
    }

    if ($kt) {
        echo "$n là số nguyên tố";
    } else {
        echo "$n không phải số nguyên tố";
    }
}
?>