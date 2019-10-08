<?php

namespace AgenciaS3\Http\Controllers\Admin\Blog;

use AgenciaS3\Http\Controllers\Admin\Configuration\Keyword\KeywordCheckController;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\AdminRequest;
use AgenciaS3\Repositories\PostRepository;
use AgenciaS3\Repositories\SegmentRepository;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\PostValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class PostController extends Controller
{

    protected $repository;

    protected $validator;

    protected $postImageController;

    protected $postTagController;

    protected $segmentRepository;

    protected $utilObjeto;

    public function __construct(PostRepository $repository,
                                PostValidator $validator,
                                PostImageController $postImageController,
                                PostTagController $postTagController,
                                SegmentRepository $segmentRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->postImageController = $postImageController;
        $this->postTagController = $postTagController;
        $this->segmentRepository = $segmentRepository;
        $this->utilObjeto = $utilObjeto;
    }

    public function index()
    {
        $config = $this->header();
        $dados = $this->repository->orderBy('date', 'desc')->paginate();

        return view('admin.blog.post.index', compact('dados', 'config'));
    }

    public function header()
    {
        $config['title'] = "Blog";
        $config['activeMenu'] = "blog";
        $config['activeMenuN2'] = "post";

        return $config;
    }

    public function create()
    {
        $config = $this->header();
        $config['action'] = 'Cadastrar';

        $segments = $this->segmentRepository->orderBy('name', 'asc')->pluck('name', 'id')->prepend('Selecione', '');

        return view('admin.blog.post.create', compact('config', 'segments'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $data = $request->all();
            $data['date'] = data_to_mysql($data['date']);
            $data['date_publish'] = data_to_mysql_hour($data['date_publish'] . ':00');
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $dados = $this->repository->create($data);

            $response = [
                'success' => 'Registro adicionado com sucesso!'
            ];

            return redirect()->route('admin.blog.post.gallery.index', ['id' => $dados->id])->with('success', $response['success']);

        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $config = $this->header();
        $config['action'] = 'Editar';

        $dados = $this->repository->find($id);
        $dados['date'] = mysql_to_data($dados->date);
        $dados['date_publish'] = mysql_to_data($dados->date_publish, true);
        $segments = $this->segmentRepository->orderBy('name', 'asc')->pluck('name', 'id')->prepend('Selecione', '');

        $warnings[] = (new KeywordCheckController)->checkDescription($dados->description, 'Descrição', 3);
        $warnings[] = (new KeywordCheckController)->checkDescription($dados->name, 'Nome', 1);
        $warnings[] = (new KeywordCheckController)->checkDescription($dados->seo_link, 'SEO Link', 1);

        return view('admin.blog.post.edit', compact('dados', 'config', 'warnings', 'segments'));
    }

    public function update(AdminRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['date'] = data_to_mysql($data['date']);
            $data['date_publish'] = data_to_mysql_hour($data['date_publish'] . ':00');
            $data['seo_link'] = $this->utilObjeto->nameUrl($data['name']);

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            $response = [
                'success' => 'Registro atualizado com sucesso!'
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

            $update = $this->repository->update($data, $id);

            return $update;

        } catch (ValidatorException $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        $this->postTagController->destroyAllPost($id);
        $this->postImageController->destroyGallery($id);
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('success', 'Registro removido com sucesso!');
    }

}
