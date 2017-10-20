<?php

namespace OLOG\BT;

use OLOG\ActionInterface;

class BootstrapCSSAction implements ActionInterface
{
    public function url(){
        return '/assets/bootstrap.css';
    }

    public function action(){
        $name = __DIR__ . '/../../vendor/twbs/bootstrap/dist/css/bootstrap.css';
        $fp = fopen($name, 'rb');
        assert($fp);

        // send the right headers
        header("Content-Type: text/css");
        header("Content-Length: " . filesize($name));

        // dump the picture and stop the script
        fpassthru($fp);
        exit;
    }

}