<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Criteria\FindByAddressCriteria;
use AgenciaS3\Criteria\FindByMinMaxDimensionCriteria;
use AgenciaS3\Criteria\FindByMinMaxPriceCriteria;
use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Criteria\FindByStoreNameCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\EnterpriseRepository;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Repositories\StoreImageRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Services\SEOService;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{

    protected $SEOService;

    protected $repository;

    protected $storeImageRepository;

    protected $segmentRepository;

    protected $enterpriseRepository;

    public function __construct(SEOService $SEOService,
                                StoreRepository $repository,
                                StoreImageRepository $storeImageRepository,
                                SegmentRepository $segmentRepository,
                                EnterpriseRepository $enterpriseRepository)
    {
        $this->SEOService = $SEOService;
        $this->repository = $repository;
        $this->storeImageRepository = $storeImageRepository;
        $this->segmentRepository = $segmentRepository;
        $this->enterpriseRepository = $enterpriseRepository;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(3);
        $this->SEOService->getPage($seoPage);

        $minPrice = $request->get('minPrice');
        $maxPrice = $request->get('maxPrice');
        $minDimension = $request->get('minDimension');
        $maxDimension = $request->get('maxDimension');
        $address = $request->get('address');
        $search = false;
        if (isset($minPrice) || isset($maxPrice) || isset($minDimension) || isset($maxDimension) || isset($address)) {
            $this->repository
                ->pushCriteria(new FindByMinMaxPriceCriteria($minPrice, $maxPrice))
                ->pushCriteria(new FindByMinMaxDimensionCriteria($minDimension, $maxDimension))
                ->pushCriteria(new FindByAddressCriteria($address))
                ->pushCriteria(new FindByStoreNameCriteria($address));
            $search = true;
        } else {
            $this->repository->skipCriteria();
        }

        $stores = $this->repository->with(['images', 'enterprise'])
            ->orderBy('order', 'asc')->scopeQuery(function ($query) {
                return $query->where('active', 'y');
            })->paginate(12);

        return view('site.store.index', compact('seoPage', 'stores', 'request', 'search'));
    }

    public function show(SiteRequest $request, $enterprise, $seo_link)
    {
        $getEnterprise = $this->enterpriseRepository->findWhere(['active' => 'y', 'seo_link' => $enterprise])->first();
        if($getEnterprise) {
            $store = $this->repository->with('enterprise')->findWhere(['active' => 'y', 'seo_link' => $seo_link, 'enterprise_id' => $getEnterprise->id])->first();
            if ($store) {
                $images = $this->storeImageRepository->orderBy('order', 'asc')->findWhere(['store_id' => $store->id]);

                $cover = null;
                if (!$images->isEmpty()) {
                    $cover = asset('uploads/store/' . $images->firstWhere('cover', 'y')->image);
                }

                $seoPage = $this->SEOService->getSeoPageSession(3);
                $this->SEOService->getPageComplement($store, 'Lojas', $cover, $cover);

                $relateds = $this->repository->getRelateds($store, 5);

                return view('site.store.show', compact('seoPage', 'store', 'images', 'relateds'));
            }
        }

        return redirect(route('store'), 301);
    }

    public function getBySegment($id)
    {
        return $this->repository->getSegments($id);
    }

    public function getByMinPrice()
    {
        if (!Session::has('minPrice') || !isPost(Session::get('minPrice'))) {
            $dados = $this->repository->orderBy('price', 'asc')->scopeQuery(function ($query) {
                return $query->where('active', 'y')->limit(1);
            })->all()->first();

            if ($dados) {
                $arrayConfig = [
                    'id' => $dados->id,
                    'price' => $dados->price
                ];

                //salvar na session
                session()->put('minPrice', $arrayConfig);

                return $dados->price;
            }
        } else {
            return session()->get('minPrice')['price'];
        }

        return 0;
    }

    public function getByMaxPrice()
    {
        if (!Session::has('maxPrice') || !isPost(Session::get('maxPrice'))) {
            $dados = $this->repository->orderBy('price', 'desc')->scopeQuery(function ($query) {
                return $query->where('active', 'y')->limit(1);
            })->all()->first();

            if ($dados) {
                $arrayConfig = [
                    'id' => $dados->id,
                    'price' => $dados->price
                ];

                //salvar na session
                session()->put('maxPrice', $arrayConfig);

                return $dados->price;
            }

        } else {
            return session()->get('maxPrice')['price'];
        }

        return 0;
    }

    public function getByMinDimension()
    {
        if (!Session::has('minDimension') || !isPost(Session::get('minDimension'))) {
            $dados = $this->repository->orderBy('dimension', 'asc')->scopeQuery(function ($query) {
                return $query->where('active', 'y')->limit(1);
            })->all()->first();

            if ($dados) {
                $arrayConfig = [
                    'id' => $dados->id,
                    'dimension' => $dados->dimension
                ];

                //salvar na session
                session()->put('minDimension', $arrayConfig);

                return $dados->dimension;
            }
        } else {
            return session()->get('minDimension')['dimension'];
        }

        return 0;
    }

    public function getByMaxDimension()
    {
        if (!Session::has('maxDimension') || !isPost(Session::get('maxDimension'))) {
            $dados = $this->repository->orderBy('dimension', 'desc')->scopeQuery(function ($query) {
                return $query->where('active', 'y')->limit(1);
            })->all()->first();

            if ($dados) {
                $arrayConfig = [
                    'id' => $dados->id,
                    'dimension' => $dados->dimension
                ];

                //salvar na session
                session()->put('maxDimension', $arrayConfig);

                return $dados->dimension;
            }
        } else {
            return session()->get('maxDimension')['dimension'];
        }

        return 0;
    }

}
