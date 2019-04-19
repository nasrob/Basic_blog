<?php

class Article {
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getArticles()
    {
        $this->db->prepareQueryStatement('SELECT * FROM articles');

        $results = $this->db->getAll();
        return $results;
    }

    public function addArticle($data)
    {
        /*
        $this->db->prepareQueryStatement(
                'INSERT INTO articles (title, article_text, date, category, is_published) 
                VALUES(:title, :article_text, :date, :category, :is_published)'
        );

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':article_text', $data['body']);
        $this->db->bind(':date', null);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':is_published', $data['is_published']);

        try {
            $this->db->execute();
        } catch (PDOException $e) {
            die(var_dump($e->getMessage()));
        }
        */
        
        $article = $this->db->insert('articles', [
            'title' => $data['title'], 
            'article_text' => $data['body'],
            'date' => (date('Y-m-d H:i:s')),
            'category'=> '',
            'is_published' => $data['is_published'],
        ]);
        
    }

    public function getArticleById($id)
    {
        $this->db->prepareQueryStatement(
            'SELECT * FROM articles WHERE id = :id'
        );
        $this->db->bind(':id', $id);
        $row = $this->db->getOne();
        return $row;
    } 
}