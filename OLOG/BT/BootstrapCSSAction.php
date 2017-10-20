<?php

namespace OLOG\BT;

use OLOG\ActionInterface;

class BootstrapCSSAction implements ActionInterface
{
    public function url(){
        return '/assets/bootstrap.css';
    }

    public function action(){
        Passthrough::passthrough('vendor/twbs/bootstrap/dist/css/bootstrap.css');
    }

}