<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\CategoryRepository;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\ProductFileRepository;
use AgenciaS3\Repositories\ProductImageRepository;
use AgenciaS3\Repositories\ProductRepository;
use AgenciaS3\Repositories\ProductTextRepository;
use AgenciaS3\Services\SEOService;

class ProductController extends Controller
{

    protected $productRepository;

    protected $productImageRepository;

    protected $productFileRepository;

    protected $productTextRepository;

    protected $categoryRepository;

    protected $clientRepository;

    protected $SEOService;

    public function __construct(ProductRepository $productRepository,
                                ProductImageRepository $productImageRepository,
                                ProductFileRepository $productFileRepository,
                                ProductTextRepository $productTextRepository,
                                CategoryRepository $categoryRepository,
                                ClientRepository $clientRepository,
                                SEOService $SEOService)
    {
        $this->productRepository = $productRepository;
        $this->productImageRepository = $productImageRepository;
        $this->productFileRepository = $productFileRepository;
        $this->productTextRepository = $productTextRepository;
        $this->categoryRepository = $categoryRepository;
        $this->clientRepository = $clientRepository;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(4);
        $this->SEOService->getPage($seoPage);

        $categories = $this->categoryRepository->orderBy('order', 'asc')->findByField('active', 'y');

        return view('site.product.index', compact('seoPage', 'categories'));
    }

    public function category($seo_link)
    {
        $category = $this->categoryRepository->findWhere(['seo_link' => $seo_link, 'active' => 'y'])->first();
        if($category) {
            $seoPage = $this->SEOService->getSeoPageSession(4);
            $this->SEOService->getPageComplement($category, $seoPage['name'], null, null);

            $products = $this->productRepository->orderBy('order', 'asc')->findWhere(['category_id' => $category->id, 'active' => 'y']);

            return view('site.product.category', compact('seoPage', 'products', 'category'));
        }

        return redirect(route('product'), 301);
    }

    public function show(SiteRequest $request, $category, $seo_link)
    {
        $product = $this->productRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($product) {
            $images = $this->productImageRepository->orderBy('order', 'asc')->findByField('product_id', $product->id);
            $files = $this->productFileRepository->orderBy('order', 'asc')->findWhere(['active' => 'y', 'product_id' => $product->id]);
            $texts = $this->productTextRepository->orderBy('order', 'asc')->findWhere(['active' => 'y', 'product_id' => $product->id]);

            $cover = null;
            $image = $images->firstWhere('cover', 'y');
            if (isPost($image)) {
                $cover = asset('uploads/product/' . $image->image);
            }

            $seoPage = $this->SEOService->getSeoPageSession(4);
            $this->SEOService->getPageComplement($product, $seoPage['name'], $cover, $cover);
            $products = $this->categoryRepository->orderBy('order', 'asc')->scopeQuery(function ($query) use ($product) {
                return $query->where('active', 'y');
            })->paginate(2);

            $clients = $this->clientRepository->scopeQuery(function($query) use($product){
                return $query->leftJoin('product_clients as pc', 'pc.client_id', '=', 'clients.id')
                    ->select('clients.*')
                    ->where('pc.product_id', $product->id)
                    ->where('active', 'y');
            })->all();

            return view('site.product.show', compact('product', 'seoPage', 'images', 'files', 'texts', 'products', 'clients'));
        }

        return redirect(route('product'), 301);
    }

    public function getCategoryActive()
    {
        return $this->categoryRepository->orderBy('order', 'asc')->findByField('active', 'y');
    }

}
