<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Repositories\StoreImageRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Services\SEOService;

class BusinessSegmentsController extends Controller
{

    protected $SEOService;

    protected $repository;

    public function __construct(SEOService $SEOService,
                                SegmentRepository $repository)
    {
        $this->SEOService = $SEOService;
        $this->repository = $repository;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(4);
        $this->SEOService->getPage($seoPage);

        $segments = $this->repository->orderBy('order', 'asc')->scopeQuery(function ($query) {
            return $query->where('active', 'y');
        })->paginate(12);

        return view('site.business-segments.index', compact('seoPage', 'segments'));
    }

    public function show(SiteRequest $request, $seo_link)
    {
        $store = $this->repository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($store) {
            $images = $this->storeImageRepository->orderBy('order', 'asc')->findWhere(['store_id' => $store->id]);

            $cover = null;
            if (!$images->isEmpty()) {
                $cover = asset('uploads/store/' . $images->firstWhere('cover', 'y')->image);
            }

            $seoPage = $this->SEOService->getSeoPageSession(3);
            $this->SEOService->getPageComplement($store, 'Lojas', $cover, $cover);

            $relateds = $this->repository->getRelateds($store, 5);

            return view('site.business-segments.show', compact('seoPage', 'store', 'images', 'relateds'));
        }

        return redirect(route('business-segments'), 301);
    }

}
