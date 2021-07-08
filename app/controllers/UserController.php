<?php

include 'Controller.php';
include '../../models/User.php';


class UserController extends Controller{
	function save($obj) {
		$user = new User();
		return $user->save($obj);
	}

	function update($obj){
		$user = new User();
		return $user->update($obj);
	}

	function delete($obj){
		$user = new User();
		return $user->delete($obj);
	}

	function find($id = null){
		$user = new User();
		return $user->find($id);
	}

	function findAll(){
		$user = new User();
		return $user->findAll();
	}
}