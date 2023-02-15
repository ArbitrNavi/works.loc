<?php
session_start();

function connectBD() {
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $pdo = new PDO("mysql:host=localhost;dbname=images;", "root", "", $options);
    return $pdo;
}

function uploadImg($fileName, $tmp)
{
    // 1. название
    $imgName     = $fileName;
    $imgNameInfo = pathinfo($imgName);
    $imgNameType = $imgNameInfo["extension"];
    $newNameImg  = uniqid() . "." . $imgNameType; //63ea0f1bc1659.jpg

    // 2. сохранить
    $result = move_uploaded_file($tmp, 'uploads/' . $newNameImg);
    if ($result) {
        $result = $newNameImg;
    }
    return $result;
}

$arrListFiles = [];

$countArrayFiles = count($_FILES['file']['name']);

for ($i = 0; $i < $countArrayFiles; $i++) {
    $fileName = $_FILES['file']['name'][$i];
    $tmpName = $_FILES['file']['tmp_name'][$i];
    $arrListFiles[] = [uploadImg($fileName, $tmpName), $fileName];
}

$gallery = json_encode($arrListFiles);

$pdo = connectBD();
$sql = "INSERT INTO gallery (gallery) VALUES (:gallery)";
$statement = $pdo->prepare($sql);
$statement->execute([
    'gallery' => $gallery,
]);
$id = $pdo->lastInsertId();
$_SESSION["galleryID"] = $id;


echo '<pre>';
var_dump($gallery);
echo "</pre>";

header('Location: task_19v2.php');