<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;

use App\Blog;
use App\State;


class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$post = Blog::orderBy('created_at')->paginate(10);
        $post = DB::table('blogs as bl')
                    ->join('state as st', 'bl.state_id', '=', 'st.id' )
                    ->select('bl.id', 'bl.title', 'bl.created_at', 'st.description')
                    
                    ->orderBy('bl.created_at')->paginate(8);
        
        $states = State::pluck('description','id');
        
        return view('pages.create')->with(array(
                        'news'   => $post,
                        'states' => $states
                        )
                    );
        //Pagination

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'state'       => 'required']
        );
        
        // Create news
        $post = new Blog;
        $post->title    = $request->input('title');
        $post->content  = $request->input('description');
        $post->state_id = $request->input('state');
        $post->user_id  = auth()->user()->id;
        $post->save();

        return redirect('/Blog')->with('success', 'News Created');

        
            

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('pages.show')->with('news', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Blog::find($id);
        $post->delete();
        return redirect('/Blog')->with('success', 'News Removed');
         
    }

    public function search(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $title = $request->title;
            if (!empty($title)) 
            {
                
                $data = Blog::where('title', 'like', '%'.$title.'%')
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
                
                $output = $data;
                /*
                foreach ($data as $row) {
                    $output .= $row->title. '\n';
                    
                }
                foreach ($data as $row) 
                {   
                    
                    $output = '
                    <tr>
                        <td scope="row ">'.$row->title.'</a> </td>
                        <td>'.$row->created_at.'</td>
                        <td>'.$row->content.'</td>
                    </tr>'
                    ;
                }*/
            }   
            else
            {
                $output = (array (
                    'failed' => 'true',
                    'message' => 'No data found')
                );
            }
            
            
            $data = array(
                'message' => $output);
            

            echo json_encode($output);
            
            
        }
        
                    
       

        
       
    }
}
