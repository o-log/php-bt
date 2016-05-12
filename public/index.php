<?php

require_once '../vendor/autoload.php';

\OLOG\ConfWrapper::assignConfig(\BTDemo\Config::get());

\OLOG\Router::matchAction(\BTDemo\DemoAction::class, 0);