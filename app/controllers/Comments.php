<?php

class Comments extends Controller {
    
    public function __construct()
    {
        $this->commentModel = $this->model('Comment');
        $this->articleModel = $this->model('Article');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
            $data = [
                'article_id' =>  trim($_POST['article_id']),
                'name' => trim($_POST['name']),
                'message' => trim($_POST['message']),
                'message_err' => '',
                'name_err' => ''
            ];
            
            // validation
            if (empty($data['name'])) {
                $data['name_err'] = 'Please Enter your name';
            }

            if (empty($data['message'])) {
                $data['message_err'] = 'Please Enter a Comment';
            }

            // checking for errors
            if (empty($data['name_err']) && empty($data['message_err'])) {
                
                try {
                    $this->commentModel->addCommentOnArticle($data);
                    redirect('articles/show/' . $data['article_id']);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                // load view with errors
                redirect('articles/show/' . $data['article_id']);
            }
            
        } else {
            $data = [
                'name' => '',
                'messsage' => '',
            ];
        }

        redirect('articles/show/' . $data['article_id']);
    }
    
}