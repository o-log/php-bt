<?php

namespace BTDemo;

use OLOG\ActionInterface;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\PageToolbarHtmlInterface;

class DemoAction implements
    PageTitleInterface,
    PageToolbarHtmlInterface,
    ActionInterface
{
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
        $html = '<div>TEST CONTENT</div>';

        AdminLayoutSelector::render($html, $this);
    }
}