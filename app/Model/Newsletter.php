<?php

App::uses('AuthComponent', 'Controller/Component', 'Post');

class Newsletter extends AppModel {

    public $name = 'Newsletter';
    public $displayField = 'email';
    
    public $validate = array(
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Email address is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email incorrect',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
