@extends('back.index')

@section('body')
    <div class="card-header">Informations</div>

    <div class="card-body">
        {!! form_start($form) !!}

        <div class="row">
            <div class="col-6">
                {!! form_row($form->nom) !!}
                {!! form_row($form->telephone) !!}
                {!! form_row($form->contact_email) !!}
            </div>

            <div class="col-6">
                {!! form_row($form->logo) !!}
            </div>
        </div>

        <div class="row">
            <div class="col">
                {!! form_row($form->description) !!}
            </div>
        </div>

        {!! form_row($form->submit) !!}

        {!! form_end($form) !!}
    </div>
@endsection