<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Team Assist - Admin Tools</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Include Style Sheets -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.0/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.min.js"></script>

    <!-- jQuery UI - Time picker addon -->
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jquery-ui-timepicker-addon.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/fontAwesome/font-awesome.min.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap-responsive.min.css">

    <!-- Modernizr -->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script> 

    <!-- jQuery Grid -->
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.locale-en.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/jqgrid/ui.jqgrid.css" />

    <!-- My URL -->
    <script type="text/javascript" src="<?php echo base_url(); ?>script/myurl.js"></script>

    <!-- CKEditor -->
    <script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/config.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        
        $('#select_all').click(function() {
          $('input[name="select[]"]').prop('checked', $(this).prop('checked'));
        });
        
        $('#time').timepicker();

        $('#datepicker').datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: "yy-mm-dd"
        });        
      
      }); 
    </script>    

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo base_url(); ?>admin/home/">Team Assist Admin Tools</a>
          <div class="nav-collapse collapse">
            <ul class="nav">

              <!-- News Dropdown List -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">News <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>admin/news/edit">Edit/Delete News</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/news/add">Add News</a></li>
                </ul>
              </li>

              <!-- Users Dropdown List -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>admin/user/view">View Users</a></li>
                  <li><a href="#">Add User</a></li>
                </ul>
              </li> 

              <!-- Games Dropdown List -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Games <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>admin/scorekeeper/view_games">View Games</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/scorekeeper/add_game">Create Game</a></li>
                </ul>
              </li>

              <!-- Media Gallery Links -->
              <li>
                <a href="<?php echo base_url(); ?>admin/media/">Media</a>
              </li>                            
                            
            </ul>
            <ul class="nav pull-right">
              <li class="dropdown pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php echo $the_user -> email; ?> 
                  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

