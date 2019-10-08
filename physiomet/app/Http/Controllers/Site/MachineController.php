<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\SeoPage;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\CategoryMachineRepository;
use AgenciaS3\Repositories\MachineFileRepository;
use AgenciaS3\Repositories\MachineImageRepository;
use AgenciaS3\Repositories\MachineRepository;
use AgenciaS3\Services\SEOService;

class MachineController extends Controller
{

    protected $categoryMachineRepository;

    protected $machineRepository;

    protected $machineImageRepository;

    protected $machineFileRepository;

    public function __construct(CategoryMachineRepository $categoryMachineRepository,
                                MachineRepository $machineRepository,
                                MachineImageRepository $machineImageRepository,
                                MachineFileRepository $machineFileRepository)
    {
        $this->categoryMachineRepository = $categoryMachineRepository;
        $this->machineRepository = $machineRepository;
        $this->machineImageRepository = $machineImageRepository;
        $this->machineFileRepository = $machineFileRepository;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = SeoPage::find(4);
        (new SEOService)->getPage($seoPage);

        $categories = $this->categoryMachineRepository->orderBy('order', 'asc')->findByField('active', 'y');
        $machines = $this->machineRepository
            ->with('images')
            ->orderBy('order', 'asc')
            ->scopeQuery(function ($query) use ($categories) {
                return $query->where('active', 'y')
                    ->where('category_id', $categories->first()->id);
            })->paginate(12);

        return view('site.machine.index', compact('seoPage', 'categories', 'machines'));
    }

    public function category(SiteRequest $request, $seo_link)
    {
        $category = $this->categoryMachineRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($category) {
            $cover = null;
            if (isPost($category->image)) {
                $cover = asset('uploads/segment/category/' . $category->image);
            }

            $seoPage = SeoPage::find(4);
            (new SEOService)->getPageComplement($category, $seoPage->name, $cover, $cover);

            $categories = $this->categoryMachineRepository->orderBy('order', 'asc')->findByField('active', 'y');
            $machines = $this->machineRepository
                ->with('images')
                ->orderBy('order', 'asc')
                ->scopeQuery(function ($query) use ($category) {
                    return $query->where('active', 'y')
                        ->where('category_id', $category->id);
                })->paginate(12);
            return view('site.machine.index', compact('category', 'seoPage', 'machines', 'categories'));
        }

        return redirect()->route('machine');
    }

    public function show(SiteRequest $request, $category, $seo_link)
    {
        $machine = $this->machineRepository->with('category')->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($machine) {
            $images = $this->machineImageRepository->orderBy('order', 'asc')->findByField('machine_id', $machine->id);

            $cover = null;
            $image = $images->firstWhere('cover', 'y');
            if (isPost($image)) {
                $cover = asset('uploads/machine/machine/' . $image->image);
            }

            $seoPage = SeoPage::find(4);
            (new SEOService)->getPageComplement($machine, $machine->category->name . ' - ' . $seoPage->name, $cover, $cover);

            $files = $this->machineFileRepository->orderBy('order', 'asc')->findByField('machine_id', $machine->id);
            $machinesRelated = $this->machineRepository
                ->with('images')
                ->orderBy('order', 'asc')
                ->scopeQuery(function ($query) use ($machine) {
                    return $query->where('active', 'y')
                        ->where('category_id', $machine->category->id)
                        ->where('id', '!=', $machine->id)
                        ->orderBy('order', 'asc');
                })->paginate(6);

            return view('site.machine.show', compact('machine', 'seoPage', 'images', 'files', 'machinesRelated'));
        }

        return redirect()->route('machine');
    }

}
