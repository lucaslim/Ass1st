$(document).ready(function() {
	
	setInterval(function() { get_chat_messages(); } , 2500);
	
	$("input#chat_message").keypress(function(e) {
		if (e.which == 13) {
			$("a#submit_message").click();
			return false;
		}
	});
	
	$("a#submit_message").click(function() {
		var chat_message_content = $("input#chat_message").val();
		
		if (chat_message_content == "") { return false;	}
		
		$.post(base_url + "chat/ajax_add_chat_message", { chat_message_content : chat_message_content, chat_id : chat_id, user_id : user_id }, function(data) {
			
			if (data.status == 'ok')
			{ 
				var current_content = $("div#chat_viewport").html();
				// $("div#chat_viewport").html(current_content + data.content);
				$("div#chat_viewport").html(data.content);
				
			}
			else
			{
				// there was an error do something 
				
			}
						
		}, "json");
		
		$("input#chat_message").val("");
		
		return false;
	});
	
	
	function get_chat_messages()
	{
		
		$.post(base_url + 'chat/ajax_get_chat_messages', { chat_id : chat_id }, function(data) {
			
			if (data.status == 'ok')
			{
				var current_content = $("div#chat_viewport").html();
				
				// $("div#chat_viewport").html(current_content + data.content);
				$("div#chat_viewport").html(data.content);
				
			}
			else
			{
				// there was an error do something 
				
			}
			
		}, "json");
	}
	
	get_chat_messages();
	
});