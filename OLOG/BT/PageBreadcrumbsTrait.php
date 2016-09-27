<?php
namespace OLOG\BT;

use OLOG\InterfaceAction;

trait PageBreadcrumbsTrait {
    /**
     * @param $action_obj
     * @return string
     */
    public static function pageTitle($action_obj) {
        $action_title = '#NO_TITLE#';
        if ($action_obj instanceof InterfacePageTitle) {
            $action_title = $action_obj->currentPageTitle();
        }
        return $action_title;
    }

    /**
     * @param $action_obj
     * @return string
     */
    public static function pageUrl($action_obj) {
        $action_url = '#NO_URL#';
        if ($action_obj instanceof InterfaceAction) {
            $action_url = $action_obj->url();
        }
        return $action_url;
    }
}

