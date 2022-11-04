<button
    {!! $attributes->merge([
        'class' => 'btn btn-primary btn-sm',
        'type' => 'submit'
    ]) !!}
>
    {!! trim($slot) ?: __('Submit') !!}
</button>
