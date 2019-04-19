<?php

// simple helper funtion for redirection

function redirect($page)
{
    header('location: ' . URL_ROOT . '/' . $page);
}