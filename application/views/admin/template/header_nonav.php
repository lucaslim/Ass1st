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

    <!-- jQuery UI -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/fontAwesome/font-awesome.min.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap-responsive.min.css">

    <!-- Modernizr -->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script> 

    <link rel="stylesheet" href="<?php echo base_url(); ?>style/jqgrid/ui.jqgrid.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/jqueryui/jqueryui.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jqueryui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.locale-en.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jqgrid/jqgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/myurl.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/ckeditor/config.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#select_all').click(function() {
          $('input[name="select[]"]').prop('checked', $(this).prop('checked'));
        });
      }); 
    </script>    

    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
  </head>

  <body>
