<?php

$n = $_GET['n'] ?? 0;

$numbers = array();
for ($i = 1; $i <= $n; $i++) {
    $numbers[$i] = $i;
}

echo "Day so: ";
for ($j = 1; $j <= $n; $j++) {
    echo $numbers[$j];
    if ($j != $n) {
        echo ", ";
    }
}
echo "<br>";

$sum = 0;
foreach ($numbers as $value) {
    if ($value % 2 == 0) {
        $sum = $sum + $value;
    }
}

echo "Tong cac so chan la: " . $sum;

?>
