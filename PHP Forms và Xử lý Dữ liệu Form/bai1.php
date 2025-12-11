<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>in ra màn hình kết quả đơn giản</title> </title>
</head>
<body>
    
    <h2>Tinh Toan Đơn Giản</h2>
    <form method="post">
<label> số thứ nhất: </label>
<input type="number" name="hehehe" required><br><br>

<label> số thứ 2: </label>
<input type="number" name="hahaha" required><br><br>

<label> phép thuật: </label>
<select name="phepthuat">
    <option value="cong"> cộng </option>
    <option value="tru"> trừ </option>
    <option value="nhan"> nhân </option>
    <option value="chia"> chia </option>    
</select>
<button type="submit" name="tính">tính toán </button>
</form>
<?php
if (isset($_POST['tính'])) {
    $so1 = $_POST['hehehe'];
    $so2 = $_POST['hahaha'];
    $phepthuat = $_POST['phepthuat'];
    $kq = "";

    switch ($phepthuat) {
        case "cong":
            $kq = $so1 + $so2;
            echo "kết quả: $so1 + $so2 = $kq";
            break;
        case "tru":
            $kq = $so1 - $so2;
            echo "kết quả: $so1 - $so2 = $kq";
            break;
        case "nhan":
            $kq = $so1 * $so2;
            echo "kết quả: $so1 * $so2 = $kq";
            break;
        case "chia":
            if ($so2 == 0) {
                echo "không thể chia cho 0.";
            } else {
                $kq = $so1 / $so2;
                echo "kết quả: $so1 / $so2 = $kq";
            }
            break;
    }
}
?>