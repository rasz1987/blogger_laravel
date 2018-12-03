@extends('layouts.app')

@section('content')
<div class="card card-tabs-3">
        <div class="card-header">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab">List of News</a></li>
            @if (!Auth::guest())
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-2" role="tab">New News</a></li>    
            @endif
            
            
          </ul>
        </div>
        <div class="card-block">
          <div class="tab-content">
            <div class="tab-pane   active" id="tab-1">
                <div class="card-body">
                    
                    <!--Include de search y lista de blogs-->
                    @include('pages.listNews')
                    <!--Include de search y lista de blogs-->
                
                </div>
            </div>
            <div class="tab-pane" id="tab-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            
                            <!--Create News-->
                            @csrf
                            {!! Form::open(['action' => 'BlogController@store', 'method' => 'POST', 'id' => 'myFormCreate']) !!}
                                <div class="form-group">
                                    {{Form::label('title', 'Title News')}}
                                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title News'])}}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('state', 'State') }}
                                    {{ Form::select('state', $states, null, ['class' => 'form-control'])}}
                                </div>
                                
                                <div class="form-group">
                                    {{Form::textarea('description', '', ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Body text'])}}
                                </div>
                                    
                                {{Form::submit('Submit', ['class' => 'btn btn-primary btn-block', 'id' => 'create'])}}
                            {!! Form::close() !!}
                            <!--Create News-->

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
    <script> CKEDITOR.replace( 'description' ); </script>
    
    <!--Script for search-->
    <script src="../resources/js/search_script.js"></script>
    
    <!--Script for create-->
    <script src="../resources/js/create_script.js"></script>
    
@endsection