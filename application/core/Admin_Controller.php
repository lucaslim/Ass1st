<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the controller for the Admin authentication
 * When instantiated, it ensures the user has admin access
 *
 * @package   Assist
 * @author    Team Assist
 */

// --------------------------------------------------------------------

class Admin_Controller extends CI_Controller
{

  protected $the_user; // class wide variable

  function __construct()
  {
    parent::__construct();
    $this -> load -> library('ion_auth');

    if($this->ion_auth->is_admin()) {

        $data = new stdClass(); // resolves object error

        // store the user info in variable the_user
        $this->the_user = $this->ion_auth->user()->row();
        $data->the_user = $this->the_user;
        $this->load->vars($data);
    }
    else {
        redirect('/');
    }
  }
}