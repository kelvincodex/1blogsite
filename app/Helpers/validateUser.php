<?php

function validate($user)
{
    $errors = array();

    if(empty($user['username'])){
       array_push($errors,'username required!');
    }
    if(empty($user['email'])){
       array_push($errors,'email required!');
    }
    if(empty($user['password'])){
       array_push($errors,'password required!');
    }
    if($user['passwordconf'] !== $user['password']){
       array_push($errors, 'password not match!');
    }

    $existingUser = selectOne('users', ['email'=>$user['email']]);
    if(isset($existingUser)){
       if(isset($user['edit-user']) && $existingUser['id'] != $user['id']){

          array_push($errors, 'email already exist!');
       }
       if(isset($user['reg-submit'])){

          array_push($errors, 'email already exist!');
       }

       
    }
    
    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if(empty($user['username'])){
       array_push($errors,'username required!');
    }

    if(empty($user['password'])){
       array_push($errors,'password required!');
    }
    return $errors;
}



?>