<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\Form;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Mail\Site\Contact\PartnerClientMail;
use AgenciaS3\Mail\Site\Contact\PartnerMail;
use AgenciaS3\Repositories\ContactRepository;
use AgenciaS3\Services\SEOService;
use AgenciaS3\Validators\ContactValidator;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ContactController extends Controller
{

    protected $repository;

    protected $validator;

    protected $SEOService;

    public function __construct(ContactRepository $repository,
                                ContactValidator $validator,
                                SEOService $SEOService)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->SEOService = $SEOService;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = $this->SEOService->getSeoPageSession(6);
        $this->SEOService->getPage($seoPage);

        return view('site.contact.index', compact('seoPage'));
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

            $this->sendMail($contact);

            return response()->json([
                'success' => true,
                'message' => 'Contato enviado com sucesso!'
            ]);

        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function sendMail($dados)
    {
        $form = Form::with('emails')->find(1);

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
