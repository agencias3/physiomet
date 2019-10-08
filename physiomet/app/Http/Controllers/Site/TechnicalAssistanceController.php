<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\Form;
use AgenciaS3\Entities\SeoPage;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Mail\Site\TechnicalAssistance\TechnicalAssistanceClientMail;
use AgenciaS3\Mail\Site\TechnicalAssistance\TechnicalAssistanceMail;
use AgenciaS3\Repositories\ComponentRepository;
use AgenciaS3\Repositories\DefectRepository;
use AgenciaS3\Repositories\FluidRepository;
use AgenciaS3\Repositories\TechnicalAssistanceProductRepository;
use AgenciaS3\Repositories\TechnicalAssistanceRepository;
use AgenciaS3\Repositories\TypeProductRepository;
use AgenciaS3\Services\SEOService;
use AgenciaS3\Services\UtilObjeto;
use AgenciaS3\Validators\TechnicalAssistanceProductValidator;
use AgenciaS3\Validators\TechnicalAssistanceValidator;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class TechnicalAssistanceController extends Controller
{

    protected $technicalAssistanceRepository;

    protected $technicalAssistanceValidator;

    protected $technicalAssistanceProductRepository;

    protected $technicalAssistanceProductValidator;

    protected $typeProductRepository;

    protected $fluidRepository;

    protected $componentRepository;

    protected $defectRepository;

    protected $utilObjeto;

    protected $path;

    public function __construct(TechnicalAssistanceRepository $technicalAssistanceRepository,
                                TechnicalAssistanceValidator $technicalAssistanceValidator,
                                TechnicalAssistanceProductRepository $technicalAssistanceProductRepository,
                                TechnicalAssistanceProductValidator $technicalAssistanceProductValidator,
                                TypeProductRepository $typeProductRepository,
                                FluidRepository $fluidRepository,
                                ComponentRepository $componentRepository,
                                DefectRepository $defectRepository,
                                UtilObjeto $utilObjeto)
    {
        $this->technicalAssistanceRepository = $technicalAssistanceRepository;
        $this->technicalAssistanceValidator = $technicalAssistanceValidator;
        $this->technicalAssistanceProductRepository = $technicalAssistanceProductRepository;
        $this->technicalAssistanceProductValidator = $technicalAssistanceProductValidator;
        $this->typeProductRepository = $typeProductRepository;
        $this->fluidRepository = $fluidRepository;
        $this->componentRepository = $componentRepository;
        $this->defectRepository = $defectRepository;
        $this->utilObjeto = $utilObjeto;
        $this->path = 'uploads/technical-assistance/';
    }

    public function index(SiteRequest $request)
    {
        $seoPage = SeoPage::find(11);
        (new SEOService)->getPage($seoPage);

        $typeProducts = $this->typeProductRepository->orderBy('order', 'asc')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecione o tipo de produto *', '');
        $fluids = $this->fluidRepository->orderBy('order', 'asc')->findByField('active', 'y')->pluck('name', 'id')->prepend('Fluído Refrigerante *', '');
        $components = $this->componentRepository->orderBy('order', 'asc')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecionar componente *', '');
        $defects = $this->defectRepository->orderBy('order', 'asc')->findByField('active', 'y')->pluck('name', 'id')->prepend('Selecionar defeito *', '');

        return view('site.technical-assistance.index', compact('typeProducts', 'fluids', 'components', 'defects'));
    }

    public function store(SiteRequest $request)
    {
        try {
            $data = $request->all();
            $data['date'] = data_to_mysql($data['date']);
            $data['view'] = 'n';
            $data['ip'] = $request->ip();
            $data['session_id'] = $request->session()->getId();

            $this->technicalAssistanceValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $contact = $this->technicalAssistanceRepository->create($data);

            $this->saveProduct($request, $data['product'], $contact->id);
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

    public function saveProduct($request, $products, $id)
    {
        if (is_array($products)) {
            foreach ($products as $key => $row) {
                $data['component_id'] = $row['component_id'];
                $data['quantity'] = $row['quantity'];
                $data['defect_id'] = $row['defect_id'];
                $data['technical_assistance_id'] = $id;

                if (isset($row['file'])) {
                    //dd($request->product[$key]['file']);
                    $fileName = md5(time() . rand(1, 8)) . '.' . $row['file']->getClientOriginalExtension();
                    $request->product[$key]['file']->move(public_path($this->path), $fileName);
                    $data['file'] = $fileName;
                }

                $this->technicalAssistanceProductValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
                $contact = $this->technicalAssistanceProductRepository->create($data);
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
