<?php
class Post extends AppModel
{
	//var $actsAs     = array('Searchable');
    var $name = 'Post';
	public $actsAs = array('Containable');
	var $belongsTo = array(
        'User' => array('counterCache' => true  )
		);
	
	var $hasMany = array(
        'Comment' => array(
            'className'  => 'Comment'
        )
    );
		
	 var $hasAndBelongsToMany = array(
        'Category' =>
		array(
			'className'              => 'Category',
			'joinTable'              => 'posts_Categories',
			'foreignKey'             => 'post_id',
			'associationForeignKey'  => 'category_id',
			'unique'                 => true,
			'conditions'             => '',
			'fields'                 => '',
			'order'                  => '',
			'limit'                  => '',
			'offset'                 => '',
			'finderQuery'            => '',
			'deleteQuery'            => '',
			'insertQuery'            => ''
		)
	);
		
    var $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>