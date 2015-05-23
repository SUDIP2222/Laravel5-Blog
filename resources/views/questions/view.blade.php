@extends('master')

@section('content')

<div class="col-md-8 well">
     <ul class="nav nav-tabs">
         <li role="presentation" class="active"><a href="#"> <span class="glyphicon glyphicon-user"></span> {{$question->user->name}} Ask</a></li>
         <li role="presentation" ><a href = "{{ URL::to('home') }}"><span class="glyphicon glyphicon-book"></span> Question</a></li>
     </ul>
     <br>
     {!!$question->question!!}
      
     <hr>
      
     @if(!$question->answers->count()) 
      
          <p> This Question has not been answered yet...</p>
     @else
       
          @foreach($question->answers as $answer)
         
                <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-user"></span> {{$answer->user->name}} 
                 </button> <div class="ww"> <div class="well ww"> {!!$answer->answer!!}</div></div>
       
      
                 <hr>
           @endforeach
        
       @endif
      
     @if(Auth::check())
         {!! Form::open(['url'=>'answer']) !!}
   
         {!! Form::hidden('question_id',$question->id ) !!}
         <div class="form-group">
    
         {!! Form::textarea('answer',null,['class'=>'form-control','placeholder'=>'Post Your Answer','size' => '5x5']) !!}

         </div>
         <div class="form-group">
    
          {!! Form::submit('Post Answer',['class'=>'btn btn-primary']) !!}

         </div>

         {!! Form::close() !!}
      @else
    
         <p> Plese login to ask or answer questions.<br></p>
    
      @endif
</div>
 @include('questions.side')

@stop
