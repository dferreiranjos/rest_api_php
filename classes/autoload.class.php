<?php

class Autoload
{
    public function __construct()
    {
        $files = scandir(__DIR__.'/');
        
        foreach($files as $file){

            if(!in_array($file, ['.', '..'])){
                require_once $file;
            }
        }
    }
}