<?php

namespace OLOG\BT;

use OLOG\HTML;

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

        $out = '';
        $out .= '<div class="panel panel-default" >';

        if ($heading_html != '') {
            $out .= '<div class="panel-heading">' . $heading_html . '</div>';
        }

        $out .= '<div class="panel-body">' . $html . '</div>';
        $out .= '</div>';

        return $out;
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

        $html .= '<ul class="' . HTML::attr($classes_str) . '">';

        foreach ($tabs_arr as $tab_html) {
            $html .= $tab_html;
        }

        $html .= '</ul>';

        return $html;
    }

    static public function tabHtml($text, $match_url, $link_url, $requested_url, $target = '')
    {
        $classes = '';

        // TODO: код взят из Router::match3() - использовать общую реализацию?

        $url_regexp = '@^' . $match_url . '$@';
        $matches_arr = array();
        if (preg_match($url_regexp, $requested_url, $matches_arr)) {
            $classes .= ' active ';
        }

        if ($link_url == '') {
            $classes .= ' disabled ';
        }

        $html = '';
        $html .= '<li role="presentation" class="' . HTML::attr($classes) . '">';
        $html .= HTML::tag('a', ['href' => $link_url, 'target' => $target], $text);
        $html .= '</li>';

        return $html;
    }

}