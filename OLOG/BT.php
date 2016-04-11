<?php

namespace OLOG;

use OLOG\Sanitize;

class BT
{
    /**
     * @param $url
     * @param $text
     * @return string
     */
    static public function a($url, $text){
        return '<a href="' . Sanitize::sanitizeUrl($url). '">' . Sanitize::sanitizeTagContent($text) . '</a>';
    }

    /**
     * @param $arr Array of sanitized html
     * @return mixed
     */
    static public function breadcrumbs($arr){
        ob_start();

        echo '<ol class="breadcrumb">';

        foreach ($arr as $html){
            echo '<li class="active">' . $html . '</li>';
        }

        echo '</ol>';

        return ob_get_clean();
    }

    static public function tabsHtml(array $tabs_arr)
    {
        $html = '';
        $html .= '<ul class="nav nav-tabs">';

        foreach ($tabs_arr as $tab_html) {
            $html .= $tab_html;
        }

        $html .= '</ul>';

        return $html;
    }

    static public function tabHtml($text, $match_url, $link_url){
        $classes = '';

        // TODO: код взят из Router::match3() - использовать общую реализацию?

        $url_regexp = '@^' . $match_url . '$@';
        $matches_arr = array();
        $current_url = self::uri_no_getform(); // TODO: use common request reader
        if (preg_match($url_regexp, $current_url, $matches_arr)) {
            $classes .= ' active ';
        }

        $html = '';
        $html .= '<li role="presentation" class="' . Sanitize::sanitizeAttrValue($classes) . '">';
        $html .= BT::a($link_url, $text);
        $html .= '</li>';

        return $html;
    }

    static public function uri_no_getform()
    {
        $request_uri = array_key_exists('REQUEST_URI', $_SERVER) ? $_SERVER['REQUEST_URI'] : '';
        $parts = explode('?', $request_uri);
        $uri_no_getform = $parts[0];
        return $uri_no_getform;
    }


}