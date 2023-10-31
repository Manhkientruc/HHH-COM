<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HHH-COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="anhtieude">
        <img src="images/anhtieude.png">
    </div>
<div class="menu">
        <li class="logo">
            <a href="index.php">
                <img src="images/Cool_Game_Player_Logo-removebg-preview-removebg-preview.png" class="smaller">
            </a>
        </li>
        <li class="search-box">
            <input type="text" placeholder="Bạn cần tìm gì">
            <button><i class="fas fa-search"></i></button>
        </li>
        <li><a class="menu-link" href="newss.php"><i class="far fa-newspaper"></i>Tin tức công nghệ</a></li>
        <li><a class="menu-link" href=""><i class="fas fa-shopping-cart"></i>Giỏ hàng</a></li>
        <li><a class="menu-link" href=""><i class="fas fa-user"></i>Tài khoản</a></li>
    </div>
    <div class="TuyChon">
        <li><a class="menu-link" href="index.php"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li><a class="menu-link" href="laptopp.php"><i class="fa fa-laptop"></i> Laptop</a></li>
        <li><a class="menu-link" href="PCC.php"><i class="fa fa-desktop"></i> PC</a></li>
        <li><a class="menu-link" href="linhkienn.php"><i class="fa fa-desktop"></i> Linh kiện PC</a></li>
        <li><a class="menu-link" href="mmanhinh.php"><i class="fa fa-desktop"></i> Màn hình</a></li>
    </div>
    <div class="banner1">
        <img src="images/13_Sepa1a3cae0d0c2455a68b9d03efe5451a1.png" class="banner1-smaller">
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hhh";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "SELECT id_mh, hinhanh, ten_mh, giaban FROM tbl_mh";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="grid-container">';
        while ($row = $result->fetch_assoc()) {
            echo '<a href="chi-tiet-mh.php?id=' . $row['id_mh'] . '" class="grid-item">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['hinhanh']) . '">';
            echo '<p>' . $row['ten_mh'] . '</p>';
            echo '<h4>' . number_format($row["giaban"]) . 'đ</h4>';
            echo '<h3></h3>';
            echo '<h1>' . number_format($row["giaban"] - 250000) . 'đ</h1>';
            }
        echo '</div>';
    } else {
        echo "Không có dữ liệu.";
    }
    $conn->close();
?>
    <?php
        include("pages/footer.php");
    ?>
</body>
</html>