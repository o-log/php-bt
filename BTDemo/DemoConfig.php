<?php

namespace BTDemo;

use OLOG\BT\LayoutBootstrap4;
use OLOG\Layouts\LayoutsConfig;

class DemoConfig
{
    public static function init()
    {
        // for mac
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');
        ini_set('assert.exception', 1);

        //LayoutsConfig::setAdminLayoutClassName(LayoutBootstrap::class);
    }
}