<?php
    //require_once('Database.php');
    //require_once('Post.php');
    
    //Headers
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-methods:DELETE');
    //header('Access-Control-Allow-Headers:Content-Type,
     //     Access-Control-Allow-Methods,Authorization,X-Requested-With');
    
    include_once 'Database.php';
    include_once 'Post.php';
     
    
    $database = new Database();
    $db=$database->connect();
    
    
    $post=new Post($db);
    
           //get row posted data
           $data=json_decode(file_get_contents("php://input"));
    
    
           //set ID to Delete
           $post->id=$data->id;
    

           
           //Delete post
           
           if($post->deleteParent()){
           echo json_encode(array('message'=>'Post Deleted'));
           }else{
           echo json_encode(array('message'=>'Post Not Deleted'));
           }
    ?>
