<?php

namespace OLOG\BT;

class BTConfig
{
    static protected $layout_class_name = LayoutBootstrap::class;
    static protected $breadcrumbs_prefix_arr = [];

    /**
     * @return mixed
     */
    public static function getLayoutClassName()
    {
        return self::$layout_class_name;
    }

    /**
     * @param mixed $layout_class_name
     */
    public static function setLayoutClassName($layout_class_name)
    {
        self::$layout_class_name = $layout_class_name;
    }

    /**
     * @return array
     */
    public static function getBreadcrumbsPrefixArr()
    {
        return self::$breadcrumbs_prefix_arr;
    }

    /**
     * @param array $breadcrumbs_prefix_arr
     */
    public static function setBreadcrumbsPrefixArr($breadcrumbs_prefix_arr)
    {
        self::$breadcrumbs_prefix_arr = $breadcrumbs_prefix_arr;
    }
}