<?php

namespace AgenciaS3\Http\Controllers\Admin\Product;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\ClientRepository;
use AgenciaS3\Repositories\ProductClientRepository;
use AgenciaS3\Validators\ProductClientValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductClientController extends Controller
{

    protected $repository;

    protected $validator;

    protected $clientRepository;

    public function __construct(ProductClientRepository $repository,
                                ProductClientValidator $validator,
                                ClientRepository $clientRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->clientRepository = $clientRepository;
    }

    public function index($id)
    {
        $config = $this->header();
        $clients = $this->clientRepository->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        $dados = $this->repository->findWhere(['product_id' => $id]);

        return view('admin.product.client.index', compact('config', 'clients', 'dados', 'id'));
    }

    public function header()
    {
        $config['title'] = "Produtos";
        $config['activeMenu'] = 'product';
        $config['activeMenuN2'] = 'product';
        $config['action'] = 'Clientes';

        return $config;
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $verifica = $this->repository->findWhere([
            'product_id' => $data['product_id'], 'client_id' => $data['client_id']
        ]);

        if ($verifica->toArray()) {
            return redirect()->back()->withErrors('Cliente já adicionado neste produto.')->withInput();
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
        return $this->repository->deleteWhere(['product_id' => $id]);
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

    public function destroyAllClient($id)
    {
        return $this->repository->deleteWhere(['client_id' => $id]);
    }

}