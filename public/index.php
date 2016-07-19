<?php

require_once '../vendor/autoload.php';

\BTDemo\DemoConfig::init();

\OLOG\Router::matchAction(\BTDemo\DemoAction::class, 0);