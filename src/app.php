<?php

use Silex\Application;
use Sc\Searcher;
use Sc\Telegrammer;

$app = new Application();

$app['searcher'] = $app->share(function($c) {
    return new Searcher($c['youtube.key']);
});

$app['telegrammer'] = $app->share(function($c) {
    return new Telegrammer($c['telegram.token']);
});

return $app;
