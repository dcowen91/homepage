<?php 
    $dsn = "pgsql:host=ec2-54-197-241-64.compute-1.amazonaws.com;port=5432;dbname=d4qu50ed9jnsjp;user=ehyhduujrqfcnl;sslmode=require;password=P2ZzzgYBOUUc054rRGen8Y7YUb";
    $db = new PDO($dsn);

    $query = $db->prepare("
    SELECT postnum, title, posted FROM posts
    ");

    $query->execute();
    $posts = $query->fetchAll();
    echo json_encode($posts);


?>