<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Q&A</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
        <link href="{{ asset('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('http://fonts.googleapis.com/css?family=Crimson+Text') }}" rel='stylesheet' type='text/css'>
	
</head>

<body>

     <div class="navbar navbar-default navbar-static-top" role="navigation">
	   <div class="container" >
	        <div class="navbar-header" >
                    <a class="navbar-brand fn" href="#"><span class="glyphicon glyphicon-send"></span> Q&A </a>
	        </div>
		<div class="navbar-collapse collapse">
	             <ul class="nav navbar-nav navbar-right">
                         @if(Auth::check())
		         <li><a href = "{{ URL::to('home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                         <li><a href = "{{ URL::to('auth/logout') }}"><span class="glyphicon glyphicon-log-in"></span> {{'Logout ['.Auth::user()->name.']' }}</a></li>
			  
			 @else			
			 <li><a href = "{{ URL::to('auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Log-in</a></li>
                       
                         <li><a href = "{{ URL::to('auth/register') }}"><span class="glyphicon glyphicon-list-alt"></span> Register</a></li>
                         @endif
		     </ul>
	        </div>
	   </div>
      </div>
 <div class="container">

     <div class="row">
           
          @if(Session::has('flash_message'))
        
        <div class="alert alert-success">
             <span class="glyphicon glyphicon-check"> {{Session::get('flash_message')}}</span>
        </div>
        
        @endif
 
     
         @yield('content')
            
                

      </div>

 </div>
        
        <br>
        
  <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
	   
	<div class="container">
              <div class="navbar-text pull-left">
                  <p> <span class="glyphicon glyphicon-globe"></span> 2015 Sudip Sarker </p>
              </div>
	      <div class="navbar-text pull-right">
	            <a href="#"><i class="fa fa-facebook-square fa-2x icon-padding"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-2x icon-padding"></i></a>
		    <a href="#"><i class="fa fa-google-plus fa-2x icon-padding"></i></a>
	      </div>
        </div>
	   
   </div>

    
 
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>