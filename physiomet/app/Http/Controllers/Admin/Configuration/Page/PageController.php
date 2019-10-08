<?php

namespace AgenciaS3\Http\Controllers\Admin\Configuration\Page;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\PageRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\PageValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class PageController extends Controller
{

    protected $repository;

    protected $validator;

    protected $utilObjeto;

    protected $path;

    public function __construct(PageRepository $repository,
                                PageValidator $validator,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/page/';
    }

    public function index()
    {
        $config = $this->header();
        $dados = $this->repository->paginate();

        return view('admin.configuration.page.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Páginas e Textos";
        $config['activeMenu'] = "configuration";
        $config['activeMenuN2'] = "page";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        return view('admin.configuration.page.create', compact('config'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            if (isset($data['image'])) {
                $data['image'] = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            }
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            $request->session()->forget('page');

            return redirect()->route('admin.configuration.page.edit', ['id' => $dados->id])->with('success', $response['success']);

        } catch (ValidatorException $e) {
            if (isset($data['image'])) {
                $this->utilObjeto->destroyFile($this->path, $data['image']);
            }
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';
        if ($id == 1 || $id == 3 || $id == 4 || $id == 5) {
            $config['activeMenu'] = "about";
        }

        if ($id == 2) {
            $config['activeMenu'] = "segment";
        }
        if ($id == 6) {
            $config['activeMenu'] = "form";
        }
        if ($id == 7) {
            $config['activeMenu'] = "tip";
        }

        $imageSize = 'xx X xx';
        if ($id == 1) {
            $imageSize = '470px X 370px';
        }
        if ($id == 2) {
            $imageSize = '500px X 537px';
        }

        $bannerSize = '1920px X 500px';
        if ($id == 1 || $id == 6 || $id == 7) {
            $bannerSize = '1920px X 500px';
        }

        $config['activeMenuN2'] = "page-" . $id;
        $dados = $this->repository->find($id);

        return view('admin.configuration.page.edit', compact('dados', 'config', 'imageSize', 'bannerSize'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            if (isset($data['image'])) {
                $data['image'] = $this->utilObjeto->uploadFile($request, $data, $this->path, 'image', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            }
            if (isset($data['banner'])) {
                $data['banner'] = $this->utilObjeto->uploadFile($request, $data, $this->path, 'banner', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            }
            if (isset($data['video_mp4'])) {
                $data['video_mp4'] = $this->utilObjeto->uploadFile($request, $data, $this->path, 'video_mp4', '');
            }
            if (isset($data['video_ogg'])) {
                $data['video_ogg'] = $this->utilObjeto->uploadFile($request, $data, $this->path, 'video_ogg', '');
            }

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro atualizado com sucesso!'
            ];

            $request->session()->forget('page');

            return redirect()->back()->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
            return redirect()->back()->withErrors("Erro ao ativar/desativar!")->withInput();
        }
    }

    public function destroy(AdminRequest $request, $id)
    {
        $deleted = $this->repository->delete($id);
        $request->session()->forget('page');
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
