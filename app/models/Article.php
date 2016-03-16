<?php

use Phalcon\Mvc\Model;

class Article extends Model {
	
	public $id;
	
	public $title;
	
	public $description;
	
	public $cat_id;
	
	
	function initialize() {
		
		$this->belongsTo('cat_id', 'category', 'id');
		
	}
	
	
}