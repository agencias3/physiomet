<?php

namespace AgenciaS3\Http\Controllers\Admin\Client;

use AgenciaS3\Http\Controllers\Admin\Product\ProductClientController;
use AgenciaS3\Http\Controllers\Admin\Segment\SegmentClientController;
use AgenciaS3\Http\Controllers\Admin\Segment\SegmentController;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\ClientValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class ClientController extends Controller
{

    protected $repository;

    protected $validator;

    protected $segmentClientController;

    protected $productClientController;

    protected $utilObjeto;

    protected $path;

    public function __construct(ClientRepository $repository,
                                ClientValidator $validator,
                                SegmentClientController $segmentClientController,
                                ProductClientController $productClientController,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->segmentClientController = $segmentClientController;
        $this->productClientController = $productClientController;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/client/';
    }

    public function index()
    {
        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->paginate();

        return view('admin.client.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Clientes";
        $config['activeMenu'] = "client";
        $config['activeMenuN2'] = "client";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('admin.client.create', compact('config'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
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

        return view('admin.client.edit', compact('dados', 'config'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro atualizado com sucesso!'
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

            $update = $this->repository->update($data, $id);

            return $update;

        } catch (ValidatorException $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        $this->segmentClientController->destroyAllClient($id);
        $this->productClientController->destroyAllClient($id);
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
