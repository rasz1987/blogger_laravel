@extends('fields.fieldBase')

@section($name ?? 'input' . '-field')

    <select name="{{$selectName ?? ''}}" id="{{$selectId ?? ''}}">
        @each('fields.options', $options, 'data')
    </select>
@endsection