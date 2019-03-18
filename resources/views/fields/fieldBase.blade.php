<div class="{{ $cols ?? '' }} ">
    <label for="{{ $labelFor ?? '' }}">{{$labelValue ?? ''}} </label>
    @yield($name . '-field')
</div>