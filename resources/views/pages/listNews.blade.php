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
                                                @if (!Auth::guest())
                                                <th scope="col" class="col-4">actions</th>    
                                                @endif
                                                
                                            </tr>
                                        </thead>
                                        <tbody id ='listSearch' >
                                            @foreach ($news as $new)
                                                <tr>
                                                    <td scope="row"><a href= "{{asset('Blog/ ').$new->id}}">{{$new->title}}</a> </td>
                                                    <td>{{date_format (new DateTime($new->created_at), 'd-m-Y') }}</td>
                                                    <td>{{ $new->description }}</td>
                                                    @if (!Auth::guest())
                                                    <td>
                                                        <a href="{{asset('Blog/'.$new->id.'/edit')}}"><i class="fas fa-pencil-alt"></i></a> | 
                                                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                                                        {!! Form::open(['action' => ['BlogController@destroy', $new->id], 'method' => 'POST']) !!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                        {!! Form::close() !!}
                                                    </td>    
                                                    @endif
                                                    
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

                    <!--Script for create-->
                    <script src="../resources/js/delete_script.js"></script>

                    