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
                                                    <td><a href="{{asset('Blog/'.$new->id.'/edit')}}"><i class="fas fa-pencil-alt"></i></a> | {!! Form::open(['action' => ['BlogController@destroy', $new->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        <a href=""><i class="fas fa-trash-alt"></i></a></td>
                                                    {!! Form::close() !!}
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