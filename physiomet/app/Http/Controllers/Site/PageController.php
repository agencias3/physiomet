<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\PageImageRepository;
use AgenciaS3\Repositories\PageItemRepository;
use AgenciaS3\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    protected $repository;

    protected $pageImageRepository;

    protected $pageItemRepository;

    public function __construct(PageRepository $repository,
                                PageImageRepository $pageImageRepository,
                                PageItemRepository $pageItemRepository)
    {
        $this->repository = $repository;
        $this->pageImageRepository = $pageImageRepository;
        $this->pageItemRepository = $pageItemRepository;
    }

    public function show($id)
    {
        //Session::forget('page');
        $this->repository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        if (!Session::has('page') || !isset(Session::get('page')[$id])) {
            $page = $this->repository->find($id);
            $arrayConfig[$page->id] = [
                'id' => $page->id,
                'name' => $page->name,
                'sub_name' => $page->sub_name,
                'description' => $page->description,
                'image' => $page->image,
                'banner' => $page->banner,
                'video' => $page->video,
                'video_mp4' => $page->video_mp4,
                'video_ogg' => $page->video_ogg,
                'order' => $page->order
            ];

            //salvar na session
            session()->put('page', $arrayConfig);
        }

        return session()->get('page')[$id];
    }

    public function images($id)
    {
        $this->pageImageRepository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->pageImageRepository->orderBy('order', 'asc')->findByField('page_id', $id);
    }

    public function items($id)
    {
        $this->pageItemRepository->popCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return $this->pageItemRepository->orderBy('order', 'asc')->findWhere(['page_id' => $id, 'active' => 'y']);
    }

}
