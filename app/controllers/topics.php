<?php 
include(ROOT_PATH . '/app/dbname/db.php');
include(ROOT_PATH . "/app/Helpers/middleware.php");
include(ROOT_PATH . "/app/Helpers/validateTopic.php");
$errors = array();
$table = 'topics';
$topics = selectAll($table);
$name = "";
$id ="";
$description ="";


if(isset($_POST['add-topic'])){
    $errors = validateTopic($_POST);
    if(count($errors)===0){
    unset($_POST['add-topic']);   
    $topics_id = create($table, $_POST);
    $_SESSION['message'] = 'topic created successful!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/admin/topics/index.php');
    exit();
    }else{
        $name = $_POST['name'];
        $description = $_POST['description'];
    }

}


if(isset($_GET['id'])){
    $topic = selectOne($table,['id' => $_GET['id']]);
    $name = $topic['name'];
    $id = $topic['id'];
    $description = $topic['description'];
}

if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'topic deleted successful!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/admin/topics/index.php');
    exit();

}

if(isset($_POST['edit-topic'])){
    $errors = validateTopic($_POST);
    if(count($errors)===0){
        $id = $_POST['id'];
        unset($_POST['edit-topic'], $_POST['id']);
        $topics_id = update($table,$id,$_POST);
        $_SESSION['message'] = 'topic updated successful!';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/admin/topics/index.php');
        exit();
    }else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }

}


?>