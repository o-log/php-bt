<?php

namespace OLOG\BT;

class BTConfig
{
    static protected $layout_class_name = LayoutBootstrap::class;
    static protected $breadcrumbs_prefix_arr = [];
    static protected $menu_classes_arr = [];
    static protected $application_title = 'Application';

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

    /**
     * @return array
     */
    public static function getMenuClassesArr()
    {
        return self::$menu_classes_arr;
    }

    /**
     * @param array $menu_classes_arr
     */
    public static function setMenuClassesArr($menu_classes_arr)
    {
        self::$menu_classes_arr = $menu_classes_arr;
    }

    /**
     * @return string
     */
    public static function getApplicationTitle()
    {
        return self::$application_title;
    }

    /**
     * @param string $application_title
     */
    public static function setApplicationTitle($application_title)
    {
        self::$application_title = $application_title;
    }


}