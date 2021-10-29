<?php

function validatePost($post)
{
    $errors = array();

    if(empty($post['tittle'])){
       array_push($errors,'title required!');
    }
    if(empty($post['body'])){
       array_push($errors,'body required!');
    }
    if(empty($post['topic_id'])){
       array_push($errors,'please select a topic!');
    }

    $existingPost = selectOne('posts', ['tittle'=>$post['tittle']]);
    if(isset($existingPost)){
      //   array_push($errors, 'title  already exist!');
        if(isset($post['edit-post']) && $existingPost['id'] != $post['id']){
            array_push($errors, 'this title already exit!');
        }
        if(isset($post['add-post'])){
         array_push($errors, 'this title already exit!');
        }
    }
    
    return $errors;
}