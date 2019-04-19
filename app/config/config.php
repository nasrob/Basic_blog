<?php
// App root folder
define('APPROOT', dirname(dirname(__FILE__)));

// URL root
define('URL_ROOT', 'http://localhost:9999');

// Site name
define('SITE_NAME', 'Basic Medium');
define('APP_VERSION', '0.0.1-SNAPSHOT');
// DB params
define('DB_HOST', 'localhost:' . '3306');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blog_mvc');

// Article Categories
const SPORTS_ARTICELS = 'Sports';
const BUSINESS_ARTICLES = 'Business';
const TECH_ARTICLES = 'Tech';
const LIFE_STYLE_ARTICLES = 'LifeStyle'; 