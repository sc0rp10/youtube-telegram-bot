<?php

use Sc\Searcher;
use Sc\Telegrammer;
use Symfony\Component\HttpFoundation\JsonResponse;

$app->get('/', function () use ($app) {
    return new JsonResponse(['ok' => true]);
});

$app->post('/', function () use ($app) {
    $request = json_decode(file_get_contents('php://input'), true);

    if (!$request || !isset($request['message']['text'])) {
        $response = new JsonResponse('', 400);
    } else {
        $text = ltrim($request['message']['text'], '/y ');

        /** @var Searcher $searcher */
        $searcher = $app['searcher'];

        $link = $searcher->searchVideo($text);

        /** @var Telegrammer $telegrammer */
        $telegrammer = $app['telegrammer'];
        $telegrammer->sendMessage($request['message']['chat']['id'], $link);

        $response = new JsonResponse([
            'ok' => true,
        ]);
    }

    return $response;
});
