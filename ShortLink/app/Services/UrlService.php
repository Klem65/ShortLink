<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Str;

/**
 * Class UrlService.
 */
class UrlService
{
    public function getShortUrl($url)
    {
        $urlEntity = Url::query()->where('url_original', '=', $url)->first();
        if ($urlEntity) {
            return $urlEntity->url_short;
        }

        $shortUrl = $this->generateShortUrl();

        $urlEntity = Url::create(['url_original' => $url, 'url_short' => $shortUrl]);
        $urlEntity->save();

        return $shortUrl;
    }

    private function generateShortUrl()
    {
        return Str::random(7);
    }
}
