<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Services\SEOService;

class AdministrationController extends Controller
{

    protected $SEOService;

    public function __construct(SEOService $SEOService)
    {
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(8);
        $this->SEOService->getPage($seoPage);

        return view('site.administration.index', compact('seoPage'));
    }

}
