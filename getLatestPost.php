<?php
	include 'global.php';

	$query = $db->prepare("
		SELECT postnum FROM posts ORDER BY postnum DESC LIMIT 1
	");

	 $query->execute(
         array(
             ':pid' => $_GET['post'],
         )
     );

     $num = $query->fetch();
     echo json_encode($num);





?>