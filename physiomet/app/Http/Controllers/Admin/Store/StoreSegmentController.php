<?php

namespace AgenciaS3\Http\Controllers\Admin\Store;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Repositories\StoreSegmentRepository;
use AgenciaS3\Validators\StoreSegmentValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class StoreSegmentController extends Controller
{

    protected $repository;

    protected $validator;

    protected $segmentRepository;

    public function __construct(StoreSegmentRepository $repository,
                                StoreSegmentValidator $validator,
                                SegmentRepository $segmentRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->segmentRepository = $segmentRepository;
    }

    public function index($id)
    {
        $config = $this->header();
        $segments = $this->segmentRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        $dados = $this->repository->findWhere(['store_id' => $id]);

        return view('admin.store.segment.index', compact('config', 'segments', 'dados', 'id'));
    }

    public function header()
    {
        $config['title'] = "Loja";
        $config['activeMenu'] = 'store';
        $config['activeMenuN2'] = 'store';
        $config['action'] = 'Seguimentos';

        return $config;
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $verifica = $this->repository->findWhere([
            'store_id' => $data['store_id'], 'segment_id' => $data['segment_id']
        ]);

        if ($verifica->toArray()) {
            return redirect()->back()->withErrors('Seguimento já adicionado.')->withInput();
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

    public function destroyAllSegment($id)
    {
        return $this->repository->deleteWhere(['segment_id' => $id]);
    }

}