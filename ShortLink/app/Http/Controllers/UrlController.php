<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use App\Services\UrlService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class UrlController extends Controller
{

    /**
     * @param UrlService $urlService
     */
    public function __construct(public UrlService $urlService) {}

    /**
     * @return View
     */
    public function index(): View
    {
        return view('main');
    }

    /**
     * @param UrlRequest $request
     * @return JsonResponse
     */
    public function url(UrlRequest $request): JsonResponse
    {
        $params = $request->validated();
        $urlShort = $this->urlService->getShortUrl($params['url']);

        return new JsonResponse(['url' => route('short_url', $urlShort)]);
    }

    /**
     * @param $code
     * @return RedirectResponse
     */
    public function redirect($code): RedirectResponse
    {
        $url = Url::query()->where('url_short', '=', $code)->first();
        return redirect($url->url_original);
    }
}
