<?php

use Phalcon\Mvc\Model;

class Category extends Model {
	
	function initialize() {
		
		$this->hasMany('id', 'Article', 'cat_id');
		
	}
	
}