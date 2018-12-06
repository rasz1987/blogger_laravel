<!--Form Search-->
<div class="card-body">
    <h5 class="card-title">Search</h5>
    <hr>
    {!! Form::open(array('id' => 'myFormSearch')) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title')}}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'id' => 'title'])}}
        </div>
        
        <div class="form-group">
            {{ Form::label('date', 'Date')}}
            {{ Form::date('date', '', ['class' => 'form-control', 'placeholder' => 'Date', 'id' => 'date'])}}
        </div>

        <div class="form-group">
            {{ Form::label('state', 'State')}}
            {{ Form::select('state', $states, null, ['class' => 'form-control', 'id' =>'state'])}}
        </div>
    
        {!! Form::close() !!}
</div>
<!--Form Search-->