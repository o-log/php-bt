<?php

namespace BTDemo;

use OLOG\ActionInterface;
use OLOG\BT\BT;
use OLOG\BT\LayoutBootstrap4;
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
        LayoutBootstrap4::render(function (){

            ?>
            <div class="jumbotron">
                <h1 class="display-3">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>
            </div>
<?php

            echo '<div>Tabs below</div>';

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