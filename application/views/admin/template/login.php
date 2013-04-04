<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Team Assist - <?php echo $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Include Style Sheets -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/fontAwesome/font-awesome.min.css" />
    
    <!-- Nivo Slider -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/slider/nivo-slider.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/slider/dark/dark.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/main.css">

    <!-- Modernizr -->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- jQuery (needed?) -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
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
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address">
        <input type="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->



    <!-- Insert Scripts
    ====================================================================== -->

    <!-- in production use cdn
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script> -->

    <script src="<?php echo base_url(); ?>/style/bootstrap/js/vendor/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/style/bootstrap/js/vendor/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>script/vendor/jquery.nivo.slider.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

    <script src="<?php echo base_url(); ?>script/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>script/myurl.js"></script>

    </body>
</html>
