<?php
class PostsController extends AppController {
    var $name = 'Posts';
    var $components = array('Session');
	function beforeFilter() {
		$this->layout = 'user';
		$this->Auth->allow('*');
		$this->set('authUser',$this->Auth->user());
        $this->set('username',$this->Auth->user('username'));
		App::import('model','Category');
		$catObj = new Category();
		$this->set('categories',$catObj->find('all'));
    }
	

    function index() {
		$this->set('title_for_layout', 'Home');
        $this->set('posts', $this->Post->find('all'));
		$this->set('current', 'HOME');
    }

    function view_post($id) {
        $this->Post->id = $id;
		App::import('model','Comment');
		$commentObj = new Comment();
		if(isset($this->data) && !empty($this->data)){
			$commentObj->save($this->data);
			$this->Session->setFlash('Comment has saved successfully.');
			$this->redirect('/posts/view_post/'.$id);
		}else{
			$this->set('comments' , $commentObj->find('all',array('conditions'=>array('post_id'=>$id))));
			$this->set('post', $this->Post->read());
			$this->set('user_id', $this->Auth->user('id'));
			$this->set('username', $this->Auth->user('username'));
			$this->set('id', $id);
		}
    }

    function add() {
        if (!empty($this->data)) {
			$this->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
            if ($this->Post->save($this->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

function delete($id) {
    if ($this->Post->delete($id)) {
        $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
        $this->redirect(array('action' => 'index'));
    }
}

function edit($id = null) {
    $this->Post->id = $id;
    if (empty($this->data)) {
		$this->data = $this->Post->read();
    } else {
        if ($this->Post->save($this->data)) {
            $this->Session->setFlash('Your post has been updated.');
            $this->redirect(array('action' => 'index'));
        }
    }
}
function search() {
	$keyword = $this->data['Post']['q'];
	//echo $keyword;exit();
	
	$searched_posts = array();
	$repitition = array();
	$posts = $this->Post->find('all', array(
        'joins' => array(
            array(
                'table' => 'comments',
                'conditions' => array(
				'comments.post_id = Post.id',
				'OR' => array(
					'Post.title like' => '%'.$keyword.'%',
					'Post.body like' => '%'.$keyword.'%',
					'comments.author_name like' => '%'.$keyword.'%',
					'comments.comment like' => '%'.$keyword.'%',
				),
				),
            ),
        )
    ));
	
	foreach($posts as $post){
		if(!isset($repitition[$post['Post']['id']])){
			$searched_posts[] = $post['Post'];
			$repitition[$post['Post']['id']] = $post['Post']['id'];
		}
	}
	$this->set('results', $searched_posts);
	/*$posts = $this->Post->find('all', array(
    'contain' => array('Comment'=>array( 'conditions' => array(
	'OR' => array(
			'Comment.author_name like' => '%'.$keyword.'%',
			'Comment.comment like' => '%'.$keyword.'%',

        ),
	))),
    'conditions' => array(
		'OR' => array(
			'Post.title like' => '%'.$keyword.'%',
			'Post.body like' => '%'.$keyword.'%',

        ),
    ),
	));*/	
}

function add_new_post(){
	if (!empty($this->data)) {
		$this->data['Post']['user_id'] = $this->Auth->user('id');
		$this->Post->create();
		$this->Post->save($this->data);
		$this->Session->setFlash('Post has saved successfully');
		$this->redirect(array('controller' => 'posts','action' => 'add_new_post'));
    }
}

function about(){
	$this->set('current', 'ABOUT');
}

}
?>