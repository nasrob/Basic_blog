<?php

class Articles extends Controller {

    public function __construct()
    {
        $this->articleModel = $this->model('Article');
        
        // load the comments model to get thier data in the page
        $this->commentModel = $this->model('Comment');
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'title' =>  trim($_POST['title']),
                'body' => trim($_POST['body']),
                'category' => '',
                'is_published' => trim($_POST['status']),
                'date' => '',
                'title_err' => '',
                'body_err' => ''
            ];

            // validation
            if (empty($data['title'])) {
                $data['title_err'] = 'Please Enter a Title';
            }

            if (empty($data['body'])) {
                $data['body_err'] = 'Please Enter a Body';
            }

            // checking for errors
            if (empty($data['title_err']) && empty($data['body_err'])) {
                
                try {
                    $this->articleModel->addArticle($data);
                    redirect('articles');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
                
                // if ($this->articleModel->addArticle($data)) {
                //     flash('article_message', 'Article Added successfuly');
                //     rediret('articles');
                // } else {
                //     die(var_dump('Couldn\'t add the Article, something went worng'));
                // }
                
            } else {
                // load view with errors
                $this->view('articles/add', $data);
            }
            
        } else {
            $data = [
                'title' => '',
                'body' => '',
            ];
        }

        $this->view('articles/add', $data);
    }

    public function show($id)
    {
        $article = $this->articleModel->getArticleById($id);
        $comments = $this->commentModel->getArticleComments($id);
        $data = [
            'article' => $article,
            'comments' => $comments
        ];

        $this->view('articles/show', $data);
    }
}