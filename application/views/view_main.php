<html>
<head>
<title><?php echo $page_title;?></title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'script/';?>chat.js"></script>

<script type="text/javascript">

var base_url = "<?php echo base_url();?>";
var chat_id;
var user_id;
</script>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

ul {
	list-style: none;
}

ul li {
	margin-top:10px;
}

div#login_form {
	width:350px;
	margin:0px auto;
	border:1px solid #acacac;
	padding:10px;
}

div#banner {
text-align:center;
padding-bottom:20px;
}

div#banner h1 {
	border:none;
	font-size:3em;
}

div#footer {
text-align:center;
}

</style>
</head>
<body>

<div id="banner">


</div>
<?php $this->load->view($page_content); ?>

<div id="footer">


</div>

</body>
</html>