<?php

class Pages extends Controller {
    
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome to Medium MVP',
            'descirption' => 'Simple Blogging Plateform'
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'descirption' => 'Basic App to Share Blog posts'
        ];

        $this->view('pages/about', $data);
    }
}