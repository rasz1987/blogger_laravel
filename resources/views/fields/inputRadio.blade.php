@extends('fields.fieldBase')

@section($name . '-field')
    <div>
        @foreach ($radios as $item)
            <div class="{{$item['classDivRadio']}}">
                    <input type="radio" id="{{$item['id']}}" name="{{$name}}" class="{{$item['classInputRadio']}}">
                    <label class="{{$item['classLabelRadio']}}" for="{{$item['labelForRadio']}}">{{$item['labelValueRadio']}}</label>
                </div>
        @endforeach
    </div>
@endsection
