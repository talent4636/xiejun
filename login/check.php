<?php
require_once('session.php');

function checkSession(){
    $session = new session();
    return $session->get('user');
}

$result = checkSession();
print_r($result);

?>