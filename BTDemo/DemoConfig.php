<?php

namespace BTDemo;

use OLOG\BT\BTConfig;

class DemoConfig
{
    public static function init()
    {
        // for mac
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');

        BTConfig::setLayoutClassName(\OLOG\BT\LayoutBootstrap::class);

        BTConfig::setBreadcrumbsPrefixArr([\OLOG\BT\BT::a(\BTDemo\DemoAction::getUrl(), '', 'glyphicon glyphicon-home')]);

    }

}