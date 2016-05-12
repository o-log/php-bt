<?php
/**
 * Created by PhpStorm.
 * User: ologinov
 * Date: 12.05.16
 * Time: 21:52
 */

namespace OLOG\BT;


use OLOG\ConfWrapper;

class Layout
{
    static public function render($content_html, $action_obj = null)
    {
        $layout_code = ConfWrapper::value('php-bt.layout_code', LayoutBootstrap::LAYOUT_CODE_BOOTSTRAP);

        switch ($layout_code) {
            case LayoutBootstrap::LAYOUT_CODE_BOOTSTRAP:
                LayoutGentellela::render($content_html, $action_obj);
                break;

            case LayoutGentellela::LAYOUT_CODE_GENTELLELA:
                LayoutGentellela::render($content_html, $action_obj);
                break;

            default:
                throw new \Exception('unknown layout code');
        }
    }
}