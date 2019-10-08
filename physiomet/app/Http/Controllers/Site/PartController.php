<?php

namespace AgenciaS3\Http\Controllers\Site;

use AgenciaS3\Entities\Form;
use AgenciaS3\Entities\SeoPage;
use AgenciaS3\Http\Controllers\Controller;
use AgenciaS3\Http\Requests\SiteRequest;
use AgenciaS3\Mail\Site\Part\PartClientMail;
use AgenciaS3\Mail\Site\Part\PartMail;
use AgenciaS3\Repositories\CategoryPartRepository;
use AgenciaS3\Repositories\PartContactRepository;
use AgenciaS3\Repositories\PartRepository;
use AgenciaS3\Services\SEOService;
use AgenciaS3\Validators\PartContactValidator;
use Illuminate\Support\Facades\Mail;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class PartController extends Controller
{

    protected $categoryPartRepository;

    protected $partRepository;

    protected $partContactRepository;

    protected $partContactValidator;

    public function __construct(CategoryPartRepository $categoryPartRepository,
                                PartRepository $partRepository,
                                PartContactRepository $partContactRepository,
                                PartContactValidator $partContactValidator)
    {
        $this->categoryPartRepository = $categoryPartRepository;
        $this->partRepository = $partRepository;
        $this->partContactRepository = $partContactRepository;
        $this->partContactValidator = $partContactValidator;
    }

    public function index(SiteRequest $request)
    {
        $seoPage = SeoPage::find(5);
        (new SEOService)->getPage($seoPage);

        $categories = $this->categoryPartRepository->orderBy('order', 'asc')->findByField('active', 'y');
        $parts = $this->partRepository
            ->orderBy('order', 'asc')
            ->scopeQuery(function ($query) use ($categories) {
                return $query->where('active', 'y')
                    ->where('category_id', $categories->first()->id)
                    ->where('image', '!=', null);
            })->paginate(12);

        return view('site.part.index', compact('seoPage', 'categories', 'parts'));
    }

    public function category(SiteRequest $request, $seo_link)
    {
        $category = $this->categoryPartRepository->findWhere(['active' => 'y', 'seo_link' => $seo_link])->first();
        if ($category) {
            $cover = null;
            if (isPost($category->image)) {
                $cover = asset('uploads/segment/category/' . $category->image);
            }

            $seoPage = SeoPage::find(4);
            (new SEOService)->getPageComplement($category, $seoPage->name, $cover, $cover);

            $categories = $this->categoryPartRepository->orderBy('order', 'asc')->findByField('active', 'y');
            $parts = $this->partRepository
                ->orderBy('order', 'asc')
                ->scopeQuery(function ($query) use ($category) {
                    return $query->where('active', 'y')
                        ->where('category_id', $category->id)
                        ->where('image', '!=', null);
                })->paginate(12);

            return view('site.part.index', compact('category', 'seoPage', 'parts', 'categories'));
        }

        return redirect()->route('part');
    }

    public function store(SiteRequest $request)
    {
        try {
            $data = $request->all();
            $data['view'] = 'n';
            $data['ip'] = $request->ip();
            $data['session_id'] = $request->session()->getId();

            $this->partContactValidator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $contact = $this->partContactRepository->create($data);

            $this->sendMail($contact);

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

    public function sendMail($dados)
    {
        $form = Form::with('emails')->find(6);

        //email admin
        if ($form->emails) {
            $emails = [];
            foreach ($form->emails as $row) {
                $emails[] = $row->email;
            }
            Mail::to($emails)->send(new PartMail($dados));
        }

        //email client
        return Mail::to($dados)->send(new PartClientMail($dados, $form));
    }

}
