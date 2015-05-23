@extends('master')

@section('content')

<div class="col-md-8 well">

      
      @if(Auth::check())
      {!! Form::model($question,['method'=>'PATCH','action'=>['QuestionsController@update',$question->id]]) !!}
   
      {!! Form::hidden('user_id',$question->id) !!}
      <div class="form-group">
    
       {!! Form::textarea('question',null,['class'=>'form-control','placeholder'=>'Post Your Questions','size' => '1x1']) !!}

      </div>
  
      <p  class="alert alert-warning">Solved or Unsolved :</p>  
     @if($question->solved==0)
     
        <span class="glyphicon glyphicon-ok"></span> OR <span class="glyphicon glyphicon-remove"></span> {!!Form::checkbox('solved', 1, false)!!} <br><br>
     @elseif($question->solved==1)
        <span class="glyphicon glyphicon-ok"></span> OR <span class="glyphicon glyphicon-remove"></span>  {!!Form::checkbox('solved', 0, true)!!}
     @endif
     <div class="form-group">
    
         {!! Form::submit('Post Question',['class'=>'btn btn-primary']) !!}

     </div>

        {!! Form::close() !!}
     @else
    
         <p> Plese login to ask or answer questions.</p>
    
     @endif
     <hr>
   
</div>
 @include('questions.side')
@stop