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
            {{ Form::select('state', ['0' => 'Seleccione'] + $states, 0, ['class' => 'form-control', 'id' =>'state'])}}
        </div>

        <div class="form-group">
            <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                <option  value="AL">Alabama</option>
                <option  value="WY">Wyoming</option>
            </select>
        </div>
        
        {!! Form::close() !!}
</div>


<!--Form Search-->