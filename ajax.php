<?php
require_once 'tietuku.php';

$AccessKey = '';//贴图库开放平台的AccessKey
$SecretKey = '';//贴图库开放平台的SecretKey
$aid = '';//你的相册ID

header('Content-type: application/json;charset=utf-8');

$type = $_GET['type'] ? $_GET['type'] : null;

switch ($type) {
    case "upload":
        $tietuku = new TieTuKuToken($AccessKey, $SecretKey);
        $param['deadline'] = time() + 60;
        $param['aid'] = $aid;
        $token = $tietuku->dealParam($param)->createToken();
        echo '{"token":"' . $token . '"}';
        break;
    default:
        echo '{"error":"type error"}';
}