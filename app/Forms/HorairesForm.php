<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class HorairesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('ville', 'text', [
                'label' => 'Ville',
                'rules' => 'required|min:2'
            ])
            ->add('adresse', 'text', [
                'label' => 'Adresse',
                'rules' => 'required'
            ])
            ->add('jour', 'select', [
                'label' => 'Jour',
                'rules' => 'required'
            ])
            ->add('heure_debut', 'text')
            ->add('heure_fin', 'text')
        ;
    }
}