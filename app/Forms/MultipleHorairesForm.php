<?php
namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class MultipleHorairesForm extends Form
{
    public function buildForm()
    {
        if($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('horaires.update', $this->getModel()->id);
        } else {
            $method = 'POST';
            $url = route('horaires.store');
        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url
        ];

        $this
            ->add('horaires', 'collection', [
                'type' => 'form',
                'options' => [
                    'class' => 'App\Forms\HorairesForm',
                    'label' => false,
                ]
            ]);

        $this->add('submit', 'submit', [
            'label' => 'Valider',
            'attr' => [
                'class' => 'form-control btn btn-success'
            ],
        ]);
    }
}