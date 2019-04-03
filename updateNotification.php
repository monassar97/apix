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
    
    
           $post->teacher_id=$data->teacher_id;
           $post->student_id=$data->student_id;
           $post->parent_id=$data->parent_id;
           $post->class_id=$data->class_id;
           $post->title=$data->title;
           $post->content=$data->content;
           $post->opened=$data->opened;
           $post->general=$data->general;
            
           
           //create post
           
           if($post->updateNotification()){
           echo json_encode(array('message'=>'Post Updated'));
           }else{
           echo json_encode(array('message'=>'Post Not Updated'));
           }
    ?>
