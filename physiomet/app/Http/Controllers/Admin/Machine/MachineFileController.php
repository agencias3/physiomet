<?php

namespace AgenciaS3\Http\Controllers\Admin\Machine;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\MachineFileRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\MachineFileValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class MachineFileController extends Controller
{

    protected $repository;

    protected $validator;

    protected $utilObjeto;

    protected $path;

    public function __construct(MachineFileRepository $repository,
                                MachineFileValidator $validator,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/machine/file/';
    }

    public function index($machine_id)
    {
        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->paginate();

        return view('admin.machine.machine.file.index', compact('dados', 'config', 'machine_id'));
    }

    public function header()
    {
        $config['title'] = "Máquinas > Arquivos";
        $config['activeMenu'] = "machine";
        $config['activeMenuN2'] = "machine";

        return $config;
    }

    public function create($machine_id)
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('admin.machine.machine.file.create', compact('config', 'machine_id'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            if (isset($data['file'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'file', '');
                if ($image) {
                    $data['file'] = $image;
                }
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            if (isset($data['file'])) {
                $this->utilObjeto->destroyFile($this->path, $data['file']);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $machine_id = $dados->machine_id;

        return view('admin.machine.machine.file.edit', compact('dados', 'config', 'machine_id'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            if (isset($data['file'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'file', '');
                if ($image) {
                    $data['file'] = $image;
                }
            }
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro alterado com sucesso!',
                'data' => $dados->toArray(),
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
