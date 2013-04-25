<?php
class Chat_model extends CI_Model {
	
	function Chat_model()
	{
		parent::__construct();
	}

	function add_chat_message($chat_id, $user_id, $chat_message_content)
	{
		$query_str = "INSERT INTO chat_messages (chat_id, user_id, chat_message_content) VALUES (?, ?, ?)";
		
		$this->db->query($query_str, array($chat_id, $user_id, $chat_message_content));
	}
	
	function get_chat_messages($chat_id, $last_chat_message_id = 0)
	{
		$query_str = "SELECT
					cm.chat_message_id,
					cm.user_id,
					cm.chat_message_content,
					DATE_FORMAT(cm.create_date, '%D of %M %Y at %H:%i:%s') AS chat_message_timestamp,
					u.FirstName
					FROM chat_messages cm
					JOIN User u ON cm.user_id = u.id
					WHERE cm.chat_id = ?
					ORDER BY cm.chat_message_id DESC LIMIT 1";
		
		$result = $this->db->query($query_str, array($chat_id));
		
		return $result;
	}
}