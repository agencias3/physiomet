<?php

namespace AgenciaS3\Http\Controllers\Admin\Store;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\StoreRelatedRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Validators\StoreRelatedValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class StoreRelatedController extends Controller
{

    protected $repository;

    protected $validator;

    protected $storeRepository;

    public function __construct(StoreRelatedRepository $repository,
                                StoreRelatedValidator $validator,
                                StoreRepository $storeRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->storeRepository = $storeRepository;
    }

    public function index($id)
    {
        $config = $this->header();
        $stores = $this->storeRepository->orderBy('name', 'asc')->findWhere(['active' => 'y', ['id', '!=', $id]]);
        $dados = $this->repository->findWhere(['store_id' => $id]);

        return view('admin.store.related.index', compact('config', 'stores', 'dados', 'id'));
    }

    public function header()
    {
        $config['title'] = "Loja";
        $config['activeMenu'] = 'store';
        $config['activeMenuN2'] = 'store';
        $config['action'] = 'Relacionadas';

        return $config;
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $verifica = $this->repository->findWhere([
            'store_id' => $data['store_id'], 'store_related_id' => $data['store_related_id']
        ]);

        if ($verifica->toArray()) {
            return redirect()->back()->withErrors('Loja já adicionada.')->withInput();
        } else {
            try {

                $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $dados = $this->repository->create($data);

                $response = [
                    'success' => 'Registro adicionado com sucesso!',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('success', $response['success']);

            } catch (ValidatorException $e) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'error' => true,
                        'message' => $e->getMessageBag()
                    ]);
                }

                return redirect()->back()->withErrors($e->getMessageBag())->withInput();
            }
        }
    }

    public function destroyAllStore($id)
    {
        return $this->repository->deleteWhere(['store_id' => $id]);
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function destroyAllRelated($id)
    {
        return $this->repository->deleteWhere(['store_related_id' => $id]);
    }

}