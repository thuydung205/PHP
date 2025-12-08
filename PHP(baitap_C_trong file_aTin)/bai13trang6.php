<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>in ra màn hình hình vuông kích thước N*N </title>
</head>
<body>

<h2>hình vuông như sau: </h2>
<?php
$n = 4;
$so = 1;

for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $n; $j++) {
        echo  " $so  ";
        $so++;
    }
 echo "<br>";
}
?>
