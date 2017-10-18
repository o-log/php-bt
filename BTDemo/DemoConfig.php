<?php

namespace BTDemo;

use OLOG\BT\LayoutBootstrap;
use OLOG\Layouts\LayoutsConfig;

class DemoConfig
{
    public static function init()
    {
        // for mac
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');

        //LayoutsConfig::setAdminLayoutClassName(LayoutBootstrap::class);
    }
}