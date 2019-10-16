<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\ServiceImageRepository;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Services\SEOService;

class ServiceController extends Controller
{

    protected $serviceRepository;

    protected $serviceImageRepository;

    protected $SEOService;

    public function __construct(ServiceRepository $serviceRepository,
                                ServiceImageRepository $serviceImageRepository,
                                SEOService $SEOService)
    {
        $this->serviceRepository = $serviceRepository;
        $this->serviceImageRepository = $serviceImageRepository;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(3);
        $this->SEOService->getPage($seoPage);

        $services = $this->serviceRepository->orderBy('order', 'asc')->findByField('active', 'y');

        return view('site.service.index', compact('seoPage', 'services'));
    }

    public function show(SiteRequest $request, $seo_link)
    {
        $service = $this->serviceRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($service) {
            $images = $this->serviceImageRepository->orderBy('order', 'asc')->findByField('service_id', $service->id);

            $cover = null;
            $image = $images->firstWhere('cover', 'y');
            if (isPost($image)) {
                $cover = asset('uploads/service/' . $image->image);
            }

            $seoPage = $this->SEOService->getSeoPageSession(3);
            $this->SEOService->getPageComplement($service, $seoPage['name'], $cover, $cover);

            return view('site.service.show', compact('service', 'seoPage', 'images'));
        }

        return redirect(route('service'), 301);
    }

    public function getActives()
    {
        return $this->serviceRepository->orderBy('name', 'asc')->findByField('active', 'y');
    }

}
