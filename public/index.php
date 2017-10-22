<?php

require_once '../vendor/autoload.php';

\BTDemo\DemoConfig::init();

\OLOG\Router::action(\BTDemo\DemoAction::class, 0);