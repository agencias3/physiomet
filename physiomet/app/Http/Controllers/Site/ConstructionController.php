<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\SeoPage;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\ConstructionImageRepository;
use AgenciaS3\Repositories\ConstructionRepository;
use AgenciaS3\Services\SEOService;

class ConstructionController extends Controller
{

    protected $constructionRepository;

    protected $constructionImageRepository;

    public function __construct(ConstructionRepository $constructionRepository,
                                ConstructionImageRepository $constructionImageRepository)
    {
        $this->constructionRepository = $constructionRepository;
        $this->constructionImageRepository = $constructionImageRepository;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = SeoPage::find(6);
        (new SEOService)->getPage($seoPage);

        $constructions = $this->constructionRepository->orderBy('order', 'asc')->findByField('active', 'y');
        $images = $this->constructionImageRepository->orderBy('order', 'asc')->findByField('construction_id', $constructions->first()->id);

        return view('site.construction.index', compact('seoPage', 'constructions', 'images'));
    }

    public function show(SiteRequest $request, $seo_link)
    {
        $construction = $this->constructionRepository->findWhere(['seo_link' => $seo_link, 'active' => 'y'])->first();
        if ($construction) {
            $images = $this->constructionImageRepository->orderBy('order', 'asc')->findByField('construction_id', $construction->id);

            $cover = null;
            $image = $images->firstWhere('cover', 'y');
            if (isPost($image)) {
                $cover = asset('uploads/construction/' . $image->image);
            }

            $seoPage = SeoPage::find(6);
            (new SEOService)->getPageComplement($construction, $seoPage->name, $cover, $cover);

            $constructions = $this->constructionRepository->orderBy('order', 'asc')->findByField('active', 'y');

            return view('site.construction.index', compact('seoPage', 'constructions', 'images', 'construction'));
        }

        return redirect()->route('construction', 301);
    }

}
