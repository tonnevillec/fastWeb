@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!}>
@endif

    @if ($showLabel && $options['label'] !== false && $options['label_show'])
        {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
    @endif

    @if ($showField)
        @if ($options['value'] !== '')
            <div class="text-center mb-2">
                <img src="/uploads/{{ $options['value'] }}" class="img-thumbnail">
            </div>
        @endif

        <div class="input-group mb-2">
            {!! Form::input('file', $name, $options['value'], $options['attr']) !!}
        </div>

        @include('vendor.laravel-form-builder.help_block')
    @endif

    @include('vendor.laravel-form-builder.errors')

    @if($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif
