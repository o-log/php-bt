<?php

namespace OLOG\BT;

use OLOG\HTML;

class BT
{
    public static function card($heading_html, $content, $classes_arr = []) {
        if (is_callable($content)) {
            ob_start();
            $content();
            $content = ob_get_clean();
        }

        ?><div class="card <?= implode(' ', $classes_arr) ?> "><?php

        if ($heading_html != '') {
            ?><div class="card-header"><?= $heading_html ?></div><?php
        }

        ?><div class="card-body"><?= $content ?></div></div><?php
    }

    static public function modal($modal_element_id, $title, $contents_html = ''){
        $html = '<div class="modal" id="' . $modal_element_id . '" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title">' . $title . '</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">' . $contents_html . '</div>
		</div>
		</div>
		</div>';
        return $html;
    }

    static public function row($html) {
        if (is_callable($html)) {
            ob_start();
            $html();
            $html = ob_get_clean();
        }

        $class = ' class="row" ';
        return  '<div ' . $class . ' >' . $html . '</div>';
    }

    static public function col($cols_xs, $cols_sm, $cols_md, $cols_lg, $content) {
        if (is_callable($content)) {
            ob_start();
            $content();
            $content = ob_get_clean();
        }

        $classes = '';
        if ($cols_lg != ''){
            $classes .= ' col-lg-' . $cols_lg . ' ';
        }

        if ($cols_md != ''){
            $classes .= ' col-md-' . $cols_md . ' ';
        }

        if ($cols_sm != ''){
            $classes .= ' col-sm-' . $cols_sm . ' ';
        }

        if ($cols_xs != ''){
            $classes .= ' col-xs-' . $cols_xs . ' ';
        }

        return  '<div  class="' . $classes . '">' . $content . '</div>';
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
        $li_classes_arr = ['nav-item'];
        $a_classes_arr = ['nav-link'];

        // TODO: код взят из Router::match3() - использовать общую реализацию?

        $url_regexp = '@^' . $match_url . '$@';
        $matches_arr = array();
        if (preg_match($url_regexp, $requested_url, $matches_arr)) {
            $a_classes_arr[] = 'active';
        }

        if ($link_url == '') {
            $li_classes_arr[] = 'disabled';
        }

        $html = '';
        $html .= '<li class="' . HTML::attr(implode(' ', $li_classes_arr)) . '">';
        $html .= HTML::tag('a', ['href' => $link_url, 'target' => $target, 'class' => implode(' ', $a_classes_arr)], $text);
        $html .= '</li>';

        return $html;
    }

}