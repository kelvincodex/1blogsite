<?php
function validateTopic($topic)
{
    $errors = array();
    $table = 'topics';

    if(empty($topic['name'])){
       array_push($errors,'name required!');
    }

    $existingTopic = selectOne($table, ['name'=>$topic['name']]);
    if(isset($existingTopic)){
        if(isset($topic['edit-post']) && $existingTopic['id'] != $topic['id']){
            array_push($errors, 'topic already exist!');
        }
        
        if(isset($topic['add-topic']))
        array_push($errors, 'topic already exist!');
    }
    
    return $errors;
}





?>