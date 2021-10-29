<?php 
require('connect.php');

session_start();

// to be deleted
 function dd($users)    
{
    echo "<pre>", print_r($users, true),"</pre>";
    die();
}

function executeQuery($sql,$data){
    global $conn;
    $query = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s',count($values));
    $query->bind_param($types, ...$values);
    $query->execute();
    return $query;
}




function selectAll($table, $conditions=[])
{
    global $conn;
    // write a query
    
    $sql = "SELECT * FROM $table";
    // make a query
    if(empty($conditions)){
        $query = $conn->prepare($sql);
        $query->execute();
        // fwtching the query as an arrray
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;

    }else{
 
        $i=0;
         foreach($conditions as $key => $value) {
            //   $sql = "SELECT * FROM $table WHERE 'admin'=>1 AND 'username'=>'awa'";
           
            if($i===0){
               $sql =$sql . " WHERE $key = ?";
           }else{
               $sql = $sql . " AND $key = ?";
           }
           $i++;
         }
         $query = executeQuery($sql, $conditions);
         // fwtching the query as an arrray
         $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
         return $result;
    }
}

function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";


        $i=0;
         foreach($conditions as $key => $value) {
            //   $sql = "SELECT * FROM $table WHERE 'admin'=>1 AND 'username'=>'awa'";
            if($i===0){
               $sql =$sql . " WHERE $key = ?";
           }else{
               $sql = $sql . " AND $key = ?";
           }
           $i++;
         }
         $sql = $sql . " LIMIT 1";
         $query = $query = executeQuery($sql, $conditions);
         // fwtching the query as an arrray
         $result = $query->get_result()->fetch_assoc();
         return $result;
    
}

// creating new data

function create($table, $data)
{
    global $conn;
    // $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?";
    $sql= "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
       if($i===0){
        $sql = $sql . " $key=?";
       }else{
           $sql = $sql . ", $key=?";
       }
       $i++; 
    }
    $query = executeQuery($sql,$data);
    $id= $query->insert_id;
    return $id;
}


function update($table, $id, $data)
{
    global $conn;
    // $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?";
    $sql= "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
       if($i===0){
        $sql = $sql . " $key=?";
       }else{
           $sql = $sql . ", $key=?";
       }
       $i++; 
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] =$id;
    $query = executeQuery($sql,$data);
    return $query->affected_rows;
}

function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id = ?";
    $query = executeQuery($sql,['id' => $id]);
    return $query->affected_rows;

}

function getPublished(){
    global $conn;
    // 'SELECT username FROM posts WHERE "published" => $_POST["published"]'; 

    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE published = ?";
    $query = executeQuery($sql,['published' => 1]);
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function getTopicId($t_id){
    global $conn;
    // 'SELECT username FROM posts WHERE "published" => $_POST["published"]'; 

    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE published = ? AND topic_id = ?";
    $query = executeQuery($sql,['published' => 1, 'topic_id' => $t_id]);
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function search($term){
    $match = '%' . $term . '%';
    global $conn;
    // 'SELECT username FROM posts WHERE "published" => $_POST["published"]'; 

    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id = u.id WHERE published = ? AND p.tittle LIKE ? OR p.body LIKE ?";
    $query = executeQuery($sql,['published' => 1, 'tittle'=> $match, 'body'=> $match]);
    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;

}




