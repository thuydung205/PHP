<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>form đăng kí người dùng</title> </title>
</head>
<body>

<h2> </h2>
<form method="get"> 
<label> Tên đăng nhập: </label>
<input type="text" name="tendangnhap" required><br><br>

<label> email: </label>
<input type="email" name="email" required><br><br>

<label> Mật khẩu: </label>
<input type="password" name="matkhau" required minlength="kí tự nhỏ nhất là 6"><br><br>

<label> xác nhận mật khẩu: </label>
<input type="password" name="xnmatkhau" required><br><br>
<label> ngày sinh</label>
<input type="date" name="ngaysinh" required><br><br>
<label> giới tính: </label>
<input type="radio" name="gioitinh" value="nam" required> Nam
<input type="radio" name="gioitinh" value="nu" required> Nữ<br><br>
<input type="radio" name="gioitinh" value="khac" required> Khác<br><br>

<label> sở thích: </label>
<input type="checkbox" name="sothich[]" value="docsach"> đọc sách
<input type="checkbox" name="sothich[]" value="nghenhac"> nghe nhạc
<input type="checkbox" name="sothich[]" value="thethao"> thể thao
<input type="checkbox" name="sothich[]" value="dulich"> du lịch
<br><br>

<label> thành phố: </label>
<select name="thanhpho" required>
    <option value="hn"> Hà Nội </option>
    <option value="hcm"> Hồ Chí Minh </option>
    <option value="dn"> Đà Nẵng </option>
    <option value="hp"> Hải Phòng </option>
   <button type="submit">Đăng ký</button>
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST["hoten"];
    $email = $_POST["email"];
    $mk = $_POST["matkhau"];
    $xnmk = $_POST["xnmatkhau"];
    $ngaysinh = $_POST["ngaysinh"];
    $gioitinh = $_POST["gioitinh"] ?? "";
    $sothich = $_POST["sothich"] ?? [];
    $thanhpho = $_POST["thanhpho"];

    $loi = "";

    if ($hoten == "" || $email == "" || $mk == "" || $xnmk == "") {
        $loi = "Vui lòng nhập đầy đủ thông tin!";
    }
  
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $loi = "Email không đúng định dạng!";
    }
    elseif (strlen($mk) < 6) {
        $loi = "Mật khẩu phải từ 6 ký tự!";
    }
   
    elseif ($mk != $xnmk) {
        $loi = "Mật khẩu xác nhận không khớp!";
    }

    elseif ($ngaysinh != "") {
        $tuoi = date("Y") - date("Y", strtotime($ngaysinh));
        if ($tuoi < 18) {
            $loi = "Bạn chưa đủ 18 tuổi!";
        }
    }


    if ($loi != "") {
        echo "<b style='color:red'>$loi</b>";
    } 
    else {
        echo "<h3>Đăng ký thành công!</h3>";
        echo "Họ tên: $hoten <br>";
        echo "Email: $email <br>";
        echo "Giới tính: $gioitinh <br>";
        echo "Ngày sinh: $ngaysinh <br>";
        echo "Sở thích: " . implode(", ", $sothich) . "<br>";
        echo "Thành phố: $thanhpho <br>";
    }
}
?>