<?php
$nam = $_GET['nam'] ?? 2000;
$thang = $_GET['thang'] ?? 1;

if (($nam % 4 == 0 && $nam % 100 != 0) || ($nam % 400 == 0)) {
    $nhuan = true;
} else {
    $nhuan = false;
}

if ($thang==1 || $thang==3 || $thang==5 || $thang==7 || $thang==8 || $thang==10 || $thang==12) {
    $songay = 31;
} elseif ($thang==4 || $thang==6 || $thang==9 || $thang==11) {
    $songay = 30;
} elseif ($thang==2) {
    $songay = $nhuan ? 29 : 28;
} else {
    $songay = 0;
}

if ($songay>0) {
    echo "Tháng $thang năm $nam có $songay ngày";
} else {
    echo "Tháng không hợp lệ";
}
?>

