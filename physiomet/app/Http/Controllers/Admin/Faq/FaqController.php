<?php

namespace AgenciaS3\Http\Controllers\Admin\Faq;

use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\FaqLikeOrNotRepository;
use AgenciaS3\Repositories\FaqRepository;
use AgenciaS3\Validators\FaqValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class FaqController extends Controller
{

    protected $repository;

    protected $validator;

    protected $faqLikeOrNotRepository;

    public function __construct(FaqRepository $repository,
                                FaqValidator $validator,
                                FaqLikeOrNotRepository $faqLikeOrNotRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->faqLikeOrNotRepository = $faqLikeOrNotRepository;
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        if (isset($name) || isset($category_id)) {
            $this->repository->pushCriteria(new FindByNameCriteria($request->get('name')));
        } else {
            $this->repository->skipCriteria();
        }

        $config = $this->header();
        $dados = $this->repository->with('likes')->orderBy('order', 'asc')->paginate();

        return view('admin.faq.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "FAQ";
        $config['activeMenu'] = "faq";
        $config['activeMenuN2'] = "faq";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('admin.faq.create', compact('config'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();

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

        return view('admin.faq.edit', compact('dados', 'config'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();

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

}
