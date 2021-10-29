<?php 
include(ROOT_PATH . "/app/dbname/db.php");
include(ROOT_PATH . "/app/Helpers/middleware.php");
include(ROOT_PATH . "/app/Helpers/validateUser.php");

$table = 'users';
$adminUser = selectAll($table);
$errors = array();
$username = '';
$email = '';
$password = '';
$passwordconf = '';
$admin ='';
$id = '';



function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'you are logged in!';
    $_SESSION['type'] = 'success';

    // if($_SESSION['admin'] === 1){
    //      header('location:' . BASE_URL . '/admin.php');
    //  }else{
    header('location:' . BASE_URL . '/index.php');
    //  }
     exit();
 }


if(isset($_POST['submit']) || isset($_POST['reg-submit'])){
    // check errors
    $errors = validate($_POST);
    if(count($errors) === 0){
        unset($_POST['submit'], $_POST['passwordconf'], $_POST['reg-submit']);
        $_POST['password']= password_hash($_POST['password'], PASSWORD_DEFAULT);

        if(isset($_POST['admin'])){
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);  
            $_SESSION['message'] = 'admin user created';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/users/index.php');
            exit();
        }else{
            $_POST['admin']=0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id'=>$user_id]);
            // login 
            loginUser($user);
        }

    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordconf = $_POST['passwordconf'];
        $admin = isset($_POST['admin']) ? 1 : 0;
    }
}

if(isset($_POST['login'])){
    $errors = validateLogin($_POST);
    if(count($errors)===0){
        $user = selectOne($table, ['username'=>$_POST['username']]);
        if($user && password_verify($_POST['password'], $user['password'])){
         // login 
         loginUser($user);
        }else{
            array_push($errors, 'wrong cridential!');
        }
    } else{
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
}

if(isset($_GET['delete_id'])){
   $count = delete($table, $_GET['delete_id']);
   $_SESSION['message'] = 'admin user delete';
   $_SESSION['type'] = 'success';
   header('location:' . BASE_URL . '/admin/users/index.php');
   exit();
}

if(isset($_POST['edit-user'])){
    $id = $_POST['id'];
    $errors = validate($_POST);
    if(count($errors)==0){
        unset($_POST['passwordconf'], $_POST['edit-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $_POST['admin'] = isset($_POST['admin'])?1:0;

       $edit_id = update($table,$id, $_POST );
       $_SESSION['message'] = 'admin user updated';
       $_SESSION['type'] = 'success';
       header('location:' . BASE_URL . '/admin/users/index.php');
       exit();
    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordconf = $_POST['passwordconf'];
        $admin = isset($_POST['admin']) ? 1 : 0;
    }
}

if(isset($_GET['edit_id'])){
    $edit = selectOne($table,['id' => $_GET['edit_id']]);
    $id = $edit['id'];
    $username = $edit['username'];
    $email = $edit['email'];
    $admin = ($edit['admin'])==1 ? 1 : 0;
}



?>