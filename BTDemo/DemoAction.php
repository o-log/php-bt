<?php

namespace BTDemo;

use OLOG\BT;
use OLOG\BT\InterfaceBreadcrumbs;
use OLOG\BT\InterfacePageTitle;

class DemoAction implements InterfaceBreadcrumbs, InterfacePageTitle, BT\InterfaceUserName
{
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