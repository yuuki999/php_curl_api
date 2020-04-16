<?php

class Http
{
    public $status_code;

    function __construct($status_code) {
        $this->status_code = $status_code;
    }

    // エラーハンドリング
    // 実装はしていない。
    public function response_code_check(){
        // 200
        if (preg_match("/^2\d{2}$/", $this->status_code)) {
            
        }
        // 300
        if (preg_match("/^3\d{2}$/", $this->status_code)) {
            
        }
        // 400
        if (preg_match("/^4\d{2}$/", $this->status_code)) {
            
        }
        // 500
        if (preg_match("/^5\d{2}$/", $this->status_code)) {
            
        }
    }
}