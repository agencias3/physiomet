<?php

namespace AgenciaS3\Http\Controllers\Admin\Product;

use AgenciaS3\Criteria\FindByCategoryCriteria;
use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Http\Controllers\Admin\Segment\SegmentProductController;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\CategoryRepository;
use AgenciaS3\Repositories\ProductFileRepository;
use AgenciaS3\Repositories\ProductRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\ProductValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class ProductController extends Controller
{

    protected $repository;

    protected $validator;

    protected $categoryRepository;

    protected $productImageController;

    protected $productTextController;

    protected $productFileController;

    protected $segmentProductController;

    protected $productClientController;

    protected $utilObjeto;

    protected $path;

    public function __construct(ProductRepository $repository,
                                ProductValidator $validator,
                                CategoryRepository $categoryRepository,
                                ProductImageController $productImageController,
                                ProductTextController $productTextController,
                                ProductFileController $productFileController,
                                SegmentProductController $segmentProductController,
                                ProductClientController $productClientController,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->categoryRepository = $categoryRepository;
        $this->productImageController = $productImageController;
        $this->productTextController = $productTextController;
        $this->productFileController = $productFileController;
        $this->segmentProductController = $segmentProductController;
        $this->productClientController = $productClientController;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/product/';
    }

    public function index(AdminRequest $request)
    {
        $name = $request->get('name');
        $category_id = $request->get('category_id');
        if (isset($name) || isset($category_id)) {
            $this->repository->pushCriteria(new FindByNameCriteria($request->get('name')));
        } else {
            $this->repository->skipCriteria();
        }

        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->paginate();

        return view('admin.product.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Módulo";
        $config['activeMenu'] = "product";
        $config['activeMenuN2'] = "product";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $categories = $this->categoryRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('admin.product.create', compact('config', 'categories'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            if (isset($data['icon'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'icon', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['icon'] = $image;
                }
            }
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];


            return redirect()->route('admin.product.gallery.index', ['id' => $dados->id])->with('success', $response['success']);

        } catch (ValidatorException $e) {
            if (isset($data['icon'])) {
                $this->utilObjeto->destroyFile($this->path, $data['icon']);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);

        $categories = $this->categoryRepository->orderBy('name')->pluck('name', 'id')->prepend('Selecione', '');

        return view('admin.product.edit', compact('dados', 'config', 'categories'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            if (isset($data['icon'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'icon', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['icon'] = $image;
                }
            }
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro alterado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function active($id)
    {
        try {
            $dados = $this->repository->find($id);

            $data = $dados->toArray();
            if ($dados->active == 'y') {
                $data['active'] = 'n';
            } else {
                $data['active'] = 'y';
            }

            $dados = $this->repository->update($data, $id);

            return $dados;

        } catch (ValidatorException $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        $this->productImageController->destroyGallery($id);
        $this->productTextController->destroyProduct($id);
        $this->productFileController->destroyProduct($id);
        $this->segmentProductController->destroyAllProduct($id);
        $this->productClientController->destroyAllPost($id);
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
