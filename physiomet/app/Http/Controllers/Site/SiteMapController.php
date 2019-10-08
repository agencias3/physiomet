<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Repositories\CategoryMachineRepository;
use AgenciaS3\Repositories\CategoryPartRepository;
use AgenciaS3\Repositories\CategorySegmentRepository;
use AgenciaS3\Repositories\ConstructionRepository;
use AgenciaS3\Repositories\MachineRepository;
use AgenciaS3\Repositories\PostRepository;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Repositories\TagRepository;

class SiteMapController extends Controller
{

    protected $tagRepository;

    protected $postRepository;

    protected $segmentRepository;

    protected $categorySegmentRepository;

    protected $machineRepository;

    protected $categoryMachineRepository;

    protected $categoryPartRepository;

    protected $constructionRepository;

    public function __construct(TagRepository $tagRepository,
                                PostRepository $postRepository,
                                SegmentRepository $segmentRepository,
                                CategorySegmentRepository $categorySegmentRepository,
                                MachineRepository $machineRepository,
                                CategoryMachineRepository $categoryMachineRepository,
                                CategoryPartRepository $categoryPartRepository,
                                ConstructionRepository $constructionRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
        $this->segmentRepository = $segmentRepository;
        $this->categorySegmentRepository = $categorySegmentRepository;
        $this->machineRepository = $machineRepository;
        $this->categoryMachineRepository = $categoryMachineRepository;
        $this->categoryPartRepository = $categoryPartRepository;
        $this->constructionRepository = $constructionRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->findByField('active', 'y');
        $posts = $this->postRepository->findByField('active', 'y');

        $segments = $this->segmentRepository->findByField('active', 'y');
        $categorySegments = $this->categorySegmentRepository->findByField('active', 'y');

        $machines = $this->machineRepository->findByField('active', 'y');
        $categoryMachines = $this->categoryMachineRepository->findByField('active', 'y');

        $categoryParts = $this->categoryPartRepository->findByField('active', 'y');
        $constructions = $this->constructionRepository->findByField('active', 'y');

        return response()
            ->view('sitemap.index', compact('tags', 'posts', 'segments', 'categorySegments', 'machines', 'categoryMachines', 'categoryParts', 'constructions'))
            ->header('Content-Type', 'text/xml');
    }
}
