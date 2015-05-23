<div class="col-md-4">
   <!-- Blog Search Well -->
                <div class="well">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <p>Search By Question Keyword</p>
                    </div>
                      
                    {!! Form::open(['url'=>'question/search']) !!}
                    
                    <div class="input-group">
                        {!! Form::text('question',null,['class'=>'form-control', 'placeholder'=>'Search']) !!}
                       
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                         {!! Form::close() !!}
                    </div>
                    <!-- /.input-group -->
                </div>
                      </div>
                <!-- Blog Categories Well -->
                
                
                <div class="well">
                     
                     <div class="panel panel-default">
                    <div class="panel-heading">
                    <p>Recent Questions</p>
                    </div>
                     </div>
                    
                       <!-- <div class="col-lg-6">  -->
                       <hr>
                           
                           @foreach($bars as $cat)
                            <ul class="list-unstyled">
                                <li>  <span class="glyphicon glyphicon-bell"></span> {!! link_to_route('question', str_limit(strip_tags($cat->question), $limit = 80, $end = ''),$cat->id)!!}
                                </li>
                                <hr>
                            </ul>
                             @endforeach
                    <!--    </div> -->
                        <!-- /.col-lg-6 -->
                      
                        <!-- /.col-lg-6 -->
                  
                    
                    <!-- /.row -->
                </div>
            
</div>