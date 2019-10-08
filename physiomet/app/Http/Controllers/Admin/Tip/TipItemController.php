<?php

namespace AgenciaS3\Http\Controllers\Admin\Tip;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\TipItemRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\TipItemValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class TipItemController extends Controller
{

    protected $repository;

    protected $validator;

    protected $utilObjeto;

    public function __construct(TipItemRepository $repository,
                                TipItemValidator $validator,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->utilObjeto = $utilObjeto;
    }

    public function index($tip_id)
    {
        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->scopeQuery(function ($query) use ($tip_id) {
            return $query->where('tip_id', $tip_id);
        })->paginate();

        return view('admin.tip.item.index', compact('dados', 'config', 'tip_id'));
    }

    public function header()
    {
        $config['title'] = "Você Sabia? > Ítens";
        $config['activeMenu'] = "service";
        $config['activeMenuN2'] = "service";

        return $config;
    }

    public function create($tip_id)
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('admin.tip.item.create', compact('config', 'tip_id'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            if (isset($data['icon'])) {
                $data['icon'] = $this->uploadIcon($request, $data);
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        $dados = $this->repository->find($id);
        $tip_id = $dados->tip_id;

        return view('admin.tip.item.edit', compact('dados', 'config', 'tip_id'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            if (isset($data['icon'])) {
                $data['icon'] = $this->uploadIcon($request, $data);
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

    public function destroyTip($tip_id)
    {
        if ($tip_id) {
            return $this->repository->deleteWhere(['tip_id' => $tip_id]);
        }

        return false;
    }

}
