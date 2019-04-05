<?php
namespace App\Http\Controllers\Admin;

use App\Forms\MultipleHorairesForm;
use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Horaires;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class HorairesController extends Controller
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
        $this->entity = 'horaires';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $entreprise = Entreprise::first();

        $form = $this->getForm();

        return view('back.horaires', [
            'form' => $form,
            'entity' => $this->entity
        ]);
    }


    /**
     * @param Entreprise|null $entreprise
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function getForm(?Horaires $horaires = null)
    {
        $horaires = $horaires ?: new Entreprise();
        return $this->formBuilder->create(MultipleHorairesForm::class, [
            'model' => $horaires
        ]);
    }
}