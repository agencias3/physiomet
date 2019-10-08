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

    protected $productRepository;

    protected $categoryRepository;

    protected $segmentRepository;

    protected $postRepository;

    protected $SEOService;

    public function __construct(BannerRepository $bannerRepository,
                                BannerMobileRepository $bannerMobileRepository,
                                ProductRepository $productRepository,
                                CategoryRepository $categoryRepository,
                                SegmentRepository $segmentRepository,
                                PostRepository $postRepository,
                                SEOService $SEOService)
    {
        $this->bannerRepository = $bannerRepository;
        $this->bannerMobileRepository = $bannerMobileRepository;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->segmentRepository = $segmentRepository;
        $this->postRepository = $postRepository;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(1);
        $this->SEOService->getPage($seoPage);

        $banners = $this->bannerRepository->showStore(5);
        $mobile = $this->bannerMobileRepository->showStore(1);
        $products = $this->categoryRepository->orderBy('order', 'asc')->scopeQuery(function($query){
            return $query->where('active', 'y');
        })->paginate(3);
        $segments = $this->segmentRepository->orderBy('order', 'asc')->scopeQuery(function($query){
            return $query->where('active', 'y');
        })->paginate(2);
        $posts = $this->postRepository->getPostsActive(3);
        //dd($banners);

        return view('site.home.index', compact('seoPage', 'banners', 'products', 'segments', 'posts', 'mobile'));
    }

}
