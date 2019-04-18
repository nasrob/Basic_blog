<?php

/**
 * Base Controller
 * Loads the models and views
 */
class Controller {

    /**
     * retrieve the model class
     *
     * @param [type] $model
     * @return instance of $model
     */
    public function model($model)
    {
        // require model file
        require_once 'app/models/' . $model . '.php';
        // instantiate model class
        return new $model(); 
    }


    public function view($view, $data = [])
    {
        if (file_exists('app/views/' . $view . '.php')) {
            require_once 'app/views/' . $view . '.php';
        }else {
            die('View does not exist');
        }
    }
    
}