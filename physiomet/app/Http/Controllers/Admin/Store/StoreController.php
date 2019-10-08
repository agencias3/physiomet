<?php

namespace AgenciaS3\Http\Controllers\Admin\Store;

use AgenciaS3\Criteria\FindByEnterpriseCriteria;
use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\EnterpriseRepository;
use AgenciaS3\Repositories\StoreRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\StoreValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class StoreController extends Controller
{

    protected $repository;

    protected $validator;

    protected $storeImageController;

    protected $enterpriseRepository;

    protected $storeRelatedController;

    protected $utilObjeto;

    protected $path;

    public function __construct(StoreRepository $repository,
                                StoreValidator $validator,
                                StoreImageController $storeImageController,
                                EnterpriseRepository $enterpriseRepository,
                                StoreRelatedController $storeRelatedController,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->storeImageController = $storeImageController;
        $this->enterpriseRepository = $enterpriseRepository;
        $this->storeRelatedController = $storeRelatedController;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/store/';
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        $enterprise_id = $request->get('enterprise_id');
        if (isset($name) || isset($enterprise_id)) {
            $this->repository
                ->pushCriteria(new FindByNameCriteria($name))
                ->pushCriteria(new FindByEnterpriseCriteria($enterprise_id));
        } else {
            $this->repository->skipCriteria();
        }

        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->paginate();
        $enterprises = $this->enterpriseRepository->orderBy('name', 'asc')->findByField('active', 'y')->pluck('name', 'id')->prepend('Empreendimento', '');

        return view('admin.store.index', compact('dados', 'config', 'enterprises'));
    }

    public function header()
    {
        $config['title'] = "Lojas";
        $config['activeMenu'] = "store";
        $config['activeMenuN2'] = "store";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $enterprises = $this->enterpriseRepository->orderBy('name', 'asc')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');

        return view('admin.store.create', compact('config', 'enterprises'));
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
            if (isset($data['price'])) {
                $data['price'] = trataCampoValor($data['price']);
            }
            if (isset($data['price_iptu'])) {
                $data['price_iptu'] = trataCampoValor($data['price_iptu']);
            }
            if (isset($data['price_condominium'])) {
                $data['price_condominium'] = trataCampoValor($data['price_condominium']);
            }
            if (isset($data['dimension'])) {
                $data['dimension'] = trataCampoValor($data['dimension']);
            }
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $request->session()->forget('minPrice');
            $request->session()->forget('maxPrice');
            $request->session()->forget('minDimension');
            $request->session()->forget('maxDimension');

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->route('admin.store.gallery.index', ['id' => $dados->id])->with('success', $response['success']);
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

        $dados['price'] = formata_valor($dados['price']);
        $dados['price_iptu'] = formata_valor($dados['price_iptu']);
        $dados['price_condominium'] = formata_valor($dados['price_condominium']);
        $dados['dimension'] = formata_valor($dados['dimension']);

        $enterprises = $this->enterpriseRepository->orderBy('name', 'asc')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione', '');

        return view('admin.store.edit', compact('dados', 'config', 'enterprises'));
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
            if (isset($data['price'])) {
                $data['price'] = trataCampoValor($data['price']);
            }
            if (isset($data['price_iptu'])) {
                $data['price_iptu'] = trataCampoValor($data['price_iptu']);
            }
            if (isset($data['price_condominium'])) {
                $data['price_condominium'] = trataCampoValor($data['price_condominium']);
            }
            if (isset($data['dimension'])) {
                $data['dimension'] = trataCampoValor($data['dimension']);
            }
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $request->session()->forget('minPrice');
            $request->session()->forget('maxPrice');
            $request->session()->forget('minDimension');
            $request->session()->forget('maxDimension');

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
        $this->storeImageController->destroyGallery($id);
        $this->storeRelatedController->destroyAllStore($id);
        $this->storeRelatedController->destroyAllRelated($id);
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

    public function updateDimension()
    {
        $dados = $this->repository->all();
        if($dados){
            foreach($dados as $row){
                $data = $row->toArray();
                try {
                    $dimension = explode('m²', $data['dimension']);
                    $data['dimension'] = trataCampoValor($dimension[0]);

                    $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                    $this->repository->update($data, $row->id);

                } catch (ValidatorException $e) {
                    return redirect()->back()->withErrors($e->getMessageBag())->withInput();
                }
            }
        }
    }

}
