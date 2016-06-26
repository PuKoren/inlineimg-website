<?php
require_once 'vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $converter;

    if (!empty($_POST['from'])) {
        $converter = new InlineImages\Converter($_POST['from']);
    } else if (!empty($_FILES["data"]["tmp_name"])) {
        $converter = new InlineImages\Converter($_FILES["data"]["tmp_name"]);
    }

    if (!empty($converter)) {
      echo $converter->convert();
    } else {
      header("HTTP/1.0 400 Bad Request");
      echo 'Bad request';
    }
}
