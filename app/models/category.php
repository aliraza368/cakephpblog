<?php
class Category extends AppModel
{
    var $name = 'Category';
	//var $actsAs     = array('Searchable');
	var $hasAndBelongsToMany = array(
        'Post' =>
		array(
			'className'              => 'Post',
			'joinTable'              => 'posts_categories',
			'foreignKey'             => 'category_id',
			'associationForeignKey'  => 'post_id',
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
        'category_name' => array(
            'rule' => 'notEmpty'
        ),
        'slug' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>