<?php

include '../../controllers/UserController.php';

$data = file_get_contents('php://input');
$obj =  json_decode($data);

$userController = new UserController();

$users = $userController->update($obj);

if(!empty($data)){	
    $userController = new UserController();
    echo json_encode($userController->update($obj));
}