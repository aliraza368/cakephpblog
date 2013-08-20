<?php
class Comment extends AppModel {
    var $name = 'Comment';
	public $actsAs = array('Containable');
	var $belongsTo = array(
        'Post' => array('counterCache' => true  )
	);
}
?>