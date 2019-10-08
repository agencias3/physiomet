<?php

namespace AgenciaS3\Http\Controllers\Admin\Part;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\CategoryPartRepository;
use AgenciaS3\Repositories\PartRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\PartValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class PartController extends Controller
{

    protected $repository;

    protected $validator;

    protected $categoryPartRepository;

    protected $utilObjeto;

    protected $path;

    public function __construct(PartRepository $repository,
                                PartValidator $validator,
                                CategoryPartRepository $categoryPartRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->categoryPartRepository = $categoryPartRepository;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/part/part/';
    }

    public function index(Request $request)
    {
        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->paginate();

        return view('admin.part.part.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Peças";
        $config['activeMenu'] = "part";
        $config['activeMenuN2'] = "part";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $categories = $this->categoryPartRepository->orderBy('name', 'asc')->pluck('name', 'id')->prepend('Selecione uma categoria', '');

        return view('admin.part.part.create', compact('config', 'categories'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);
            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);
        } catch (ValidatorException $e) {
            if (isset($data['image'])) {
                $this->utilObjeto->destroyFile($this->path, $data['image']);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $categories = $this->categoryPartRepository->orderBy('name', 'asc')->pluck('name', 'id')->prepend('Selecione uma categoria', '');

        return view('admin.part.part.edit', compact('dados', 'config', 'categories'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);
            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }

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
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function destroyFile($id, $name)
    {
        $dados = $this->repository->find($id);
        if (isset($dados->$name)) {
            $data = $dados->toArray();
            if (isset($dados->$name) && $this->utilObjeto->destroyFile($this->path, $dados->$name)) {

                $data[$name] = '';
                $this->repository->update($data, $id);

                return redirect()->back()->with('success', ucfirst($name) . ' removida com sucesso!');
            }

            return redirect()->back()->withErrors('Erro ao excluír ' . ucfirst($name))->withInput();
        }
    }

}
