<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\Guard;

use DB;
use Auth;

use App\Blog;
use App\State;


class BlogController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    
    // Function index to request information by ajax
    public function index(Request $request)
    {
        $post = DB::table('blogs as bl')
                    ->join('state as st', 'bl.state_id', '=', 'st.id' )
                    ->select('bl.id', 'bl.title', 'bl.created_at', 'st.description')
                    ->where('st.description', '=', 'Unpublished')
                    ->orderBy('bl.created_at')->paginate(6);

        $states = State::pluck('description','id');
        
        if ($request->ajax()) {
            return view('pages.pagination')->with(array(
                                            'news'   => $post,
                                            'states' => $states
                                            ))->render();
                                        
        } else {
            return view('pages.create')->with(array(
                                        'news'   => $post,
                                        'states' => $states
                                        )
            );
        };
    }
    
    // Show the form for creating a new resource.
    public function create()
    {
        return view('pages.create');
    }

    //Function to store the blogs
    public function store(Request $request)
    {   
        // If the request is by ajax
        if ($request->ajax()) {
            
            $this->validate($request, [
                'title'       => 'required',
                'description' => 'required',
                'state'       => 'required'
                ]
            );
            
            // Create news
            $post = new Blog;
            $post->title    = $request->input('title');
            $post->content  = $request->input('description');
            $post->state_id = $request->input('state');
            $post->user_id  = auth()->user()->id;
            $post->save();

            echo json_encode(array(
                        'success' => 'true',
                        'message' => 'Your news has been saved.')
                    );
        }
    }

    //Function to isplay the specified resource.
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('pages.show')->with('news', $blog);
    }

    //Function to show the form for editing the specified resource.
    public function edit($id)
    {
        //$blog = Blog::find($id);
        $blog = DB::table('blogs')
                ->select('id', 'title', 'content', 'created_at', 'state_id')
                ->where('id', $id)
                ->get();
        
        $states = State::pluck('description','id');
                
        return view('pages.edit')->with(array(
                        'news'   => $blog,
                        'states' => $states 
                    )
                );
    }

    // Function to update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'state'       => 'required']
        );
        
        // Update news
        $post = Blog::find($id);
        $post->title    = $request->input('title');
        $post->content  = $request->input('description');
        $post->state_id = $request->input('state');
        $post->user_id  = 1;
        $post->save();

        return redirect('/Blog')->with('success', 'News Updated');
    }

    // Function to remove the specified resource from storage.
    public function destroy($id)
    {
        $post = Blog::find($id);
        $post->delete();
        return redirect('/Blog')->with('success', 'News Removed');
    }

    //Function to search information
    public function search(Request $request) 
    {
        if ($request->ajax()) 
        {
            $title = $request->title;
            $date  = $request->created_at;
            $state = $request->state;
            $token = $request->_token;

            $posts = DB::table('blogs as bl')
                    ->join('state as st', 'bl.state_id', '=', 'st.id' )
                    ->select('bl.id', 'bl.title', 'bl.state_id', 'bl.created_at', 'st.description')
                    ->where('bl.state_id', $state)
                    ->orderBy('bl.created_at')
                    ->paginate(6);

            $states = State::pluck('description','id');

            return view('pages.search')->with(array(
                        'news' => $posts,
                        'states' => $states)
            );
        };
    }

    


    /*
    public function search(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $title = $request->title;
            $date  = $request->created_at;
            $state = $request->state;
            $token = $request->_token;


            if (empty($title)) 
            {   
                $data = Blog::where('state_id', 'like', '%'.$state.'%')
                            ->orderBy('id', 'asc')
                            ->get();
            } 
            elseif (!empty($title)) {
                $data = Blog::where('state_id', 'like', '%'.$state.'%')
                            ->where('title', 'like', '%'.$title.'%')
                            ->orderBy('id', 'asc')
                            ->get();
            }
            
            
            else 
            {
                $data = Blog::where('title', '=', $title)
                            ->get();    
            }
            
            $total_row = $data->count();
            
            if ($total_row > 0)
            {   
                if(!Auth::user()){
                    foreach ($data as $row) 
                    {   
                        $output .= '
                        <tr>
                            <td scope="row">'.$row->title.'</td>
                            <td>'.date_format ($row->created_at, "d-m-Y").'</td>
                            <td>'.$row->state['description'].'</td>
                        </tr>';
                    }
                } else {
                    foreach ($data as $row) 
                    {   
                        $output .= '
                        <tr>
                            <td scope="row"><a href= "'.asset("Blog/ ").$row->id.'">'.$row->title.'</a> </td>
                            <td>'.date_format ($row->created_at, "d-m-Y").'</td>
                            <td>'.$row->state['description'].'</td>
                            <td>
                                <a href="'.asset('Blog/'.$row->id.'/edit').'"><i class="fas fa-pencil-alt"></i></a> | 
                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                                <form method="POST" action="' .route('Blog.destroy', $row->id) .'" accept-charset="UTF-8"><input name="_token" type="hidden" value="'.$token.'">
                                    <input name="_method" type="hidden" value="DELETE">
                                </form>
                            </td>
                        </tr>
                        <script src="../resources/js/delete_script.js"></script>';
                    }
                }
            }   
            else
            {
                $output = (array (
                    'failed' => 'true',
                    'message' => 'No data found')
                );
            }
            $data = array(
                'message' => $output,
            );
            echo json_encode($data);
        }
    }
    */
}
