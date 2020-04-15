<?php

require('C:\Users\worky\projects\e-store\curl_api\lib\Curl.php');
require('C:\Users\worky\projects\e-store\curl_api\lib\File.php');

// 標準入力
// $stdin = fgets(STDIN);
// echo $stdin;

// postかgetか
// jsonファイルか文字列か

$url = $argv[1];
$file_path = $argv[2];
$curl_ = $argv[2];

$file = new File($file_path);
$json_data = $file->json_file_read();
$BASIC_AUTH_USERNAME = $_SERVER['_USER__NAME'];
$BASIC_AUTH_PASS = $_SERVER['_PASS__WORD'];

// curlのoptionsを設定
$options = array(CURLOPT_URL => $url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_POST => true,
                 CURLOPT_SSL_VERIFYPEER => false,
                 );

if (request_method == 'POST') {
$options = array(CURLOPT_URL => $url,
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_POST => true,
                 CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
                 CURLOPT_POSTFIELDS => $json_data,
                 CURLOPT_SSL_VERIFYPEER => false,
                 CURLOPT_USERPWD => "$BASIC_AUTH_USERNAME:$BASIC_AUTH_PASS"
                );
}


$curl = new Curl($options);
// $curl->get_request();
$curl->post_request();

// var_dump($json);

// jsonデータをArray形式に変更する。
// $obj = json_decode($json, true);
// var_dump($obj);

// $curl->test();
// echo $curl->get_request($url);

// phpでjsonデータを作成する。
// $data = array(
// 	'test1'=>'aaa',
// 	'test2'=> array(
// 		array(
// 			'test3'=>'bbb'
// 		)
// 	),
// 	'test4'=> array(
// 		array(
// 			'test5'=>'ccc',
// 			'test6'=>'ddd'
// 		)
// 	)
// );
// $data_json = json_encode($data);
