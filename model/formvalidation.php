<?php
function validForm()
{
    global $f3;
    $isValid = true;

    if (!validName($f3->get('name'))) {

        $isValid = false;
        $f3->set("errors['name']", "Please enter name");
    }

    if (!validMidterm($f3->get('midterm'))) {

        $isValid = false;
        $f3->set("errors['midterm']", "Please choose a valid selection");
    }

    return $isValid;
}
// first name validation
function validName($name) {
    //checks to see that a string is all alphabetic
    return
        (
            (!empty($name)) && ctype_alpha($name));
}

// indoor interests validation
function validMidterm($midterm)
{
    global $f3;
    if (empty($midterm))
    {
        return false;
    }
    foreach ($midterm as $midOption)
    {
        if (!in_array($midOption, $f3->get('midterm')))
        {
            return false;
        }
        return true;
    }
    //If we're still here, then we have valid names
    return true;
}
