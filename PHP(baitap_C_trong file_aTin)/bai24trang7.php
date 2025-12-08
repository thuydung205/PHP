<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>viết chương trình nhập một số bất kì, in ra số đảo ngược của số đó? </title>
</head>
<body>

<h2>kết quả: </h2>
<?php
if (isset($_GET["n"])) {
    $n = $_GET["n"];
    $daonguoc = ""; 

    for ($i =strlen($n) - 1; $i >= 0; $i--) {
        $daonguoc .= $n[$i];
    }

    echo "Số đảo ngược: $daonguoc";
}
?>


