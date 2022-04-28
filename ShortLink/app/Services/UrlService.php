<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Str;

/**
 * Class UrlService.
 */
class UrlService
{
    /**
     * @param string $url
     * @return string
     */
    public function getShortUrl(string $url): string
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

    /**
     * @return string
     */
    private function generateShortUrl(): string
    {
        return Str::random(7);
    }
}
