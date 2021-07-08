<?php

include '../../../config/database/Connection.php';

Class Model Extends Connection{

    private $table;
    private $data;
    private $statement;
    private $bindPrefix = ":";
    private $status = false;
    private $hasErros = false;
    private $registers = null;

    public function model_save() {
        
        $this->setTable(get_class($this));
        $this->setData($this::__serialize());

        $query = "INSERT INTO $this->table ";
        $query .= "(" . implode(", ", array_keys($this->data)) . ")";
        $query .= " VALUES ";
        $query .= "(" . $this->buildParams() . ")";

        $this->statement = Connection::prepare($query);

        $this->bindValues();

        return $this->execute();
    }

    public function model_update() {
        
        $this->setTable(get_class($this));
        $this->setData($this::__serialize());

        $query = "UPDATE $this->table SET ";
        $query .= $this->buildParams(true);
        $query .= " WHERE id = :id";

        $this->statement = Connection::prepare($query);

        $this->bindValues();

        return $this->execute();
    }

    public function model_delete() {
        
        $this->setTable(get_class($this));
        $this->setData($this::__serialize());

        $query = "DELETE FROM $this->table ";
        $query .= " WHERE id = :id";

        $this->statement = Connection::prepare($query);

        $this->bindValues();

        return $this->execute();
    }

    public function model_find() {
        
        $this->setTable(get_class($this));
        $this->setData($this::__serialize());

        $query = "SELECT * FROM " . $this->table;

        if (isset($this->data['id'])){ 
            $query .= " WHERE id = :id";
        }

        $this->statement = Connection::prepare($query);

        $this->bindValues();

        return $this->execute(true);
    }

    private function buildParams($isUpdate = false) {
        $str = "";
        foreach($this->data as $key => $value) {
            if ($isUpdate) $str.= $key . "=";
            $str .= $this->bindPrefix . $key . ",";
        }
        return rtrim($str, ",");     
    }

    private function bindValues() {
        foreach($this->data as $key => $value) {
            if ($value) $this->statement->bindValue($this->bindPrefix . $key, $value);
        }
    }

    private function execute($isSelect = false) {
        $return = null;
        try {
            $return['status'] = $this->statement->execute();
            if ($isSelect) {
                $return['data'] = $this->statement->fetchAll();
            }
        } catch (Exception $e) {
            $return['status'] = false;
            $return['hasErros'] = "Error: " . $e->getMessage();
        }
        return $return;
    }

    private function setTable($name) {
        $this->table = strtolower($name);
    }

    private function setData($data) {
        $this->data = $data;
    }
}