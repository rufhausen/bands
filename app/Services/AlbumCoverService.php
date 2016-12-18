<?php

namespace App\Services;

use GuzzleHttp\Client;

class AlbumCoverService
{
    public function __construct()
    {
        $this->client   = new Client();
        $this->imageUrl = 'https://placeimg.com/400/400/any';
    }

    public function makeCover($albumId)
    {
        if ($this->saveCover($this->getCoverByUrl(), $albumId)) {
            return true;
        }
    }

    private function getCoverByUrl()
    {
        $response = $this->client->request('GET', $this->imageUrl);

        return $response;
    }

    private function saveCover($response, $albumId)
    {
        $path = public_path('img/covers/' . $albumId . '.jpg');

        if (\File::put($path, $response->getBody())) {
            return true;
        }
    }
}
