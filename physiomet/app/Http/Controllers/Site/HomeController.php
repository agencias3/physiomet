<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\BannerMobileRepository;
use AgenciaS3\Repositories\BannerRepository;
use AgenciaS3\Repositories\CategoryRepository;
use AgenciaS3\Repositories\PostRepository;
use AgenciaS3\Repositories\ProductRepository;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Services\SEOService;

class HomeController extends Controller
{

    protected $bannerRepository;

    protected $bannerMobileRepository;

    protected $postRepository;

    protected $SEOService;

    public function __construct(BannerRepository $bannerRepository,
                                BannerMobileRepository $bannerMobileRepository,
                                PostRepository $postRepository,
                                SEOService $SEOService)
    {
        $this->bannerRepository = $bannerRepository;
        $this->bannerMobileRepository = $bannerMobileRepository;
        $this->postRepository = $postRepository;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(1);
        $this->SEOService->getPage($seoPage);

        $banners = $this->bannerRepository->showStore(5);
        $mobile = $this->bannerMobileRepository->showStore(1);
        $posts = $this->postRepository->getPostsActive(3);

        return view('site.home.index', compact('seoPage', 'banners', 'posts', 'mobile'));
    }

}
