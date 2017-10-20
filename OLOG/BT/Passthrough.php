<?php

namespace OLOG\BT;

class Passthrough
{
    static public function passthrough($filepath_in_project_root){
        // first attempt to build full path when library is in vendor
        $fullpath = __DIR__ . '/../../../../' . $filepath_in_project_root;
        if (file_exists($fullpath)){
            self::go($fullpath);
        }

        // second attempt to build full path when library is in project root
        $fullpath = __DIR__ . '/../../' . $filepath_in_project_root;
        if (file_exists($fullpath)){
            self::go($fullpath);
        }

        throw new \Exception('Passthrough path not found: ' . $filepath_in_project_root);
    }

    static protected function go($name){
        $fp = fopen($name, 'rb');
        assert($fp);

        // send the right headers
        header("Content-Type: text/css");
        //header("Content-Length: " . filesize($name));

        // dump the picture and stop the script
        fpassthru($fp);
        exit;
    }
}