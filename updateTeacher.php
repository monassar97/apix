<?php
    //require_once('Database.php');
    //require_once('Post.php');
    
    //Headers
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-methods:PUT');
    //header('Access-Control-Allow-Headers:Content-Type,
      //     Access-Control-Allow-Methods,Authorization,X-Requested-With');
    
    include_once 'Database.php';
    include_once 'Post.php';
     
    
    $database = new Database();
    $db=$database->connect();
    
    
    $post=new Post($db);
    
    //get row posted data
           $data=json_decode(file_get_contents("php://input"));
    
    
    //ser ID to UPDATE
    $post->id=$data->id;
    
    
           $post->name=$data->name;
           $post->username=$data->username;
           $post->password=$data->password;
           $post->gender=$data->gender;
           $post->phone=$data->phone;
           $post->email=$data->email;
           $post->school_id=$data->school_id;
            
           
           //create post
           
           if($post->updateTeacher()){
           echo json_encode(array('message'=>'Post Updated'));
           }else{
           echo json_encode(array('message'=>'Post Not Updated'));
           }
    ?>
