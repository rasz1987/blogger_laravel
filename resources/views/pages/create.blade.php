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

                    <!--list of news-->
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                
                                <!--Search-->
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
                                            {{ Form::date('date', '', ['class' => 'form-control', 'placeholder' => 'Date'])}}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('state', 'State')}}
                                            {{ Form::select('state', $states, null, ['class' => 'form-control'])}}
                                        </div>

                                        <div class="form-group mt-5">
                                            {{ Form::submit('Search', ['class' => 'btn-primary form-control', 'id' => 'search']) }}
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <!--Search-->

                            </div>
                        </div>
                        <div class="col-8 ">
                            <div class="card">
                            
                            <!--Lists of news-->
                            <div class="card-body">
                                @if (count($news) == 0)
                                    <div class="alert alert-danger text-center">
                                        <p>No posts found</p>
                                    </div>
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="col-6">Title</th>
                                                <th scope="col" class="col-3">Date</th>
                                                <th scope="col" class="col-3">State</th>
                                                <th scope="col" class="col-4">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id ='listSearch' >
                                            @foreach ($news as $new)
                                                <tr>
                                                    <td scope="row ">{{ $new->title }}</td>
                                                    <td>{{date_format (new DateTime($new->created_at), 'd-m-Y') }}</td>
                                                    <td>{{ $new->description }}</td>
                                                    <td><a href="{{asset('Blog/'.$new->id)}}"><i class="fas fa-pencil-alt"></i></a> | <a href=""><i class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div id="link" class="row justify-content-center">
                                        {{$news->links()}}
                                    </div>
                                @endif
                            </div>
                            <!--Lists of news-->

                            </div>
                        </div>
                    </div>
                        <!--list of news-->
                
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