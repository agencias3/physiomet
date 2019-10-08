<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\SeoPage;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\PostRepository;
use AgenciaS3\Repositories\ProductRepository;
use AgenciaS3\Repositories\SegmentImageRepository;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Services\SEOService;

class SegmentController extends Controller
{

    protected $segmentRepository;

    protected $segmentImageRepository;

    protected $clientRepository;

    protected $productRepository;

    protected $postRepository;

    protected $SEOService;

    public function __construct(SegmentRepository $segmentRepository,
                                SegmentImageRepository $segmentImageRepository,
                                ClientRepository $clientRepository,
                                ProductRepository $productRepository,
                                PostRepository $postRepository,
                                SEOService $SEOService)
    {
        $this->segmentRepository = $segmentRepository;
        $this->segmentImageRepository = $segmentImageRepository;
        $this->clientRepository = $clientRepository;
        $this->productRepository = $productRepository;
        $this->postRepository = $postRepository;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(3);
        $this->SEOService->getPage($seoPage);

        $segments = $this->segmentRepository->orderBy('order', 'asc')->findByField('active', 'y');

        return view('site.segment.index', compact('seoPage', 'segments'));
    }

    public function getSegmentActive()
    {
        return $this->segmentRepository->orderBy('order', 'asc')->findByField('active', 'y');
    }

    public function show(SiteRequest $request, $seo_link)
    {
        $segment = $this->segmentRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($segment) {
            $images = $this->segmentImageRepository->orderBy('order', 'asc')->findByField('segment_id', $segment->id);

            $cover = null;
            $image = $images->firstWhere('cover', 'y');
            if (isPost($image)) {
                $cover = asset('uploads/segment/' . $image->image);
            }

            $seoPage = $this->SEOService->getSeoPageSession(3);
            $this->SEOService->getPageComplement($segment, $seoPage['name'], $cover, $cover);

            $clients = $this->clientRepository->scopeQuery(function($query) use($segment){
                return $query->leftJoin('segment_clients as sc', 'sc.client_id', '=', 'clients.id')
                    ->select('clients.*')
                    ->where('sc.segment_id', $segment->id)
                    ->where('active', 'y');
            })->all();

            $products = $this->productRepository->scopeQuery(function($query) use($segment){
                return $query->leftJoin('segment_products as sp', 'sp.product_id', '=', 'products.id')
                    ->select('products.*')
                    ->where('sp.segment_id', $segment->id)
                    ->where('active', 'y');
            })->all();

            $posts = $this->postRepository->getPostsSegment($segment->id, 3);

            return view('site.segment.show', compact('segment', 'seoPage', 'images', 'clients', 'products', 'posts'));
        }

        return redirect(route('segment'), 301);
    }

}
