<?php 
    include 'global.php';

    $query = $db->prepare("
    SELECT postnum FROM posts WHERE postnum = :pid
    ");

    $query->execute(
         array(
             ':pid' => $_GET['post'],
         )
     );
    $posts = $query->fetch();
    echo json_encode($posts);


?>