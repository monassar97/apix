<?php
    //require_once('Database.php');
    //require_once('Post.php');
    
    //Headers
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    
    include_once 'Database.php';
    include_once 'Post.php';
     
    
    $database = new Database();
    $db=$database->connect();
    
    
    $post=new Post($db);
    
    $post->id=isset($_GET['id'])?$_GET['id']:die();
    
    $post->readSingleTeacher();
    
    $post_arr=array('id'=>$post->id,
                    'name'=>$post->name,
                    'username'=>$post->username,
                    'password'=>$post->password,
                    'gender'=>$post->gender,
                    'phone'=>$post->phone,
                    'email'=>$post->email,
                    'school_id'=>$post->school_id,
                    'created_at'=>$post->created_at,
                    'updated_at'=>$post->updated_at
    );
    print_r(json_encode($post_arr));
    
    ?>
