<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Rela CPanel</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        {{ HTML::Script('admin/js/scripts.js') }}
        {{ HTML::Script('admin/js/bootstrap.min.js') }}
        
        {{ HTML::Style('admin/css/bootstrap.min.css') }}
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        {{ HTML::Style('admin/css/styles.css') }}
         <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <link rel="stylesheet"  href="admin/redactor923/redactor.css">
        <script src="admin/redactor923/redactor.min.js"></script>
    </head>
    <body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('administrator.index') }}">Dashboard</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="{{ URL::route('user.edit',array(Auth::user()->id)) }}">My Profile</a></li>
          </ul>
        </li>
        <li><a href="{{ URL::to('logout') }}"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
<div class="row">
    <div class="col-md-3">
      <!-- Left column -->
      <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a>  
      
      <hr>
      
      <ul class="list-unstyled">
        <li class="active"> <a href="{{ URL::route('administrator.index') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">          
          <h5>Page <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu">
                <li><a href="{{ URL::route('post-categories.create') }}"><i class="glyphicon glyphicon-plus"></i> New Post Category</a></li>
                <li><a href="{{ URL::route('post-categories.index') }}"><i class="glyphicon glyphicon-list"></i> Post Category</a></li>
                <li><a href="{{ URL::route('post.create') }}"><i class="glyphicon glyphicon-plus"></i> New Post</a></li>
                <li><a href="{{ URL::route('post.index') }}"><i class="glyphicon glyphicon-file"></i> Post</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Gallery <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu2">
                <li><a href="{{ URL::route('gallery-categories.create') }}"><i class="glyphicon glyphicon-plus"></i> New Gallery Category</a></li>
                <li><a href="{{ URL::route('gallery-categories.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Gallery Category</a></li>
                <li><a href="{{ URL::route('gallery.create') }}"><i class="glyphicon glyphicon-plus"></i> New Gallery</a></li>
                <li><a href="{{ URL::route('gallery.index') }}"><i class="glyphicon glyphicon-picture"></i> Gallery</a></li>
            </ul>
        </li>
        <li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu3">
          <h5>Account <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu3">
                <li><a href="{{ URL::route('user.create') }}"><i class="glyphicon glyphicon-plus"></i> New User Account</a></li>
                <li><a href="{{ URL::route('user.index') }}"><i class="glyphicon glyphicon-user"></i> User Account</a></li>
            </ul>
        </li>
      </ul>
           
      <hr>
      
      <a href="{{ URL::to('logout') }}"><i class="glyphicon glyphicon-off"></i> <strong>Logout</strong></a>
      
      <hr>
    </div><!-- /col-3 -->
    <div class="col-md-9">
        
      <!-- column 2 --> 
      
      <a href="{{ URL::route('administrator.index') }}"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>  
      
        <hr>
      
        <div class="row">
           
            
          
          @yield('content')
     
        </div><!--/row-->
      

    </div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->

<footer class="text-center">Zorempuia Rela Dapzar <a href="http://www.bootply.com/85850"><strong>RelaCPanel.com</strong></a></footer>

<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
    </body>
</html>