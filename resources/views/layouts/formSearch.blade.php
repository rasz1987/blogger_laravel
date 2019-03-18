<!--Form Search-->
<div id="click" class="card-body">
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
        
        <div id="" class="row bg-danger" >
        
        
        @radio(array('name' => 'cazador:',
                     'cols' => 'col-6',
                     'labelFor' => 'cazador',
                     'labelValue' => 'Cazador*: ',

                     'radios' =>['radioOne' => ['classInputRadio' => 'custom-control-input',
                                                'id' => 'sim',
                                                'classLabelRadio' => 'custom-control-label',
                                                'labelForRadio' => 'sim',
                                                'labelValueRadio' => 'Sim',
                                                'classDivRadio' => 'custom-control custom-radio'],
                                 
                                 'radioTwo' => ['classInputRadio' => 'custom-control-input',
                                                'id' => 'nao',
                                                'classLabelRadio' => 'custom-control-label',
                                                'labelForRadio' => 'nao',
                                                'labelValueRadio' => 'nao',
                                                'classDivRadio' => 'custom-control custom-radio'],
                                 
                                'radioThree' => ['classInputRadio' => 'custom-control-input',
                                                'id' => 'talvez',
                                                'classLabelRadio' => 'custom-control-label',
                                                'labelForRadio' => 'talvez',
                                                'labelValueRadio' => 'talvez',
                                                'classDivRadio' => 'custom-control custom-radio']]
                     ))
            </div>
            <div class="row">
                <div class="col-12">
                    <div>
                        @select(array('name' => 'test',
                                      'cols' => 'col-6',
                                      'labelFor' => 'selecione-teste',
                                      'labelValue' => 'Select Test: ',
                                      
                                      'selectName' => 'selecione-teste',
                                      'selectId' => 'selectTest',
                                      'data' => $options))
                    </div>
                    <br>
                    <br>
                    <div>
                        @select(array('name' => 'otherTest',
                                      'cols' => 'col-6',
                                      'labelFor' => 'otherTest',
                                      'labelValue' => 'Other Tes: ',
                                    
                                      'selectName' => 'otherTest',
                                      'selectId' => 'otherTest',
                                      'data' => $options))
                    </div>
                    
                </div>
            </div>
    
        {!! Form::close() !!}
</div>


<!--Form Search-->