<?php

require __DIR__.'/vendor/autoload.php';
require_once 'app/Configs/.env.php';

use \App\Controller\Pages\Home;

echo Home::getHome();