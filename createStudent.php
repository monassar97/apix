<?php
    //require_once('Database.php');
    //require_once('Post.php');
    
    //Headers
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-methods:POST');
    //header('Access-Control-Allow-Headers:Content-Type,
      //     Access-Control-Allow-Methods,Authorization,X-Requested-With');
    
    include_once 'Database.php';
    include_once 'Post.php';
     
    
    $database = new Database();
    $db=$database->connect();
    
    
    $post=new Post($db);
    
    //get row posted data
           $data=json_decode(file_get_contents("php://input"));
           
           $post->name=$data->name;
           $post->gender=$data->gender;
           $post->grade=$data->grade;
           $post->age=$data->age;
           $post->class_id=$data->class_id;
           
           //create post
           
           if($post->createStudent()){
           echo json_encode(array('message'=>'Post Creates'));
           }else{
           echo json_encode(array('message'=>'Post Not Created'));
           }
    ?>
