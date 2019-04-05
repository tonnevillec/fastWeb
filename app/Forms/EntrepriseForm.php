<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class EntrepriseForm extends Form
{
    public function buildForm()
    {
        if($this->getModel() && $this->getModel()->id) {
            $method = 'PUT';
            $url = route('entreprise.update', $this->getModel()->id);
        } else {
            $method = 'POST';
            $url = route('entreprise.store');
        }

        $this->formOptions = [
            'method' => $method,
            'url' => $url
        ];

        $this
            ->add('nom', 'text', [
                'label' => 'Nom de l\'entreprise',
                'rules' => 'required|min:2'
            ])
            ->add('telephone', 'text', [
                'label' => 'Téléphone principal',
                'rules' => 'required'
            ])
            ->add('contact_email', 'email', [
                'label' => 'Mail de contact',
                'rules' => 'required|email'
            ])
            ->add('description', 'textarea')
            ->add('logo', 'logo')
        ;

        $this->add('submit', 'submit', [
            'label' => 'Valider',
            'attr' => [
                'class' => 'form-control btn btn-success'
            ],
        ]);
    }
}
