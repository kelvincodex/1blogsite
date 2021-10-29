<?php 
include(ROOT_PATH . '/app/dbname/db.php');
include(ROOT_PATH . "/app/Helpers/middleware.php");
include(ROOT_PATH . "/app/Helpers/validatePost.php");
$topics = selectAll('topics');
$table = 'posts';
$posts = selectAll($table);
$errors = array();
$tittle ="";
$id ="";
$body = "";
$topic_id = "";
$publish = "";

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'topic deleted successful!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/admin/posts/index.php');
    exit();
}

if(isset($_GET['id'])){
    $post = selectOne($table,['id' => $_GET['id']]);
    $tittle = $post['tittle'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $publish =isset($post['published']);
    $id = $post['id'];
}


if(isset($_GET['p_id']) && isset($_GET['published'])){
    $publish = $_GET['published'];
    $id = $_GET['p_id'];
    //   .....update
    $count = update($table, $id, ['published' => $publish]);
    $_SESSION['message'] = 'post published successful!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/admin/posts/index.php');
    exit();

}

if (isset($_POST['add-post'])) {
     $errors = validatePost($_POST);
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;
       $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

       if ($result) {
          $_POST['image'] = $image_name;
       }else{
           array_push($errors, "failed to upload");
       }
    }else{
        array_push($errors, 'post image require!');
    }
    if(count($errors)===0){
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = (isset($_POST['published'])) ? 1 : 0 ;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);
        $_SESSION['message'] = 'post  successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/admin/posts/index.php");
    }else{
        $tittle = $_POST['tittle'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $publish = (isset($_POST['published'])) ? 1 : 0;
    }
}





if(isset($_POST['edit-post'])){
    $errors = validatePost($_POST);
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;
       $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

       if ($result) {

          $_POST['image'] = $image_name;

       }else{

           array_push($errors, "failed to upload");
       }
    }else{
        array_push($errors, 'post image require!');
    }
    if(count($errors)===0){
        $id = $_POST['id'];
        unset($_POST['edit-post'], $_POST['id']);
        $_POST['user_id'] =$_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0 ;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = update($table,$id, $_POST);
        $_SESSION['message'] = 'post edited successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/admin/posts/index.php");
        
        }
        else{
        $tittle = $_POST['tittle'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $publish = isset($_POST['published']) ? 1 : 0;
    }
}

