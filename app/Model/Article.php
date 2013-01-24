<?php
// app/Model/Comment.php
App::uses('AuthComponent', 'Controller/Component', 'Comment');
    class Article extends AppModel {
        public $name = 'Article';
        public $actsAs = array ('Searchable');
        public $hasMany = array('Comment'=>array('className'=>'Comment'));
    }
