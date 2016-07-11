<?php

require_once '../vendor/autoload.php';

\OLOG\ConfWrapper::assignConfig(\BTDemo\DemoConfig::get());

\OLOG\Router::matchAction(\BTDemo\DemoAction::class, 0);