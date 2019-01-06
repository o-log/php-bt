<?php
declare(strict_types=1);

/**
 * @author Oleg Loginov <olognv@gmail.com>
 */

namespace OLOG\BT;

class CollapsibleWidget
{
    public static function buttonAndCollapse($text, $html) {
        if (is_callable($html)) {
            ob_start();
            $html();
            $html = ob_get_clean();
        }
        $id = 'collapsible_' . uniqid();
        return  '<div>
                    <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#'.$id.'" >' . $text . ' </button>
                 </div>
                 <div id="'.$id.'" class="collapse">
                             ' . $html . '
                 </div>';
    }

}
