<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\Form;
use AgenciaS3\Entities\SeoPage;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Mail\Site\TechnicalAssistance\TechnicalAssistanceClientMail;
use AgenciaS3\Mail\Site\TechnicalAssistance\TechnicalAssistanceMail;
use AgenciaS3\Repositories\BudgetProductRepository;
use AgenciaS3\Repositories\BudgetRepository;
use AgenciaS3\Services\SEOService;
use AgenciaS3\Validators\BudgetProductValidator;
use AgenciaS3\Validators\BudgetValidator;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class BudgetController extends Controller
{

    protected $repository;

    protected $validator;

    protected $budgetProductRepository;

    protected $budgetProductValidator;

    public function __construct(BudgetRepository $repository,
                                BudgetValidator $validator,
                                BudgetProductRepository $budgetProductRepository,
                                BudgetProductValidator $budgetProductValidator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->budgetProductRepository = $budgetProductRepository;
        $this->budgetProductValidator = $budgetProductValidator;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = SeoPage::find(8);
        (new SEOService)->getPage($seoPage);

        return view('site.budget.index');
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

            $this->saveProduct($request, $data['product'], $contact->id);
            //$this->sendMail($contact);

            return response()->json([
                'success' => true,
                'message' => 'Orçamento enviado com sucesso!'
            ]);

        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function saveProduct($request, $products, $id)
    {
        if (is_array($products)) {
            foreach ($products as $key => $row) {
                $data['budget_id'] = $id;
                $data['finality'] = $row['finality'];
                if (isPost($row['internal_temperature'])) {
                    $data['internal_temperature'] = trataCampoValor($row['internal_temperature']);
                }
                if (isPost($row['average_temperature_inlet'])) {
                    $data['average_temperature_inlet'] = trataCampoValor($row['average_temperature_inlet']);
                }
                if (isPost($row['daily_entry'])) {
                    $data['daily_entry'] = trataCampoValor($row['daily_entry']);
                }
                $data['feeding'] = $row['feeding'];
                if (isPost($row['length'])) {
                    $data['length'] = trataCampoValor($row['length']);
                }
                if (isPost($row['height'])) {
                    $data['height'] = trataCampoValor($row['height']);
                }
                if (isPost($row['depth'])) {
                    $data['depth'] = trataCampoValor($row['depth']);
                }
                $data['core'] = $row['core'];
                $data['type_budget'] = $row['type_budget'];
                if (isPost($row['port_length'])) {
                    $data['port_length'] = trataCampoValor($row['port_length']);
                }
                if (isPost($row['port_height'])) {
                    $data['port_height'] = trataCampoValor($row['port_height']);
                }
                $data['port_type'] = $row['port_type'];
                $data['information'] = $row['information'];

                $this->budgetProductValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $contact = $this->budgetProductRepository->create($data);
            }
            return true;
        }

        return response()->json([
            'error' => true,
            'message' => 'Nenhum produto vinculado'
        ]);
    }

    public function sendMail($dados)
    {
        $form = Form::with('emails')->find(4);

        //email admin
        if ($form->emails) {
            $emails = [];
            foreach ($form->emails as $row) {
                $emails[] = $row->email;
            }
            Mail::to($emails)->send(new TechnicalAssistanceMail($dados));
        }

        //email client
        return Mail::to($dados)->send(new TechnicalAssistanceClientMail($dados, $form));
    }

}
