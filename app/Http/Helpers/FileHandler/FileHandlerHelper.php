<?php

namespace App\Http\Helpers\FileHandler;

class FileHandlerHelper{
    public function setContent($fileName, $content){
        $filePath = "database\mocks{$fileName}";

        if(file_put_contents("database\mocks{$filePath}.txt", $content)){
            return true;
        } else {
            return false;
        }
    }
    public function getContent($fileName){
        $filePath = "database\mocks{$fileName}";

        if(!file_exists($filePath)){
            return false;
        } else {
            return file_get_contents($filePath);
        }
    }
}
