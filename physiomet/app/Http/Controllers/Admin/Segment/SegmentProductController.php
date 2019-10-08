<?php

namespace AgenciaS3\Http\Controllers\Admin\Segment;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\ProductRepository;
use AgenciaS3\Repositories\SegmentProductRepository;
use AgenciaS3\Validators\SegmentProductValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class SegmentProductController extends Controller
{

    protected $repository;

    protected $validator;

    protected $productRepository;

    public function __construct(SegmentProductRepository $repository,
                                SegmentProductValidator $validator,
                                ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->productRepository = $productRepository;
    }

    public function index($id)
    {
        $config = $this->header();
        $products = $this->productRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        $dados = $this->repository->findWhere(['segment_id' => $id]);

        return view('admin.segment.product.index', compact('config', 'products', 'dados', 'id'));
    }

    public function header()
    {
        $config['title'] = "Seguimentos";
        $config['activeMenu'] = 'segment';
        $config['activeMenuN2'] = 'segment';
        $config['action'] = 'Produtos';

        return $config;
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $verifica = $this->repository->findWhere([
            'segment_id' => $data['segment_id'], 'product_id' => $data['product_id']
        ]);

        if ($verifica->toArray()) {
            return redirect()->back()->withErrors('Produto já adicionado neste Seguimento.')->withInput();
        } else {
            try {

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
    }

    public function destroyAllPost($id)
    {
        return $this->repository->deleteWhere(['segment_id' => $id]);
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function destroyAllProduct($id)
    {
        return $this->repository->deleteWhere(['product_id' => $id]);
    }

}