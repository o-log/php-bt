<?php

namespace OLOG\BT;

use OLOG\Router;

class Routes
{
    static public function routes(){
        Router::action(BootstrapCSSAction::class, 30); // have some client caching to protect from unexpected load, but short enough to develop smoothly
        Router::action(BootstrapJSAction::class, 30); // have some client caching to protect from unexpected load, but short enough to develop smoothly
        Router::action(PopperJSAction::class, 30); // have some client caching to protect from unexpected load, but short enough to develop smoothly
    }
}