<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\EnterpriseImageRepository;
use AgenciaS3\Repositories\EnterpriseRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Services\SEOService;

class EnterpriseController extends Controller
{

    protected $enterpriseRepository;

    protected $enterpriseImageRepository;

    protected $storeRepository;

    protected $SEOService;

    public function __construct(EnterpriseRepository $enterpriseRepository,
                                EnterpriseImageRepository $enterpriseImageRepository,
                                StoreRepository $storeRepository,
                                SEOService $SEOService)
    {
        $this->enterpriseRepository = $enterpriseRepository;
        $this->enterpriseImageRepository = $enterpriseImageRepository;
        $this->storeRepository = $storeRepository;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(11);
        $this->SEOService->getPage($seoPage);

        $enterprises = $this->enterpriseRepository
            ->with('images')
            ->orderBy('order', 'asc')->scopeQuery(function ($query) {
                return $query->where('active', 'y');
            })->paginate(8);

        return view('site.enterprise.index', compact('seoPage', 'enterprises'));
    }

    public function show(SiteRequest $request, $seo_link)
    {
        $enterprise = $this->enterpriseRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($enterprise) {
            $images = $this->enterpriseImageRepository->orderBy('order', 'asc')->findByField('enterprise_id', $enterprise->id);

            $cover = null;
            $image = $images->firstWhere('cover', 'y');
            if (isPost($image)) {
                $cover = asset('uploads/enterprise/' . $image->image);
            }

            $seoPage = $this->SEOService->getSeoPageSession(11);
            $this->SEOService->getPageComplement($enterprise, $seoPage['name'], $cover, $cover);

            $stores = $this->storeRepository->with(['images', 'enterprise'])->scopeQuery(function ($query) use ($enterprise) {
                return $query->where('enterprise_id', '=', $enterprise->id)
                    ->where('active', 'y')
                    ->orderBy('order', 'asc');
            })->paginate(8);

            return view('site.enterprise.show', compact('enterprise', 'seoPage', 'images', 'stores'));
        }

        return redirect(route('enterprise'), 301);
    }

}
