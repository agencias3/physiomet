<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Services\SEOService;

class InvestController extends Controller
{

    protected $SEOService;

    public function __construct(SEOService $SEOService)
    {
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(9);
        $this->SEOService->getPage($seoPage);

        return view('site.invest.index', compact('seoPage'));
    }

}
