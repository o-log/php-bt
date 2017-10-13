<?php

namespace BTDemo;

use OLOG\ActionInterface;
use OLOG\BT\BT;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\PageToolbarHtmlInterface;

class DemoAction implements
    PageTitleInterface,
    PageToolbarHtmlInterface,
    ActionInterface,
    MenuInterface
{
    static public function menuArr(){
        return DemoMenu::menuArr();
    }

    public function pageToolbarHtml()
    {
        return '<button class="btn btn-default">page toolbar</button>';
    }

    public function currentUserName()
    {
        return 'Demo User';
    }

    public function pageTitle()
    {
        return 'TEST PAGE TITLE';
    }

    public function url(){
        return '/';
    }
    
    public function action(){
        $html = '';

        $html .= '<div>TEST CONTENT</div>';

        $html .= BT::tabsHtml(
            [
                BT::tabHtml('tab1', '/', '/'),
                BT::tabHtml('tab2', '/2', '/2'),
                BT::tabHtml('tab3', '/3', '/3')
            ]
        );

        AdminLayoutSelector::render($html, $this);
    }
}