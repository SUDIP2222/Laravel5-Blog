@extends('master')

@section('content')

<div class="col-md-8 well">
     <hr>
   
     <ul class="nav nav-tabs">
         
         <li role="presentation" ><a href = "{{ URL::to('home') }}"><span class="glyphicon glyphicon-book"></span> Question</a></li>
     </ul>
     @if(!$questions->count()) 
     <br>
     <p> No questions has been Ask.</p>
      @else
           <br>
           @foreach($questions as $question)
         
           {!! link_to_route('question', str_limit(strip_tags($question->question), $limit = 90, $end = ''),$question->id)!!} <span class="glyphicon glyphicon-question-sign"></span> <div class="pull-right"> <button type="button" class="btn btn-default btn-sm">
                 <span class="glyphicon glyphicon-user"></span> {{ucfirst($question->User->name)}}  
                 </button>  - <button type="button" class="btn btn-default btn-sm">
                 <span class="glyphicon glyphicon-comment"></span> {{count($question->answers)}}  
                 </button>
                 </div>
                 <hr>                   
        @endforeach
        
        {!!$questions->render()!!}
        
        
        
     @endif
</div>

 @include('questions.side')
@stop