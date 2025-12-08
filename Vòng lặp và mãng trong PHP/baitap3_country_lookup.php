<?php

$country_code = $_GET['country_code'] ?? "";

$countries = array(
    "vietnam" => "Cộng hòa Xã hội Chủ nghĩa Việt Nam",
    "thailan" => "Vương quốc Thái Lan",
    "singapore" => "Cộng hòa Singapore",
    "nhatban" => "Nhật Bản"
);

if ($country_code == "") {
    echo "Khong co ma quoc gia.";
} else {

    if (isset($countries[$country_code])) {
        echo "Ten quoc gia: " . $countries[$country_code];
    } else {
        echo "Khong tim thay quoc gia voi ma nay.";
    }

}

?>
