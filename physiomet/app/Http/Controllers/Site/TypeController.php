<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\TypeImageRepository;
use AgenciaS3\Repositories\TypeRepository;
use AgenciaS3\Services\SEOService;

class TypeController extends Controller
{

    protected $typeRepository;

    protected $typeImageRepository;

    protected $SEOService;

    public function __construct(TypeRepository $typeRepository,
                                TypeImageRepository $typeImageRepository,
                                SEOService $SEOService)
    {
        $this->typeRepository = $typeRepository;
        $this->typeImageRepository = $typeImageRepository;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(4);
        $this->SEOService->getPage($seoPage);

        $types = $this->typeRepository->orderBy('order', 'asc')->findByField('active', 'y');

        return view('site.type.index', compact('seoPage', 'types'));
    }

    public function show(SiteRequest $request, $seo_link)
    {
        $type = $this->typeRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($type) {
            $images = $this->typeImageRepository->orderBy('order', 'asc')->findByField('type_id', $type->id);

            $cover = null;
            $image = $images->firstWhere('cover', 'y');
            if (isPost($image)) {
                $cover = asset('uploads/type/' . $image->image);
            }

            $seoPage = $this->SEOService->getSeoPageSession(4);
            $this->SEOService->getPageComplement($type, $seoPage['name'], $cover, $cover);

            return view('site.type.show', compact('type', 'seoPage', 'images'));
        }

        return redirect(route('type'), 301);
    }

    public function getTypes($limit)
    {
        return $this->typeRepository->getActive($limit);
    }

}
