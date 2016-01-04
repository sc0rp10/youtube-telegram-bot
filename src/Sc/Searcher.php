<?php

namespace Sc;

class Searcher
{
    const BASE_URI = 'https://www.googleapis.com/youtube/v3/search?';

    protected $developer_key;

    public function __construct($developer_key)
    {
        $this->developer_key = $developer_key;
    }

    public function searchVideo($term)
    {
        $params = [
            'q' => $term,
            'part' => 'snippet',
            'key' => $this->developer_key,
            'max_results' => 1,
        ];

        $text = file_get_contents(self::BASE_URI.http_build_query($params));

        if ($text === false) {
            throw new \RuntimeException('Cannot fetch search results');
        }

        $data = json_decode($text, true);


        if (!$data) {
            throw new \RuntimeException('Cannot parse results body');
        }

        if (isset($data['items'][0]['id']['videoId'])) {
            $id = $data['items'][0]['id']['videoId'];
        } else {
            $id = 'dQw4w9WgXcQ';
        }

        return 'https://youtube.com/watch?v='.$id;
    }
}
