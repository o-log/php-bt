<?php

namespace OLOG\BT;

use OLOG\ActionInterface;

class BootstrapCSSAction implements ActionInterface
{
    public function url(){
        return '/assets/bootstrap.css';
    }

    public function action(){
        $filepath_in_project_root = 'vendor/twbs/bootstrap/dist/css/bootstrap.css';
        Passthrough::passthrough($filepath_in_project_root);

    }

}