<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

// session_start();
//controller for player registration

class Get_pass extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this -> load -> model( 'Division_Model' );
		$this -> load -> model( 'News_Model' );
		$this -> load -> model( 'user_model' );
		// $this -> load -> model( 'image_model' );
		// $this -> load -> model( 'Facebook_Model', 'fb' );

		$this -> load -> helper( 'date' );
		$this -> load -> helper( array( 'form', 'url' ) );

		$this -> load -> helper( 'template' );
		// $this -> load -> library( 'session' );//loads the library for all the functions
		$this -> load -> helper( 'validation_helper' );
		$this -> load -> helper( 'login_helper' );
		$this -> load -> helper( 'MY_text' );


	}

	public function index() {
		$data['base']=$this->config->item( 'base_url' );
		$data['title'] = 'Retrieve Password';

		$data['login_header'] = set_login_header();

		$this -> load -> view( 'templates/header', $data );
		$this -> load -> view( 'get_pass_view', $data );
		$this -> load -> view( 'templates/footer', $data );
	}

	public function retrieve() {

		$mail = $_POST['mail'];

		// echo $mail;

		//check the email in the database

		$id = $this -> user_model -> check_user_email($mail);

		if ($id == "")
		{
			echo 'Sorry!You do not have an account with us.';
		}
		else
		{
			$newpass = create_random_string();//generates a randomw password

			$data = array ( 'Password'=> do_hash($newpass, 'md5'));
			$where = array ( 'Id' => $id );

			$result = $this -> user_model -> update_user( $data, $where );

			$txt = "Your account password has been changed to " . $newpass . ".<p>Use this to log into your account from now on. You can change your password from the website."

			mail( $mail, "Do Not Reply", $txt);

			echo "An email has been sent to your mailing account.";
		}
		

		
	}
}
?>