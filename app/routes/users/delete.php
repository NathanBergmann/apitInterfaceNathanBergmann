<?php

include '../../controllers/UserController.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);

if(!empty($data)){	
    $userController = new UserController();
    echo json_encode($userController->delete($obj));
}