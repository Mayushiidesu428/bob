<?php
$conn = new mysqli('localhost', 'root', '');
$sql = 'CREATE DATABASE IF NOT EXISTS db_bob';
$res = $conn->query($sql);
if ($res) {
    echo "Bảng your_table đã đc tạo." ;
} else {
    echo 'Failed to create database';
}
$conn->select_db('db_bob');

mysqli_set_charset($conn, "utf8");

$sql1 = "CREATE TABLE if not exists Header (
    header_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    header_name VARCHAR(10) NOT NULL,
    header_link VARCHAR(50) NOT NULL,
    header_parent VARCHAR(50) NULL
)";

if ($conn->query($sql1) === TRUE) {
    echo "Bảng Header đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng Header: " . $conn->error . "<br>";
}

$sql2 = "CREATE TABLE if not exists Home_banner (
    HB_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    HB_name VARCHAR(20) NOT NULL,
    HB_img VARCHAR(50) NOT NULL,
    HB_description VARCHAR(100) NULL
)";

if ($conn->query($sql2) === TRUE) {
    echo "Bảng Home_banner đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng Home_banner: " . $conn->error . "<br>";
}

$sql3 = "CREATE TABLE if not exists List_user (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(20) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_phone VARCHAR(10) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_role VARCHAR(10) NOT NULL
)";

if ($conn->query($sql3) === TRUE) {
    echo "Bảng List_user đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng List_user: " . $conn->error . "<br>";
}

$sql4 = "CREATE TABLE if not exists Nations (
    nations_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nations_name VARCHAR(50) NOT NULL
)";

if ($conn->query($sql4) === TRUE) {
    echo "Bảng Nations đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng Nations: " . $conn->error . "<br>";
}

$sql5 = "CREATE TABLE if not exists Regions (
    regions_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    regions_name VARCHAR(50) NOT NULL
)";

if ($conn->query($sql5) === TRUE) {
    echo "Bảng Regions đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng Regions: " . $conn->error . "<br>";
}

$sql6 = "CREATE TABLE if not exists Beaches (
    beaches_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    regions_id INT NOT NULL,
    nations_id INT NOT NULL,
    beaches_name VARCHAR(50) NOT NULL,
    beaches_img VARCHAR(255) NOT NULL,
    beaches_img_array VARCHAR(255) NOT NULL,
    beaches_rating INT NULL,
    beaches_address VARCHAR(255) NOT NULL,
    beaches_longitude DECIMAL(9,6) NOT NULL,
    beaches_latitude DECIMAL(8,6) NOT NULL,
    beaches_description TEXT NOT NULL,
    beaches_docx_link VARCHAR(255) NOT NULL,
    FOREIGN KEY (regions_id) REFERENCES Regions(regions_id),
    FOREIGN KEY (nations_id) REFERENCES Nations(nations_id)
)";

if ($conn->query($sql6) === TRUE) {
    echo "Bảng Beaches đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng Beaches: " . $conn->error . "<br>";
}

$sql7 = "CREATE TABLE if not exists List_transport (
    transport_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    transport_name VARCHAR(50) NOT NULL,
    transport_description TEXT NOT NULL
)";

if ($conn->query($sql7) === TRUE) {
    echo "Bảng List_transport đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng List_transport: " . $conn->error . "<br>";
}

$sql8 = "CREATE TABLE if not exists Booktours (
    booktours_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    transport_id INT NOT NULL,
    beaches_id INT NOT NULL,
    booktours_name VARCHAR(20) NOT NULL,
    booktours_place_from VARCHAR(50) NOT NULL,
    booktours_place_to VARCHAR(50) NOT NULL,
    booktours_time VARCHAR(50) NOT NULL,
    booktours_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (transport_id) REFERENCES List_transport(transport_id),
    FOREIGN KEY (beaches_id) REFERENCES Beaches(beaches_id)
)";

if ($conn->query($sql8) === TRUE) {
    echo "Bảng Booktours đã được tạo thànhcông.<br>";
} else {
    echo "Lỗi khi tạo bảng Booktours: " . $conn->error . "<br>";
}

$sql9 = "CREATE TABLE if not exists Feedbacks (
    feedbacks_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    beaches_id INT NOT NULL,
    feedbacks_created_at TIMESTAMP NOT NULL,
    feedbacks_rating INT NULL,
    user_id INT NOT NULL,
    feedbacks_content VARCHAR(100) NOT NULL,
    FOREIGN KEY (beaches_id) REFERENCES Beaches(beaches_id),
    FOREIGN KEY (user_id) REFERENCES List_user(user_id)
)";

if ($conn->query($sql9) === TRUE) {
    echo "Bảng Feedbacks đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng Feedbacks: " . $conn->error . "<br>";
}

$sql10 = "CREATE TABLE if not exists Gallery (
    gallery_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    beaches_id INT NOT NULL,
    regions_id INT NOT NULL,
    nation_id INT NOT NULL,
    gallery_img_beach_array VARCHAR(100) NOT NULL,
    gallery_img_shop_array VARCHAR(100) NOT NULL,
    gallery_img_event_array VARCHAR(100) NOT NULL,
    gallery_img_season_array VARCHAR(100) NOT NULL,
    gallery_img_local_d_array VARCHAR(100) NOT NULL,
    FOREIGN KEY (beaches_id) REFERENCES Beaches(beaches_id),
    FOREIGN KEY (regions_id) REFERENCES Regions(regions_id),
    FOREIGN KEY (nation_id) REFERENCES Nations(nations_id)
)";

if ($conn->query($sql10) === TRUE) {
    echo "Bảng Gallery đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng Gallery: " . $conn->error . "<br>";
}

$sql11 = "CREATE TABLE if not exists QnA (
    QnA_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    QnA_id_question VARCHAR(100) NOT NULL,
    QnA_id_answer VARCHAR(100) NOT NULL
)";

if ($conn->query($sql11) === TRUE) {
    echo "Bảng QnA đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng QnA: " . $conn->error . "<br>";
}

$conn->close();
?>