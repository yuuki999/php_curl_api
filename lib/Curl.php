<?php

require('C:\Users\worky\projects\e-store\curl_api\lib\Http.php');

class Curl
{
    public $options;

    function __construct($options) {
        $this->options = $options;
    }

    /**
     * 指定したURLにGETリクエストする。
     * レスポンス結果を取得する。
     *
     * @param string $url http://example.com/
     * @return string $html
     * @throws 例外についての記述
     */
    public function get_request() {
        $ch = curl_init();
        curl_setopt_array($ch, $this->options);

        // 実行
        $html =  curl_exec($ch);

        // ステータスコードチェック
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $http_instance = new Http($status_code);
        $http_instance->response_code_check();

        echo 'status_code: ' . $status_code . "\n";
        echo "reponse: \n\n" . $html;
        curl_close($ch);

        return $html;
    }

    /**
     * 指定したURLにPOSTリクエストする。
     * レスポンス結果を取得する。
     *
     * @param string $data 
     * @return string $html
     * @throws 例外についての記述
     */
    public function post_request() {
        $ch = curl_init();
        curl_setopt_array($ch, $this->options);

        // 実行
        $html =  curl_exec($ch);
        $html = json_decode($html, true);

        // ステータスコードチェック
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $http_instance = new Http($status_code);
        $http_instance->response_code_check();
        
        echo 'status_code: ' . $status_code . "\n";
        echo "reponse: \n\n";
        var_dump($html);
        curl_close($ch);

        return $html;
    }
}


// todo
// post_requestは汎用的なメソッドにしたい
// basic認証が付与されていたり
// json形式ではないrequestをしたりなど