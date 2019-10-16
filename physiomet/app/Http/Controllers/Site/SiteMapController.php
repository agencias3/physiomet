<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\PostRepository;
use AgenciaS3\Repositories\ServiceRepository;
use AgenciaS3\Repositories\TagRepository;
use AgenciaS3\Repositories\TypeRepository;

class SiteMapController extends Controller
{

    protected $tagRepository;

    protected $postRepository;

    protected $serviceRepository;

    protected $typeRepository;


    public function __construct(TagRepository $tagRepository,
                                PostRepository $postRepository,
                                ServiceRepository $serviceRepository,
                                TypeRepository $typeRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
        $this->serviceRepository = $serviceRepository;
        $this->typeRepository = $typeRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->findByField('active', 'y');
        $posts = $this->postRepository->findByField('active', 'y');
        $services = $this->serviceRepository->findByField('active', 'y');
        $types = $this->typeRepository->findByField('active', 'y');

        return response()
            ->view('sitemap.index', compact('tags', 'posts', 'services', 'types'))
            ->header('Content-Type', 'text/xml');
    }
}
