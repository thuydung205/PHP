<?php
$thang = $_GET['thang'] ?? 1;
if ($thang >= 1 && $thang <= 3) {
    echo "Quý I";
} elseif ($thang >= 4 && $thang <= 6) {
    echo "Quý II";
} elseif ($thang >= 7 && $thang <= 9) {
    echo "Quý III";
} elseif ($thang >= 10 && $thang <= 12) {
    echo "Quý IV";
} else {
    echo "Tháng không hợp lệ";
}
?>
