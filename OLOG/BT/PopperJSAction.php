<?php

namespace OLOG\BT;

use OLOG\ActionInterface;

class PopperJSAction implements ActionInterface
{
    public function url(){
        return '/assets/popper.js';
    }

    public function action(){
        Passthrough::passthrough('vendor/twbs/bootstrap/assets/js/vendor/popper.min.js');
        /*
        $name = __DIR__ . '/../../vendor/twbs/bootstrap/assets/js/vendor/popper.min.js';
        $fp = fopen($name, 'rb');
        assert($fp);

        // send the right headers
        header("Content-Type: application/javascript");
        header("Content-Length: " . filesize($name));

        // dump the picture and stop the script
        fpassthru($fp);
        exit;
        */
    }

}