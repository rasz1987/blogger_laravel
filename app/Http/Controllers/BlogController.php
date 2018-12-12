<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\Guard;

use DB;
use Auth;
use DateTime;

use App\Blog;
use App\State;
use App\User;


class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    
    // Function index to request information by ajax
    public function index(Request $request)
    {
        $post = Blog::showNews();
        
        $states = State::pluck('state','id');
        
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
    
    // Show the form for creating a new news.
    public function create()
    {
        return view('pages.create');
    }

    //Function to store the blog
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
            
            $blog = Blog::create([
                'title'    => $request->input('title'),
                'content'  => $request->input('description'),
                'user_id'  => auth()->user()->id,
                'state_id' => $request->input('state')]);
            
            echo json_encode(array(
                        'success' => 'true',
                        'message' => 'Your news has been saved.')
                    );
        }
    }

    //Function to display the specified resource.
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('pages.show')->with('news', $blog);
    }

    //Function to show the form for editing the specified resource.
    public function edit($id)
    {
        $blog = Blog::find($id);
        $states = State::pluck('state','id');
        
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
        
        //return redirect('/Blog')->with('success', 'News Removed');
    }

    //Function to search information
    public function search(Request $request) 
    {
        $title = $request->title;
        $date  = $request->created_at;
        $state = $request->state;
        $token = $request->_token;
        
        if (!empty($title)) {
            $posts = DB::table('blog as bl')
                    ->join('state as st', 'bl.state_id', '=', 'st.id' )
                    ->select('bl.id', 'bl.title', 'bl.state_id', 'bl.created_at', 'st.description')
                    ->where('bl.title', 'like', '%'.$title.'%')
                    ->where('bl.state_id', '=', $state)
                    ->paginate(6);    
        } else {
            $posts = DB::table('blog as bl')
                    ->join('state as st', 'bl.state_id', '=', 'st.id' )
                    ->select('bl.id', 'bl.title', 'bl.state_id', 'bl.created_at', 'st.description')
                    ->where('bl.state_id', '=', $state)
                    ->paginate(6);    
        }

        $states = State::pluck('description','id');
        
        if ($request->ajax()) 
        {
            return view('pages.search')->with(array(
                        'news' => $posts,
                        'states' => $states)
            );
        };
        
    }

    public function test() {
        $teste = User::find(1)->content;

        var_dump($teste);

    }
}
