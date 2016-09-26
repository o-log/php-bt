<?php

namespace OLOG\BT;

use OLOG\Sanitize;

class HTML
{
    public static function div($css_class, $id , $html) {
        if (is_callable($html)) {
            ob_start();
            $html();
            $html = ob_get_clean();
        }
        $class = $css_class ? 'class="' . Sanitize::sanitizeAttrValue($css_class) . '"' : '';
        $id = $id ? 'id="' . $id . '"' : '';
        return  '<div ' . $class . '  ' . $id . '>' . $html . '</div>';
    }
}