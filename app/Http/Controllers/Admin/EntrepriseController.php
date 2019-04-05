<?php

namespace App\Http\Controllers\Admin;

use App\Forms\EntrepriseForm;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class EntrepriseController extends Controller
{

    /**
     * @var FormBuilder
     */
    private $formBuilder;

    /**
     * @var string
     */
    private $entity;

    /**
     * EntrepriseController constructor.
     * @param FormBuilder $formBuilder
     */
    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
        $this->entity = 'entreprise';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $entreprise = Entreprise::first();

        $form = $this->getForm($entreprise);

        return view('back.entreprise', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    /**
     * @param Entreprise $entreprise
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Entreprise $entreprise)
    {
        $entreprise = $entreprise ?: Entreprise::first();

        $form = $this->getForm($entreprise);

        return view('back.entreprise', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $form = $this->getForm();
        $form->redirectIfNotValid();

        $entreprise = $this->process($form->getFieldValues());

        return redirect()->route('entreprise.show', [
            'entreprise' => $entreprise
        ]);
    }

//    public function edit (Entreprise $entreprise)
//    {
//        $form = $this->getForm($entreprise);
//
//        return view('back.entreprise', [
//            'form' => $form
//        ]);
//    }

    /**
     * @param Entreprise $entreprise
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Entreprise $entreprise, Request $request)
    {
        $form = $this->getForm($entreprise);
        $form->redirectIfNotValid();

        $entreprise = $this->process($form->getFieldValues(), $entreprise);

        return redirect()->route('entreprise.show', [
            'entreprise' => $entreprise
        ]);
    }

    /**
     * @param Entreprise|null $entreprise
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function getForm(?Entreprise $entreprise = null)
    {
        $entreprise = $entreprise ?: new Entreprise();
        return $this->formBuilder->create(EntrepriseForm::class, [
            'model' => $entreprise
        ]);
    }

    /**
     * @param $datas
     * @param Entreprise|null $entreprise
     * @return Entreprise
     */
    private function process($datas, Entreprise $entreprise = null)
    {
        $values = collect($datas)->filter(function ($item) {
            return !is_null($item);
//            return !is_null($item) && (!is_object($item) || !$item instanceof UploadedFile);
        });

        $store = [];
        $values->only(['logo'])
            ->each(function ($file) use (&$values, &$store) {
                if ($file->isValid()) {
                    $name = uniqid() . '_' . $file->getClientOriginalName();
                    $path = public_path('uploads');

                    $file->move($path, $name);

                    $store['logo'] = $name;
                }
            });

        if ($entreprise !== null) {
            $entreprise->fill($values->toArray());
        } else {
            $entreprise = new Entreprise($values->toArray());
        }

        if (count($store) !== 0) {
            $entreprise->logo = $store['logo'];
        }

        $entreprise->save();

        return $entreprise;
    }
}
