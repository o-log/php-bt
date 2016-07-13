<?php

namespace BTDemo;

class DemoConfig
{
    public static function get()
    {
        // for mac
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');

        $conf[\OLOG\BT\BTConstants::MODULE_NAME] = [
            'layout_class_name' => \OLOG\BT\LayoutBootstrap::class,
            'menu_classes_arr' => [
                DemoMenu::class
            ],
            \OLOG\BT\BTConstants::BREADCRUMBS_PREFIX_ARR => [\OLOG\BT\BT::a(\BTDemo\DemoAction::getUrl(), '', 'glyphicon glyphicon-home')]

        ];

        return $conf;
    }

}