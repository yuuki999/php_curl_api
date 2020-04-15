<?php

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
    public function get_request($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // HTTPS証明書を信頼する。これがないとfalseがreturn

        $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $html =  curl_exec($ch);

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
        $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $html =  curl_exec($ch);

        echo 'status_code: ' . $status_code . "\n";
        echo "reponse: \n\n" . $html;
        curl_close($ch);

        return $html;
    }
}


// todo
// post_requestは汎用的なメソッドにしたい
// basic認証が付与されていたり
// json形式ではないrequestをしたりなど