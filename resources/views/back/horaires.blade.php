@extends('back.index')

@section('body')
    <div class="card-header">Horaires</div>

    <div class="card-body">
        {!! form_start($form) !!}

        <div class="row">
            <div class="col">
                {!! form_rest($form) !!}
            </div>
        </div>

{{--        {!! form_row($form->submit) !!}--}}

        {!! form_end($form) !!}
    </div>
@endsection