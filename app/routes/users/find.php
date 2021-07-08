<?php

include '../../controllers/UserController.php';

$userController = new UserController();

$id = isset($_GET['id']) ? $_GET['id'] : null;

header('Content-Type: application/json');

$users = $userController->find($id);

echo json_encode($users);