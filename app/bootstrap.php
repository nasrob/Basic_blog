<?php

require_once 'app/config/config.php';

// AutoLoader for Core Libs
spl_autoload_register(function ($class_name) {
    require_once 'app/libraries/' . $class_name . '.php';
});
