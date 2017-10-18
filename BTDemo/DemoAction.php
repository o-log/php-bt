<?php

namespace BTDemo;

use OLOG\ActionInterface;
use OLOG\BT\BT;
use OLOG\BT\LayoutBootstrap;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\PageToolbarHtmlInterface;
use OLOG\URL;

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
        LayoutBootstrap::render(function (){
            echo '<div>TEST CONTENT</div>';

            echo BT::tabsHtml(
                [
                    BT::tabHtml('tab1', '/', '/', URL::path()),
                    BT::tabHtml('tab2', '/2', '/2', URL::path()),
                    BT::tabHtml('tab3', '/3', '/3', URL::path())
                ]
            );
        }, $this);
    }
}