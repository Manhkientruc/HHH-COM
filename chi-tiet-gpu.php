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
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hhh";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT id_gpu, hinhanh, ten_gpu, giaban, hang, model, dohoa, thongtin FROM tbl_gpu WHERE id_gpu = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="laptop-details">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['hinhanh']) . '">';
            echo '<div class="details-wrapper">';
            echo '<h2>' . $row['ten_gpu'] . '</h2>';
            echo '<h3></h3>';
            echo 'Giá : <h1 class="editchut">' . number_format($row["giaban"] - 500000) . 'đ</h1><br>';
            echo '<h1>THÔNG SỐ KỸ THUẬT : </h1>';
            echo '<h3 class="light-grey">Hãng:</h3>';
            echo '<p class="light-grey">' . $row['hang'] . '</p>';
            echo '<h3>Model:</h3>';
            echo '<p>' . $row['model'] . '</p>';
            echo '<h3 class="light-grey">Xử lý Đồ họa:</h3>';
            echo '<p class="light-grey">' . $row['dohoa'] . '</p>';
            echo '</div>';
            echo '<div class="laptop-details">';
            echo '<div class="details-wrapper">';
            echo '<h3>Thông tin:</h3>';
            echo '<p>' . $row['thongtin'] . '</p>';
            echo '</div>';
        } else {
            echo "Không tìm thấy thông tin chi tiết cho linh kiện này.";
        }
    } else {
        echo "Không tìm thấy ID của linh kiện.";
    }

    $conn->close();
?>
    <?php
        include("pages/footer.php");
    ?>
</body>
</html>