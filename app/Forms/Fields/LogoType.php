<?php
namespace App\Forms\Fields;


use Kris\LaravelFormBuilder\Fields\InputType;

class LogoType extends InputType {


    public function getTemplate ()
    {
        return 'fields.logo';
    }

    public function getDefaults ()
    {
        return [];
    }

    public function getType()
    {
        return 'file';
    }
}