<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\Form;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Mail\Site\Partner\PartnerClientMail;
use AgenciaS3\Mail\Site\Partner\PartnerMail;
use AgenciaS3\Repositories\PartnerClientRepository;
use AgenciaS3\Repositories\PartnerContactRepository;
use AgenciaS3\Repositories\PartnerProductRepository;
use AgenciaS3\Repositories\PartnerProviderRepository;
use AgenciaS3\Repositories\PartnerRepository;
use AgenciaS3\Services\SEOService;
use AgenciaS3\Validators\PartnerClientValidator;
use AgenciaS3\Validators\PartnerContactValidator;
use AgenciaS3\Validators\PartnerProductValidator;
use AgenciaS3\Validators\PartnerProviderValidator;
use AgenciaS3\Validators\PartnerValidator;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class PartnerController extends Controller
{

    protected $repository;

    protected $validator;

    protected $partnerContactRepository;

    protected $partnerContactValidator;

    protected $partnerProductRepository;

    protected $partnerProductValidator;

    protected $partnerClientRepository;

    protected $partnerClientValidator;

    protected $partnerProviderRepository;

    protected $partnerProviderValidator;

    protected $SEOService;

    public function __construct(PartnerRepository $repository,
                                PartnerValidator $validator,
                                PartnerContactRepository $partnerContactRepository,
                                PartnerContactValidator $partnerContactValidator,
                                PartnerProductRepository $partnerProductRepository,
                                PartnerProductValidator $partnerProductValidator,
                                PartnerClientRepository $partnerClientRepository,
                                PartnerClientValidator $partnerClientValidator,
                                PartnerProviderRepository $partnerProviderRepository,
                                PartnerProviderValidator $partnerProviderValidator,
                                SEOService $SEOService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->partnerContactRepository = $partnerContactRepository;
        $this->partnerContactValidator = $partnerContactValidator;
        $this->partnerProductRepository = $partnerProductRepository;
        $this->partnerProductValidator = $partnerProductValidator;
        $this->partnerClientRepository = $partnerClientRepository;
        $this->partnerClientValidator = $partnerClientValidator;
        $this->partnerProviderRepository = $partnerProviderRepository;
        $this->partnerProviderValidator = $partnerProviderValidator;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(8);
        $this->SEOService->getPage($seoPage);

        return view('site.partner.index', compact('seoPage'));
    }

    public function store(SiteRequest $request)
    {
        try {
            $data = $request->all();
            $data['view'] = 'n';

            $data['ip'] = $request->ip();
            $data['session_id'] = $request->session()->getId();

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $contact = $this->repository->create($data);

            if(isset($data['contact'])) {
                $this->createPartnerContact($contact->id, $data['contact']);
            }
            if(isset($data['product'])) {
                $this->createPartnerProduct($contact->id, $data['product']);
            }
            if(isset($data['client'])) {
                $this->createPartnerClient($contact->id, $data['client']);
            }
            if(isset($data['provider'])) {
                $this->createPartnerProvider($contact->id, $data['provider']);
            }
            $this->sendMail($contact);

            return response()->json([
                'success' => true,
                'message' => 'Menssagem enviada com sucesso!'
            ]);

        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function createPartnerContact($partner_id, $dados)
    {
        if ($partner_id && is_array($dados) && count($dados) > 0) {
            foreach ($dados as $row) {
                if (isset($row['name']) || isset($row['office']) || isset($row['phone'])) {
                    $data = $row;
                    $data['partner_id'] = $partner_id;
                    $this->partnerContactValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                    $contact = $this->partnerContactRepository->create($data);
                }
            }
        }

        return true;
    }

    public function createPartnerProduct($partner_id, $dados)
    {
        if ($partner_id && is_array($dados) && count($dados) > 0) {
            foreach ($dados as $row) {
                if (isset($row['product']) || isset($row['manufacturer']) || isset($row['description'])) {
                    $data = $row;
                    $data['partner_id'] = $partner_id;
                    $this->partnerProductValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                    $contact = $this->partnerProductRepository->create($data);
                }
            }
        }

        return true;
    }

    public function createPartnerClient($partner_id, $dados)
    {
        if ($partner_id && is_array($dados) && count($dados) > 0) {
            foreach ($dados as $row) {
                if (isset($row['social_reason']) || isset($row['cnpj']) || isset($row['phone']) || isset($row['state']) || isset($row['city'])) {
                    $data = $row;
                    $data['partner_id'] = $partner_id;
                    $this->partnerClientValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                    $contact = $this->partnerClientRepository->create($data);
                }
            }
        }

        return true;
    }

    public function createPartnerProvider($partner_id, $dados)
    {
        if ($partner_id && is_array($dados) && count($dados) > 0) {
            foreach ($dados as $row) {
                if (isset($row['social_reason']) || isset($row['cnpj']) || isset($row['phone']) || isset($row['state']) || isset($row['city'])) {
                    $data = $row;
                    $data['partner_id'] = $partner_id;
                    $this->partnerProviderValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                    $contact = $this->partnerProviderRepository->create($data);
                }
            }
        }

        return true;
    }

    public function sendMail($dados)
    {
        $form = Form::with('emails')->find(3);

        //email admin
        if ($form->emails) {
            $emails = [];
            foreach ($form->emails as $row) {
                $emails[] = $row->email;
            }
            Mail::to($emails)->send(new PartnerMail($dados));
        }

        //email client
        return Mail::to($dados)->send(new PartnerClientMail($dados, $form));
    }

}
