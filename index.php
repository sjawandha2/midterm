<?php

//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /' , function (){
    echo '<h1>Midterm Survey</h1>';
    echo '<a href="home.html">Take my Midterm Survey</a>';
});



//Run Fat-Free
$f3->run();