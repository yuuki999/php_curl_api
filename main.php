<?php

require('C:\Users\worky\projects\e-store\curl_api\lib\Curl.php');
require('C:\Users\worky\projects\e-store\curl_api\lib\File.php');

$request_method = $argv[1];
$url = $argv[2];

if (is_null($request_method)) {
    echo '第1引数: リクエストメソッドが指定されていません。';
    exit;
}

if (is_null($url)) {
    echo '第2引数: リクエストURLが指定されていません。';
    exit;
}

// basic認証のPWがAPIによって異なる可能性あり。

$BASIC_AUTH_USERNAME = $_SERVER['_USER__NAME'];
$BASIC_AUTH_PASS = $_SERVER['_PASS__WORD'];
// レスポンスメソッド判断
if ($request_method == 'GET') {
    $options = array(CURLOPT_URL => $url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_POST => true,
                 CURLOPT_SSL_VERIFYPEER => false,
                 CURLOPT_USERPWD => "$BASIC_AUTH_USERNAME:$BASIC_AUTH_PASS"
                 );
    $curl = new Curl($options);
    $curl->get_request();
}

if ($request_method == 'POST') {
    $file_path = $argv[3];
    if(is_null($file_path)) {
        echo '第3引数: ファイルパスが指定されていません。';
        exit;
    }

    $file = new File($file_path);
    $json_data = $file->json_file_read();
    $options = array(CURLOPT_URL => $url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_POST => true,
                 CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
                 CURLOPT_POSTFIELDS => $json_data,
                 CURLOPT_SSL_VERIFYPEER => false,
                 CURLOPT_USERPWD => "$BASIC_AUTH_USERNAME:$BASIC_AUTH_PASS"
                );

    $curl = new Curl($options);
    $html = $curl->post_request();

    echo $html['total_count'];
}

// レスポンス形式もjsonと仮定して
// todo: jsonの結果から任意の値を抽出する。


