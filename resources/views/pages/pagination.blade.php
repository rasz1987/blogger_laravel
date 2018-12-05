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
    <div id="pag" class="row justify-content-center">
        {{$news->links()}}
    </div>
    
@endif
