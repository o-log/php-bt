<?php

namespace BTDemo;

class Config
{
    public static function get()
    {
        // for mac
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');

        $conf['php-bt'] = [
            'layout_code' => \OLOG\BT\LayoutGentellela::LAYOUT_CODE_GENTELLELA
        ];

        return $conf;
    }

}