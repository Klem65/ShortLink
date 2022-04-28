<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use App\Services\UrlService;
use Illuminate\Http\JsonResponse;

class UrlController extends Controller
{

    public function __construct(public UrlService $urlService) {}

    public function index()
    {
        return view('main');
    }

    public function url(UrlRequest $request)
    {
        $params = $request->validated();
        $urlShort = $this->urlService->getShortUrl($params['url']);

        return new JsonResponse(['url' => route('short_url', $urlShort)]);
    }

    public function redirect($code)
    {
        $url = Url::query()->where('url_short', '=', $code)->first();
        return redirect($url->url_original);
    }
}
