<?php

// Set register date
function current_date() {
    $current_date = date('Y-m-d');
    return $current_date;
}



// A function that can be used to extend months
function add_months_to_current_date($months) {
    
    $exp_date = date('Y-m-d', strtotime("+$months months"));
    return $exp_date;
}

//A function that will set the default account expiration date

function set_default_exp_date($month) {
    $exp_date = date('Y-m-d', strtotime("+$month months"));
    return $exp_date;
}




?>