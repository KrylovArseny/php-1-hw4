<?php
require_once __DIR__ . '\..\conf\main.php';
require_once VENDOR_DIR . 'funcImgResize.php';
require_once ENGINE_DIR . 'gallery.php';

$menu =[
    "Главная",
    "Каталог",
    "Новости",
];



$imagesDir = PUBLIC_DIR . "./img/";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_FILES['my_file'])){
        if(!file_exists($imagesDir)){
            mkdir($imagesDir);
        }
    $filename = $imagesDir . $_FILES['my_file']['name'];
        move_uploaded_file(
            $_FILES['my_file']['tmp_name'],
            $filename
        );
        img_resize($filename, $imagesDir . "/small/" . $_FILES['my_file']['name'], 200, 150);
    }


    header("location: /public");
    exit;
}
$files = getGalleryFiles($imagesDir);

include VIEWS_DIR . "menu.php";
include VIEWS_DIR . "upload_form.php";
include VIEWS_DIR . "galer.php";