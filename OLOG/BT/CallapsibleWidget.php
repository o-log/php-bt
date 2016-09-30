<?php

namespace OLOG\BT;

class CallapsibleWidget
{
    public static function buttonAndCollapse($text, $html) {
        if (is_callable($html)) {
            $html = $html();
        }
        $id = 'collapsible_' . uniqid();
        return  '<div>
                    <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#'.$id.'" >' . $text . ' </button>
                 </div>
                 <div id="'.$id.'" class="collapse">
                             ' . $html . '
                 </div>';
    }
}