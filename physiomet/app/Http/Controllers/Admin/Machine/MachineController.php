<?php

namespace AgenciaS3\Http\Controllers\Admin\Machine;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\CategoryMachineRepository;
use AgenciaS3\Repositories\MachineRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\MachineValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class MachineController extends Controller
{

    protected $repository;

    protected $validator;

    protected $machineImageController;

    protected $categoryMachineRepository;

    protected $utilObjeto;

    public function __construct(MachineRepository $repository,
                                MachineValidator $validator,
                                MachineImageController $machineImageController,
                                CategoryMachineRepository $categoryMachineRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->machineImageController = $machineImageController;
        $this->categoryMachineRepository = $categoryMachineRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index(Request $request)
    {
        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->paginate();

        return view('admin.machine.machine.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Máquinas";
        $config['activeMenu'] = "machine";
        $config['activeMenuN2'] = "machine";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $categories = $this->categoryMachineRepository->orderBy('name', 'asc')->pluck('name', 'id')->prepend('Selecione uma categoria', '');

        return view('admin.machine.machine.create', compact('config', 'categories'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->route('admin.machine.machine.gallery.index', ['id' => $dados->id])->with('success', $response['success']);
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $categories = $this->categoryMachineRepository->orderBy('name', 'asc')->pluck('name', 'id')->prepend('Selecione uma categoria', '');

        return view('admin.machine.machine.edit', compact('dados', 'config', 'categories'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
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
        $this->machineImageController->destroyGallery($id);
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
