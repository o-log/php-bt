<?php

namespace BTDemo;

use OLOG\BT\BT;
use OLOG\BT\InterfaceBreadcrumbs;
use OLOG\BT\InterfacePageTitle;
use OLOG\BT\InterfacePageToolbarHtml;
use OLOG\BT\InterfaceUserName;

class DemoAction implements
    InterfaceBreadcrumbs,
    InterfacePageTitle,
    InterfaceUserName,
    InterfacePageToolbarHtml
{
    public function pageToolbarHtml()
    {
        return '<button class="btn btn-default">page toolbar</button>';
    }

    public function currentUserName()
    {
        return 'Demo User';
    }

    public function currentBreadcrumbsArr()
    {
        return [BT::a('/', 'THIS PAGE')];
    }

    public function currentPageTitle()
    {
        return 'TEST PAGE TITLE';
    }

    static public function getUrl(){
        return '/';
    }
    
    public function action(){
        $html = '<div>TEST CONTENT</div>';

        \OLOG\BT\Layout::render($html, $this);
    }
}