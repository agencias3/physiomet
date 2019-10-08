<?php

namespace AgenciaS3\Http\Controllers\Admin\Segment;

use AgenciaS3\Criteria\FindByNameCriteria;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\SegmentValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class SegmentController extends Controller
{

    protected $repository;

    protected $validator;

    protected $segmentImageController;

    protected $segmentClientController;

    protected $segmentProductController;

    protected $utilObjeto;

    protected $path;

    public function __construct(SegmentRepository $repository,
                                SegmentValidator $validator,
                                SegmentImageController $segmentImageController,
                                SegmentClientController $segmentClientController,
                                SegmentProductController $segmentProductController,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->segmentClientController = $segmentClientController;
        $this->segmentImageController = $segmentImageController;
        $this->segmentProductController = $segmentProductController;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/segment/';
    }

    public function index(AdminRequest $request)
    {
        $name = $request->get('name');
        if (isset($name)) {
            $this->repository
                ->pushCriteria(new FindByNameCriteria($name));
        } else {
            $this->repository->skipCriteria();
        }

        $config = $this->header();
        $dados = $this->repository->orderBy('order', 'asc')->paginate();

        return view('admin.segment.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Segmentos";
        $config['activeMenu'] = "segment";
        $config['activeMenuN2'] = "segment";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('admin.segment.create', compact('config'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }
            if (isset($data['file'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'file', 'max:10240');
                if ($image) {
                    $data['file'] = $image;
                }
            }
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->back()->with('success', $response['success']);
        } catch (ValidatorException $e) {
            if (isset($data['image'])) {
                $this->utilObjeto->destroyFile($this->path, $data['image']);
            }
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

        return view('admin.segment.edit', compact('dados', 'config'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            if (isset($data['image'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
                if ($image) {
                    $data['image'] = $image;
                }
            }
            if (isset($data['file'])) {
                $image = $this->utilObjeto->uploadFile($request, $data, $this->path, 'file', 'max:10240');
                if ($image) {
                    $data['file'] = $image;
                }
            }
            $check = $this->repository->find($id);
            if (!isset($data['seo_link']) || $check->name != $data['name']) {
                $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);
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
        $this->segmentClientController->destroyAllPost($id);
        $this->segmentImageController->destroyGallery($id);
        $this->segmentProductController->destroyAllPost($id);
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
