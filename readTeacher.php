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
    
    $result=$post->readTeacher();
    
    $num=$result->rowCount();
    
    //check if any posts
    if($num>0){
        //Post array
        $posts_arr=array();
        $posts_arr['data']=array();
        
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            
            $post_item=array(
                             'id'=>$id ,
                             'name'=>$name,
                             'username'=>$username,
                             'password'=>$password,
                             'gender'=>$address,
                             'phone'=>$phone,
                             'email'=>$email,
                             'school_id'=>$school_id,
                             'created_at'=>$created_at,
                             'updated_at'=>$updated_at
                             );
            array_push($posts_arr['data'], $post_item);
        }
        echo json_encode($posts_arr);
    }else{
        echo json_encode(
                         array('message'=>'No Posts Found')
                         );
        
    }
    
    ?>
