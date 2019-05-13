<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');
require_once('model/formvalidation.php');


session_start();

//create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define arrays
$f3->set('midterms', array('This midterm is easy', 'I like midterms', 'Today is Monday'));


//Define a default route
$f3->route('GET /', function () {

    echo "<h1>Midterm Survey</h1>";
    echo "<a href='survey'>Take my midterm Survey</a>";
});

//Define an order route
$f3->route('GET|POST /survey', function ($f3) {

    $isValid = true;
//If form has been submitted, validate
    if (!empty($_POST)) {
        //Get data from form
        $name = $_POST['name'];
        $midterm = $_POST['midterm'];

        //Add data to hive
        $f3->set('name', $name);
        $f3->set('midterm', $midterm);
        //If data is valid
        if (validForm()){
            //Write data to Session
            $_SESSION['name'] = $name;
            if (empty($midterm)) {
                $_SESSION['midterm'] = "No condiments selected";
            }
            else {
                $_SESSION['midterm'] = implode(', ', $midterm);
            }
            //Redirect to Summary
            $f3->reroute('/summary');
        }

    }
    //Display a views
    $view = new Template();
    echo $view->render('views/surveypage.html');
});


//Run Fat-Free
$f3->run();