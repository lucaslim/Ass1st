<script type="text/javascript">

var chat_id = "<?php echo $chat_id; ?>";
var user_id = "<?php echo $user_id; ?>";

</script>


<style type="text/css">

div#chat_viewport {
	font-family:Verdana, Arial, sans-serif;
	padding:5px;
	border-top:2px dashed #585858;
	min-height:300px;
	color:black;
	max-height:650px;
	overflow:auto;
	margin-bottom:10px;
	width:750px;
	}

div#chat_viewport ul {
	list-style-type:none;
	padding-left:10px;
}

div#chat_viewport ul li {
	margin-top:10px;
	width:85%;
}

span.chat_message_header {
	font-size:0.7em;
	font-family:"MS Trebuchet", Arial, sans-serif;
	color:#547980;
}

p.message_content {
	margin-top:0px;
	margin-bottom:5px;
	padding-left:10px;
	margin-right:0px;
	}

input#chat_message {
	margin-top:5px;
	border:1px solid #585858;
	width:70%;
	font-size:1.2em;
	margin-right:10px;
}

input#submit_message {
	font-size:2em;
	padding:5px 10px;
	vertical-align:top;
	margin-top:5px;
}

div#chat_input { margin-bottom:10px; }

div#chat_viewport ul li.by_current_user span.chat_message_header {
	color:#e9561b;
	}

</style>


<h1>Let's do some chatting</h1>

<div id="chat_viewport">

</div>

<div id="chat_input">
	<input id="chat_message" name="chat_message" type="text" value="" tabindex="1" />
	<?php echo anchor('#', 'Say it', array('title' => 'Send this chat message', 'id' => 'submit_message'));?>
	<div class="clearer"></div>
</div>
