<?php

class ArticleController extends BaseController {
	
	public function initialize() {
		
		if(!$this->session->get('auth')) return $this->response->redirect('auth/index');
		
		$this->tag->setTitle('Article');
		parent::initialize();
		
	}
	
	public function indexAction() {
		
		$article = Article::find();
		
		$this->view->article = $article;
		
		
	}
	
	public function newAction() {
		
		$category = Category::find();
		$this->view->category = $category;
		
	}
	
	public function editAction($id) {
		
		$article = Article::findFirstById($id);
		
		$this->view->id 			= $article->id;
		$this->view->title 			= $article->title;
		$this->view->description 	= $article->description;
		$this->view->cat_id 		= $article->cat_id;

		$category = Category::find();
		$this->view->category 		= $category;
		
	}
	
	public function saveAction() {
		
		$article = new Article();
		
		$success = $article->save($this->request->getPost(), array('title', 'description', 'cat_id'));
		
		if(!$success) {
			$this->flash->error('gagal');
			return $this->response->redirect('article/new');
		}
		
		$this->flash->success('Success Save data');
		return $this->response->redirect('article/index');
		
	}
	
	public function updateAction() {
		
		$id 	 = $this->request->getPost('id');
		
		$article = Article::findFirstById($id);
		
		$success = $article->save($this->request->getPost(), array('title', 'description', 'cat_id'));
		
		if(!$success) {
			$this->flash->error('gagal');
			return $this->response->redirect('article/new');
		}
		
		$this->flash->success('Success Save data');
		return $this->response->redirect('article/index');
		
	}
	
	public function deleteAction($id) {
		
		$article = Article::findFirstById($id);
		
		if(!$article) {
			$this->flash->error('Data Not Found');
			return $this->response->redirect('article/index');
		}
		
		if(!$article->delete()) {
			foreach($article->getMessages as $message) {
				$this->flash->error();
			}
			return $this->response->redirect('article/index');
		}
		
		$this->flash->success('success delete data');
		return $this->response->redirect('article/index');
		
	}
	
	
}