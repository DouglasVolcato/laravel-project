<?php

namespace App\Http\Helpers\FileHandler;

class FileHandlerHelper{
    public function setContent($fileName, $content){
        $filePath = $this->setFilePath($fileName);

        if(file_put_contents($filePath, $content)){
            return true;
        } else {
            return false;
        }
    }

    public function getContent($fileName){
        $filePath = $this->setFilePath($fileName);

        if(!file_exists($filePath)){
            return false;
        } else {
            return file_get_contents($filePath);
        }
    }

    private function setFilePath($fileName){
        return "mocks/{$fileName}.txt";
    }
}
