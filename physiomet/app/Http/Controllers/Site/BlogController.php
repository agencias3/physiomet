<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\PostImageRepository;
use AgenciaS3\Repositories\PostRepository;
use AgenciaS3\Repositories\PostTagRepository;
use AgenciaS3\Repositories\SeoPageRepository;
use AgenciaS3\Repositories\TagRepository;
use AgenciaS3\Services\SEOService;
use AgenciaS3\Services\UtilObjeto;

class BlogController extends Controller
{
    protected $repository;

    protected $seoPageRepository;

    protected $postTagRepository;

    protected $tagRepository;

    protected $postImageRepository;

    protected $SEOService;

    protected $utilObjeto;

    public function __construct(PostRepository $repository,
                                PostImageRepository $postImageRepository,
                                PostTagRepository $postTagRepository,
                                TagRepository $tagRepository,
                                SeoPageRepository $seoPageRepository,
                                SEOService $SEOService,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->postImageRepository = $postImageRepository;
        $this->postTagRepository = $postTagRepository;
        $this->tagRepository = $tagRepository;
        $this->seoPageRepository = $seoPageRepository;
        $this->SEOService = $SEOService;
        $this->utilObjeto = $utilObjeto;
    }

    public function index(SiteRequest $request)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $search = $request->get('search');

        $seoPage = $this->SEOService->getSeoPageSession(5);
        $this->SEOService->getPage($seoPage);

        $posts = $this->repository->getPostsActive(6);
        $tags = $this->tagRepository->orderBy('name', 'asc')->findByField('active', 'y');

        return view('site.blog.index', compact('posts', 'tags', 'search', 'seoPage'));
    }

    public function tag(SiteRequest $request, $seo_link)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $search = $request->get('search');

        $tag = $this->tagRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($tag) {
            $seoPage = $this->SEOService->getSeoPageSession(5);
            $this->SEOService->getPageComplement($tag, 'Blog');

            $posts = $this->repository->getPostsTag($tag, 6);
            $tags = $this->tagRepository->orderBy('name', 'asc')->findByField('active', 'y');

            return view('site.blog.index', compact('tag', 'tags', 'posts', 'search', 'seoPage'));
        }

        return redirect(route('blog'), 301);
    }

    public function show(SiteRequest $request, $seo_link)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $post = $this->repository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($post) {
            $seoPage = $this->SEOService->getSeoPageSession(5);
            $images = $this->postImageRepository->orderBy('order', 'asc')->findWhere(['post_id' => $post->id]);
            $postTags = $this->postTagRepository->with('tag')
                ->scopeQuery(function ($query) use ($post) {
                $query = $query->leftjoin('tags as t', 't.id', '=', 'post_tags.tag_id')
                    ->select('post_tags.*')
                    ->where('post_tags.post_id', '=', $post->id)
                    ->where('t.active', '=', 'y');
                return $query;
            })->all();

            $cover = null;
            if (!$images->isEmpty()) {
                $cover = asset('uploads/post/' . $images->firstWhere('cover', 'y')->image);
            }
            $this->SEOService->getPageComplement($post, 'Blog', $cover, $cover);

            $posts = $this->repository->getPostsRecent($post->id, 3);
            //$tags = $this->tagRepository->orderBy('name', 'asc')->findByField('active', 'y');

            return view('site.blog.show', compact('posts', 'post', 'images', 'postTags', 'seoPage'));
        }

        return redirect(route('blog'), 301);
    }

    public function getFeatured()
    {
        return $this->repository->getPostsActive(3);
    }

}
