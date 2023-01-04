<?php

if($api == 'usuarios'){
   
    // POST
    if($method == 'POST' && !isset($_POST['_method'])){
        require_once 'post.php';
    }
}

