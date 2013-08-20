<?php
class CategoriesController extends AppController {
    var $name = 'Categories';
    var $components = array('Session');
	function beforeFilter() {
		$this->layout = 'user';
		$this->set('authUser',$this->Auth->user());
        $this->set('username',$this->Auth->user('username'));
    }
	

    function add_category() {
		if(!empty($this->data)) {
			if($this->Category->save($this->data)) {
				$this->Session->setFlash('Category has saved successfully');
				$this->redirect(array('controller' => 'categories','action' => 'add_category'));
			}
		}
    }
	function view_category($id) {
		$data = $this->Category->find('first',array('conditions' => array("id"=>$id)));
		$category = $data['Category'];
		$posts = $data['Post'];
		$this->set('category',$category);
		$this->set('posts',$posts);
    }
}
?>