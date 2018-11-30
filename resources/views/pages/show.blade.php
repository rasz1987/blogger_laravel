@extends('layout.app')

@section('content')
<div class="card card-tabs-3">
        <div class="card-header">
          <ul class="nav nav-tabs">
            <li class="nav-item "><a class="nav-link active" data-toggle="tab" href="#tab-2" role="tab">News</a></li>
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
                            <div class="col-12">
                                <h1>{!! $news->title !!}</h1>
                            </div>
                            <hr>
                            <div class="col-12">
                                {!! $news->content !!}
                            </div>
                    
                            @if (!Auth::guest())
                                <div class="row ">
                                    <div class="col-md-1 col-xs-12">
                                        <a href="{{asset('Blog/'.$news->id.'/edit')}}" class="btn btn-primary btn-block mt-2 mb-2">Edit</a>
                                    </div>
                                    <div class="col-md-2 col-xs-12 offset-9">
                                            {!! Form::open(['action' => ['BlogController@destroy', $news->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'delete'])}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endif
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
    
    <script>
    CKEDITOR.replace( 'description' );


   
</script>
@endsection




                
                
                    

<!--script for the ckeditor-->