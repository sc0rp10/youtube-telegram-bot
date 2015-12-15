<?php

namespace Sc;

use Curl\Curl;

class Telegrammer
{
    const BASE_URL = 'https://api.telegram.org/bot';
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function sendMessage($chat_id, $text)
    {
        $this->sendRequest('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $text,
        ]);
    }

    protected function sendRequest($method, $data = [])
    {
        $c = new Curl();
        $c->post(self::BASE_URL.$this->token.'/'.$method, $data);
    }
}
