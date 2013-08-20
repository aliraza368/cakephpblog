<?php
class UsersController extends AppController {

    var $name = 'Users';
    var $components = array('Auth'); // Not necessary if declared in your app controller
	
	function beforeFilter() {
        $this->Auth->fields = array(
            'username' => 'username',
            'password' => 'secretword'
        );
    }
	
    /**
     *  The AuthComponent provides the needed functionality
     *  for login, so you can leave this function blank.
     */
    function login() {
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
}
?>