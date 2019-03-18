<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Arr;
use View;

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
        // $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    
    // Function index to request information by ajax
    public function index(Request $request)
    {
        $post = Blog::showNews();
        
        $posts = Blog::get();
        $states = State::pluck('state','id')->toArray();
        
        $opt = State::all('state','id')->toArray();
        $arr = array('state'=>'Selecione', 'id'=>'');
        $options = Arr::prepend($opt, $arr);

        
        
        if ($request->ajax()) {
            return view('pages.pagination')->with(array(
                                            'news'   => $post,
                                            'states' => $states,
                                            'options' => $options
                                            ))->render();
                                        
        } else {
            return view('pages.create')->with(array(
                                        'news'   => $post,
                                        'states' => $states,
                                        'options' => $options
                                        )
            );
        };
    }

    public function county($id){
        $search = Blog::where('state_id',$id)
                        ->get()->toArray();
        $arr = ['title'=>'Selecione', 'id'=>''];
        $options = Arr::prepend($search, $arr);
        $array =['options' => $options, 
                 'selectName' => 'otherTest', 
                 'selectId' => 'otherTest',
                 
                 'name' => 'otherTest',
                 'cols' => 'col-6',
                 'labelFor' => 'otherTest',
                 'labelValue' => 'Other Tes: '];
        


        return json_encode(view('fields.select')->with($array)->render());
        
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

    //Function to display the specified element.
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('pages.show')->with('news', $blog);
    }

    //Function to show the form for editing the specified element.
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
        
        if ($post) {
            echo json_encode(['success' => 'The data has been deleted']);
        }
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
                    ->select('bl.id', 'bl.title', 'bl.state_id', 'bl.created_at', 'st.state')
                    ->where('bl.title', 'like', '%'.$title.'%')
                    ->where('bl.state_id', '=', $state)
                    ->paginate(6);    
        } else {
            $posts = DB::table('blog as bl')
                    ->join('state as st', 'bl.state_id', '=', 'st.id' )
                    ->select('bl.id', 'bl.title', 'bl.state_id', 'bl.created_at', 'st.state')
                    ->where('bl.state_id', '=', $state)
                    ->paginate(6);    
        }

        if ($state == 0) {
            return redirect('/Blog');
        }

        $states = State::pluck('state','id');
        
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

    public function testeBesty() {
        return view('testeBetsy.testeBetsy');
        // return json_encode($testeBetsy);
    }

    public function testeBetsyJson() {
        $testeBetsy = array(
            'teste1' => 'Hola mundo',
            'teste2' => 'Hola mundo2',
            'teste3' => 'Hola mundo3',
            'teste4' => 'Hola mundo4',
            'teste5' => 'Hola mundo5');
        
        // return view('testeBetsy.testeBetsy')->with(array('teste' => $testeBetsy ))->render();
        return json_encode($testeBetsy);
    }

    public function secondTesteJason() {
        $testeBetsy = array(
            'secondteste1' => 'Hola mundo',
            'secondteste2' => 'Hola mundo2',
            'secondteste3' => 'Hola mundo3',
            'secondteste4' => 'Hola mundo4',
            'secondteste5' => 'Hola mundo5');

        return json_encode($testeBetsy);
    }

    public function testeSecondBetsy(){
        $testeBetsy = array(
            'secondteste1' => 'Hola mundo',
            'secondteste2' => 'Hola mundo2',
            'secondteste3' => 'Hola mundo3',
            'secondteste4' => 'Hola mundo4',
            'secondteste5' => 'Hola mundo5');

        return json_encode($testeBetsy);
    }
}
