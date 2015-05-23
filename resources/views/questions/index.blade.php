@extends('master')

@section('content')

<div class="col-md-8 well">

      
      @if(Auth::check())
   {!! Form::open(['url'=>'ask']) !!}
   
  
    <div class="form-group">
    
    {!! Form::textarea('question',null,['class'=>'form-control','placeholder'=>'Post Your Questions','size' => '1x1']) !!}

  </div>
  <div class="form-group">
    
    {!! Form::submit('Post Question',['class'=>'btn btn-primary']) !!}

  </div>

   {!! Form::close() !!}
    @else
    
    <p> Plese login to ask or answer questions.</p>
    
    @endif
   <hr>
   
  <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href = "{{ URL::to('home') }}"><span class="glyphicon glyphicon-book"></span> Question</a></li>
      <li role="presentation" ><a href = "{{ URL::to('your-ques') }}"><span class="glyphicon glyphicon-folder-open"></span> Your Question</a></li>
  </ul>
      @if(!$questions->count()) 
      <br>
       <p> No questions has been Ask.</p>
       @else
       <br>
         @foreach($questions as $question)
         
          {!! link_to_route('question', str_limit(strip_tags($question->question), $limit = 95, $end = ''),$question->id)!!} <span class="glyphicon glyphicon-question-sign"></span><div class="pull-right"><button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-user"></span> {!!ucfirst($question->User->name)!!}  
             </button>  - <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-comment"></span> {!!count($question->answers)!!}  
             </button> 
         </div>
             <p><span class="glyphicon glyphicon-time Right"></span> Posted on {{$question->updated_at->diffForHumans()}} </p>
        
                <hr> 
             
        @endforeach
        <center>{!!$links!!}</center>
        
        
        
        
       @endif
  </div>

  @include('questions.side')

@stop