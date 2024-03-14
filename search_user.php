<?php

include './insert_user.php';

$insert_user = new InsertUser();
$result = $insert_user->Search($_POST);
echo json_encode($result);


?>