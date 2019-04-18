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
}