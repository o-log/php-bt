<?php

require_once '../vendor/autoload.php';

\BTDemo\DemoConfig::init();

\OLOG\BT\Routes::routes();

\OLOG\Router::action(\BTDemo\DemoAction::class, 0);