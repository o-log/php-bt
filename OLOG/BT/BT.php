<?php

namespace OLOG\BT;

use OLOG\Sanitize;

class BT
{
    public static function row($html) {
        if (is_callable($html)) {
            ob_start();
            $html();
            $html = ob_get_clean();
        }

        $class = ' class="row" ';
        return  '<div ' . $class . ' >' . $html . '</div>';
    }

    public static function panel($heading_html, $html) {
        if (is_callable($html)) {
            ob_start();
            $html();
            $html = ob_get_clean();
        }

        return  '<div class="panel panel-default" ><div class="panel-heading">' . $heading_html  . '</div><div class="panel-body">' . $html . '</div></div>';
    }

    public static function colLg6($html) {
        if (is_callable($html)) {
            ob_start();
            $html();
            $html = ob_get_clean();
        }

        $class = ' class="col-lg-6" ';
        return  '<div ' . $class . ' >' . $html . '</div>';
    }

    public static function colSm6($html) {
        if (is_callable($html)) {
            ob_start();
            $html();
            $html = ob_get_clean();
        }

        $class = ' class="col-sm-6" ';
        return  '<div ' . $class . ' >' . $html . '</div>';
    }

    static public function modal($modal_element_id, $title, $contents_html = ''){
        $html = '<div class="modal fade" id="' . $modal_element_id . '" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title">' . $title . '</h4>
		</div>
		<div class="modal-body">' . $contents_html . '</div>
		</div>
		</div>
		</div>';

        return $html;
    }

    /**
     * @param $url
     * @param $text
     * @return string
     */
    static public function a($url, $text, $classes_str = '', $target = '')
    {
        $target_str = '';
        if ($target != '') {
            $target_str = ' target="' . $target . '" ';
        }
        return '<a class="' . Sanitize::sanitizeAttrValue($classes_str) . '" href="' . Sanitize::sanitizeUrl($url) . '"' . $target_str . '>' . Sanitize::sanitizeTagContent($text) . '</a>';
    }

    static public function div($html, $attrs = '')
    {
        return '<div ' . $attrs . '>' . $html . '</div>';
    }

    /**
     * @param $arr array Array of sanitized html
     * @return mixed
     */
    static public function breadcrumbs($arr)
    {
        ob_start();

        echo '<ol class="breadcrumb">';

        foreach ($arr as $html) {
            echo '<li class="active">' . $html . '</li>';
        }

        echo '</ol>';

        return ob_get_clean();
    }

    static public function tabsHtml(array $tabs_arr, $classes_str = null)
    {
        $html = '';

        if (is_null($classes_str)){
            $classes_str = 'nav nav-tabs';
        }

        $html .= '<ul class="' . Sanitize::sanitizeAttrValue($classes_str) . '">';

        foreach ($tabs_arr as $tab_html) {
            $html .= $tab_html;
        }

        $html .= '</ul>';

        return $html;
    }

    static public function tabHtml($text, $match_url, $link_url, $target = '')
    {
        $classes = '';

        // TODO: код взят из Router::match3() - использовать общую реализацию?

        $url_regexp = '@^' . $match_url . '$@';
        $matches_arr = array();
        $current_url = self::uri_no_getform(); // TODO: use common request reader
        if (preg_match($url_regexp, $current_url, $matches_arr)) {
            $classes .= ' active ';
            $target =  '';
        }

        if ($link_url == '') {
            $classes .= ' disabled ';
        }

        $html = '';
        $html .= '<li role="presentation" class="' . Sanitize::sanitizeAttrValue($classes) . '">';
        $html .= BT::a($link_url, $text, '', $target);
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