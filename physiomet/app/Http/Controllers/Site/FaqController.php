<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Repositories\FaqLikeOrNotRepository;
use AgenciaS3\Repositories\FaqRepository;
use AgenciaS3\Services\SEOService;
use AgenciaS3\Validators\FaqLikeOrNotValidator;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class FaqController extends Controller
{

    protected $repository;

    protected $faqLikeOrNotRepository;

    protected $faqLikeOrNotValidator;

    protected $SEOService;

    public function __construct(FaqRepository $repository,
                                FaqLikeOrNotRepository $faqLikeOrNotRepository,
                                FaqLikeOrNotValidator $faqLikeOrNotValidator,
                                SEOService $SEOService)
    {
        $this->repository = $repository;
        $this->faqLikeOrNotRepository = $faqLikeOrNotRepository;
        $this->faqLikeOrNotValidator = $faqLikeOrNotValidator;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(6);
        $this->SEOService->getPage($seoPage);

        $faqs = $this->repository->orderBy('order', 'asc')->findByField('active', 'y');

        return view('site.faq.index', compact('seoPage', 'faqs'));
    }

    public function like(SiteRequest $request, $faq_id, $like)
    {
        if (isPost($faq_id) && isPost($like)) {
            try {
                $data['faq_id'] = $faq_id;
                $data['like'] = $like;

                $this->faqLikeOrNotValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $dados = $this->faqLikeOrNotRepository->create($data);

                if ($like == 'y') {
                    $message = 'Like adicionado com sucesso!';
                } else {
                    $message = 'Not Like adicionado com sucesso!';
                }

                return response()->json([
                    'success' => true,
                    'message' => $message
                ]);
            } catch (ValidatorException $e) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

        }
    }

}
