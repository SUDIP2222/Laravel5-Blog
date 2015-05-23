@extends('master')

@section('content')

<div class="col-md-8 well">

      <ul class="nav nav-tabs">
         <li role="presentation" ><a href = "{{ URL::to('home') }}"><span class="glyphicon glyphicon-book"></span> Question</a></li>
         <li role="presentation" class="active"><a href = "{{ URL::to('your-ques') }}"><span class="glyphicon glyphicon-folder-open"></span> Your Question</a></li>
      </ul>      

       @if(!$questions->count()) 
          <br>
          <p> No questions has been Ask.</p>
       @else
           <br>
             @foreach($questions as $question)
         
                      {!! link_to_route('question', str_limit(strip_tags($question->question), $limit = 95, $end = ''),$question->id)!!} <span class="glyphicon glyphicon-question-sign"></span> 
                       <div class="pull-right">
          
                           <center>
                            <button type="button" class="btn btn-default">
                                   <span class="glyphicon glyphicon-comment"></span> {!!count($question->answers)!!}  
                             </button> 
                             <a href = "{{ URL::to('your-ques/'.$question->id.'/edit') }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></center>
                       </div>
             
                       
             
                       <p><span class="glyphicon glyphicon-time Right"></span> Posted on {{$question->updated_at->diffForHumans()}}</p>
        
                       <hr> 
             
              @endforeach
        
                 {!!$links!!}
        
        
        
             @endif
      
      
  </div>
  @include('questions.side')
@stop
