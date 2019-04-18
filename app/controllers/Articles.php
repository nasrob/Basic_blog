<?php

class Articles extends Controller {

    public function __construct()
    {
        $this->articleModel = $this->model('Article');
    }
    
    public function index()
    {
        $articles = $this->articleModel->getArticles();
        $data = [
            'articles' => $articles,
        ];
        $this->view('articles/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => '',
            'body' => '',
        ];
        
        $this->view('articles/add', $data);
    }
}