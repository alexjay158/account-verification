<?php

if (isset($_FILES["file"]["name"])) {
    // Allow certain file formats
    $target_dir = "txts/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType == "txt") {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . '/list.txt')) {
            echo file_get_contents($target_dir . '/list.txt');
        }
    }
}
