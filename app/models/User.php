<?php

include 'Model.php';

class User extends Model {
	private $id = null;
    private $name;
    private $pass;
    private $permission;
	
	public function __serialize(): array {	
		$serialize = [
			'name' => $this->name,
        	'pass' => $this->pass,
        	'permission' => $this->permission,
		];
		if ($this->id) $serialize['id'] = $this->id;
		return $serialize;
    }

    public function save($obj): array{
		$user = new User();
		$user->id = null;
		$user->name = $obj->name;
		$user->pass = md5($obj->pass);
		$user->permission = $obj->permission;
		return $user->model_save();
	}

	public function update($obj): array {
		$user = new User();
		$user->id = $obj->id;
		$user->name = $obj->name;
		$user->pass = md5($obj->pass);
		$user->permission = $obj->permission;
		return $user->model_update();
	}

	public function delete($obj): array {
		$user = new User();
		$user->id = $obj->id;
		return $user->model_delete();
	}

	public function find($id = null): array {
		$user = new User();
		$user->id = $id;
		return $user->model_find();
	}
}
