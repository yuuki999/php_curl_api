<?php

class File
{
    public $file_path;
    
    function  __construct($file_path) {
        $this->file_path = $file_path;
    }

    public function json_file_read() {
        $json_file_path = $this->file_path;
        $json_obj = file_get_contents($json_file_path);
        $json_obj = mb_convert_encoding($json_obj, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        return $json_obj;
    }
}
