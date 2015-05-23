<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Auth;
class QuestionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
             //$questions = \App\Question::latest()->paginate(50);
                   $questions = \App\Question::unsolved();
                   $bars     = \App\Question::unsolvedbar();
                   $links = str_replace('/?', '?', $questions->render());
		   return view('questions.index',compact('questions','bars','links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
     
         
            
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\QuestionRequest $request)
	{
                
		 $Question = new \App\Question();
                 $Question->question=$request->get('question');
                 $Question->user_id = \Auth::user()->id;
                 $Question->save();
                 
                  \Session::flash('flash_message','Your post has been saved !!!');
                 return redirect('home');
                 
                 
                 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
               $question= \App\Question::find($id); 
               $bars     = \App\Question::unsolvedbar();
               return view('questions.view',  compact('question','bars'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!$this->questions_belongs_to_user($id)){
                  return Redirect('your-ques')->with('message', 'Invalid Question');
                
                 }
                $question  =\App\Question::find($id);
                $bars     = \App\Question::unsolvedbar();
               
		return view('questions.edit',compact('question','bars'));
           
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Requests\QuestionRequest $request)
	{
		$Question = \App\Question::find($id);;
            
                $Question->question=$request->get('question');
                $Question->user_id = \Auth::user()->id;
                $Question->solved =  $request->get('solved');
     
                $Question->save();
                \Session::flash('flash_message','Your Post has been Edited !!!');
                return redirect('your-ques');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
              //
	}

        public function search(){
            
               $name = Request::get('question');
              //dd($name);
              $questions=   \App\Question::where('question','like','%'.$name.'%')->paginate(50);
      
       
              $bars  = \App\Question::unsolvedbar();
                  
               return view('questions.search',compact('questions','bars'));     
        }
        
         public function your_ques()
	{ 
             
             if(Auth::check()){
               $questions  =\App\Question::your_questions();
               $bars     = \App\Question::unsolvedbar();
               $links = str_replace('/?', '?', $questions->render());
	       return view('questions.your_ques',compact('questions','bars','links'));
             }
             
		
	}
        
        
        public function questions_belongs_to_user($id)
	{
		$question= \App\Question::find($id);
                
                if($question->user_id==\Auth::user()->id){
                    return true;
                }
                
                return false;
	}
}
