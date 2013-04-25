<?php

class Chat extends CI_Controller {

	function Chat()
	{
		parent::__construct();	
		
		$this->load->model('chat_model');	
	}
	
	function index()
	{
		/* send in chat id and user id */
		

		// check they are logged in
		if (! $this->session->userdata('authorized')) {
			redirect('index.php');
		}
		
		
		$user_data = $this -> session -> userdata('authorized');
		$data['user_id'] = $user_data['id'];
		$data['chat_id'] = $user_data['team'][0];

		
		$this -> session -> set_userdata('last_chat_message_id_' . $data['chat_id'], 0);
		
		$data['page_title'] = '';
		$data['page_content'] = 'view_chat';
		$this->load->view('view_main', $data);	
		
	}
	
	
	function ajax_add_chat_message()
	{
		
		/* Things that need to be POST'ed to this function
		 * 
		 * chat_id
		 * user_id
		 * chat_message_content
		 * 		 * 
		 */
		$user_data = $this->session->userdata('authorized');

		$chat_id = $user_data['team'][0];
		$user_id = $user_data['id'];
		//$user_id = $this->input->post('user_id');

		//$teamid = $user_data['team'][0];//retrieves the first team in which the player is found

		$chat_message_content = $this->input->post('chat_message_content', TRUE);
		
		$this->chat_model->add_chat_message($chat_id, $user_id, $chat_message_content);
		
		// grab and return all messages
		echo $this->_get_chat_messages($chat_id);
	}
	
	function ajax_get_chat_messages()
	{

		$chat_id = $this->input->post('chat_id');

		echo $this->_get_chat_messages($chat_id);
	}
	
	function _get_chat_messages($chat_id)
	{
		$last_chat_message_id = (int)$this->session->userdata('last_chat_message_id_' . $chat_id); 
		
		$chat_messages = $this->chat_model->get_chat_messages($chat_id, $last_chat_message_id);
		
		if ($chat_messages->num_rows() > 0)
		{
			// store the last chat message id
			$last_chat_message_id = $chat_messages->row($chat_messages->num_rows() - 1)->chat_message_id;
			
			$this->session->set_userdata('last_chat_message_id_' . $chat_id, $last_chat_message_id);
			
			// we have some chat let's return it
			
			$chat_messages_html = '<ul>';
			
			foreach ($chat_messages->result() as $chat_message)
			{
				$li_class = ($this->session->userdata('user_id') == $chat_message->user_id) ? 'class="by_current_user"' : '';
				
				$chat_messages_html .= '<li ' . $li_class . '>' . '<span class="chat_message_header">' . $chat_message->chat_message_timestamp . ' by ' . $chat_message->FirstName . '</span><p class="message_content">' .  $chat_message->chat_message_content . '</p></li>';
			}
			
			$chat_messages_html .= '</ul>';
			
			$result = array('status' => 'ok', 'content' => $chat_messages_html);
			
			return json_encode($result);
			exit();
		}
		else
		{
			// we have no chat yet
			$result = array('status' => 'no chat', 'content' => '');
			
			return json_encode($result);
			exit();
		}
	}
	
}