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
            'menu_classes_arr' => [
                BTDemoMenu::class
            ]
        ];

        return $conf;
    }

}