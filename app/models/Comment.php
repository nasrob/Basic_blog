<?php

class Comment {
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getArticleComments($article_id)
    {
        $this->db->prepareQueryStatement(
            'SELECT * FROM comments WHERE article_id = :article_id'
        );

        $this->db->bind(':article_id', $article_id);

        $results = $this->db->getAll();
        return $results;
    }

    public function addCommentOnArticle($data)
    {   
        $comment = $this->db->insert('comments', [
            'article_id' => $data['article_id'], 
            'name' => $data['name'],
            'message' => $data['message'],
        ]);
    }
}