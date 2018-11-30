@extends('layout.app')

@section('content')
<div class="card card-tabs-3">
        <div class="card-header">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">Edit News</a></li>
          </ul>
        </div>
        <div class="card-block">
          <div class="tab-content">
            <div class="tab-pane" id="tab-1">
                
            </div>
            <div class="tab-pane active" id="tab-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            
                            <!--Edit News-->
                            @csrf
                            {!! Form::open(['action' => ['BlogController@update', $news[0]->id],'method' => 'PUT']) !!}
                                <div class="form-group">
                                    {{Form::label('title', 'Title News')}}
                                    {{Form::text('title', $news[0]->title, ['class' => 'form-control', 'placeholder' => 'Title News'])}}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('state', 'State') }}
                                    {{ Form::select('state', $states, $news[0]->state_id, ['class' => 'form-control'])}}
                                </div>
                                
                                <div class="form-group">
                                    {{Form::textarea('description', $news[0]->content, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Body text'])}}
                                </div>
                                
                                
                                {{Form::submit('Update', ['class' => 'btn btn-primary btn-block'])}}
                            {!! Form::close() !!}
                            <!--Edit News-->

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <!--script for the ckeditor-->
    
    <script type="text/javascript">
        CKEDITOR.replace( 'description' );
    </script>
    
    


    
@endsection