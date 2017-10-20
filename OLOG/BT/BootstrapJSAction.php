<?php

namespace OLOG\BT;

use OLOG\ActionInterface;

class BootstrapJSAction implements ActionInterface
{
    public function url(){
        return '/assets/bootstrap.js';
    }

    public function action(){
        $name = __DIR__ . '/../../vendor/twbs/bootstrap/dist/js/bootstrap.js';
        $fp = fopen($name, 'rb');
        assert($fp);

        // send the right headers
        header("Content-Type: application/javascript");
        header("Content-Length: " . filesize($name));

        // dump the picture and stop the script
        fpassthru($fp);
        exit;
    }

}