<?php

namespace AgenciaS3\Http\Controllers\Admin\Segment;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Repositories\StoreSegmentRepository;
use AgenciaS3\Validators\StoreSegmentValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class SegmentStoreController extends Controller
{

    protected $repository;

    protected $validator;

    protected $storeRepository;

    protected $segmentRepository;

    public function __construct(StoreSegmentRepository $repository,
                                StoreSegmentValidator $validator,
                                StoreRepository $storeRepository,
                                SegmentRepository $segmentRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->storeRepository = $storeRepository;
        $this->segmentRepository = $segmentRepository;
    }

    public function index($id)
    {
        $config = $this->header();
        $stores = $this->storeRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        $dados = $this->repository->findWhere(['segment_id' => $id]);

        return view('admin.segment.store.index', compact('config', 'stores', 'dados', 'id'));
    }

    public function header()
    {
        $config['title'] = "Seguimentos";
        $config['activeMenu'] = 'segment';
        $config['activeMenuN2'] = 'segment';
        $config['action'] = 'Lojas';

        return $config;
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $verifica = $this->repository->findWhere([
            'store_id' => $data['store_id'], 'segment_id' => $data['segment_id']
        ]);

        //dd($data);
        //dd($verifica);

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

    public function destroyAllSegment($id)
    {
        return $this->repository->deleteWhere(['segment_id' => $id]);
    }

}