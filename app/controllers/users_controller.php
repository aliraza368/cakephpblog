<?php
class UsersController extends AppController {

    var $name = 'Users';
    var $components = array('Auth'); // Not necessary if declared in your app controller
	
	function beforeFilter() {
        $this->Auth->fields = array(
            'username' => 'username',
            'password' => 'password'
        );
		$this->layout = 'user';
		$this->set('authUser',$this->Auth->user());
        $this->set('username',$this->Auth->user('username'));
		
		//$this->Auth->allow('index','view', 'register');
		$this->Auth->allow('*');
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard');
    }
	
    /**
     *  The AuthComponent provides the needed functionality
     *  for login, so you can leave this function blank.
     */
    function login() {
		$this->set('title_for_layout', 'Login');
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
	
	function register() {
		if(!empty($this->data)) {
			$this->User->create();
			//$assigned_password = 'password';
			//$this->data['User']['password'] = $assigned_password;
			if($this->User->save($this->data)) {
				// send signup email containing password to the user
				$this->Auth->login($this->data);
				$this->redirect(array('controller' => 'posts','action' => 'index'));
			}
		}
	}
	
	function dashboard(){
		$this->set('title_for_layout', 'Dashboard');
		//echo "here";exit();
	}

}
?>