<?php
require_once __DIR__ . '\..\conf\main.php';
require_once VENDOR_DIR . 'funcImgResize.php';
require_once ENGINE_DIR . 'gallery.php';
$dbConfig = include CONF_DIR . "db.php";
$menu =[
    "Главная",
    "Каталог",
    "Новости",
];

$conn = mysqli_connect($dbConfig['host'],
    $dbConfig['login'],
    $dbConfig['password'],
    $dbConfig['db_name']
);

$imagesDir = PUBLIC_DIR . "./img/";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['my_file'])) {
        if (!file_exists($imagesDir)) {
            mkdir($imagesDir);
        }

        $originalName = $_FILES['my_file']['name'];
        $filename = $imagesDir . $originalName;
        $fileSize = $_FILES['my_file']['size'];
        move_uploaded_file(
            $_FILES['my_file']['tmp_name'],
            $filename
        );
        img_resize($filename, $imagesDir . "/small/" . $originalName, 200, 150);

        $sql = "INSERT INTO table_name(name, path, saze) VALUES ('{$originalName}','{$originalName}',{$fileSize})";
        mysqli_query($conn, $sql);
    }


    header("location: /public");
    exit;
}
    $sql = "SELECT * FROM table_name ";
$files = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);




//$files = getGalleryFiles($imagesDir);

include VIEWS_DIR . "menu.php";
include VIEWS_DIR . "upload_form.php";
include VIEWS_DIR . "galer.php";