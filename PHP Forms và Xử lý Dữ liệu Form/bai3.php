<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm sản phẩm</title>
</head>
<body>

<h2>Form Tìm Kiếm Sản Phẩm</h2>

<form method="GET">
    Từ khóa:
    <input type="text" name="keyword"><br><br>

    Giá từ:
    <input type="number" name="price_from">
    đến
    <input type="number" name="price_to"><br><br>

    Danh mục:<br>
    <label><input type="checkbox" name="category[]" value="điện thoại"> Điện thoại</label><br>
    <label><input type="checkbox" name="category[]" value="laptop"> Laptop</label><br>
    <label><input type="checkbox" name="category[]" value="phụ kiện"> Phụ kiện</label><br><br>

    Sắp xếp:
    <select name="sort">
        <option value="">-- Không sắp xếp --</option>
        <option value="price_asc">Giá tăng dần</option>
        <option value="price_desc">Giá giảm dần</option>
        <option value="name_asc">Tên A-Z</option>
    </select><br><br>

    <button type="submit">Tìm kiếm</button>
</form>

<hr>

<?php

$products = [
    ['id' => 1, 'name' => 'iPhone 13', 'price' => 20000000, 'category' => 'điện thoại'],
    ['id' => 2, 'name' => 'Samsung Galaxy', 'price' => 15000000, 'category' => 'điện thoại'],
    ['id' => 3, 'name' => 'MacBook Air', 'price' => 30000000, 'category' => 'laptop'],
    ['id' => 4, 'name' => 'Dell XPS', 'price' => 25000000, 'category' => 'laptop'],
    ['id' => 5, 'name' => 'Tai nghe Sony', 'price' => 2000000, 'category' => 'phụ kiện'],
];

if (!empty($_GET)) {

    $keyword = $_GET['keyword'] ?? '';
    $price_from = $_GET['price_from'] ?? '';
    $price_to = $_GET['price_to'] ?? '';
    $categories = $_GET['category'] ?? [];
    $sort = $_GET['sort'] ?? '';

    $results = $products;

    if ($keyword != '') {
        $results = array_filter($results, function($p) use ($keyword) {
            return stripos($p['name'], $keyword) !== false;
        });
    }


    if ($price_from !== '') {
        $results = array_filter($results, fn($p) => $p['price'] >= $price_from);
    }

    if ($price_to !== '') {
        $results = array_filter($results, fn($p) => $p['price'] <= $price_to);
    }


    if (!empty($categories)) {
        $results = array_filter($results, function($p) use ($categories) {
            return in_array($p['category'], $categories);
        });
    }


    if ($sort == "price_asc") {
        usort($results, fn($a, $b) => $a['price'] - $b['price']);
    } elseif ($sort == "price_desc") {
        usort($results, fn($a, $b) => $b['price'] - $a['price']);
    } elseif ($sort == "name_asc") {
        usort($results, fn($a, $b) => strcmp($a['name'], $b['name']));
    }

    echo "<h3>Kết quả tìm kiếm:</h3>";

    if (empty($results)) {
        echo "<p><b>Không tìm thấy sản phẩm nào!</b></p>";
    } else {
        echo "<p><b>Tổng số:</b> " . count($results) . " sản phẩm</p>";

        echo "<table border='1' cellpadding='10'>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                </tr>";

        foreach ($results as $p) {
            echo "<tr>
                    <td>{$p['id']}</td>
                    <td>{$p['name']}</td>
                    <td>" . number_format($p['price']) . " VND</td>
                    <td>{$p['category']}</td>
                </tr>";
        }

        echo "</table>";
    }
}
?>

</body>
</html>


