<?php

class model extends DB {

    protected $table;

    public function __construct(){
        parent::__construct();
        if (method_exists($this, "__init")) {
            $this->__init();
        }
        $this->requester = new Requester();

    }

    public function find(bool $mode, $id, $search, $column = '*') {
        $stmt = $this->co->prepare($this->requester->find($this->table, $column, [$search], [$id]));
        //var_dump($stmt);
        $stmt->execute();
        if (!$mode) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        else {
            $data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data2;
    }

    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $temp = ":" . implode(", :", array_keys($data));
        $stmt = $this->co->prepare($this->requester->insert($this->table, $columns, $temp));
        $stmt->execute($data);
        return $stmt->rowCount();
}

    public function update($data, $search = "id") {
        $temp = ":" . implode(", :", array_keys($data));
        $stmt = $this->co->prepare($this->requester->update($this->table, $data, [$search], [$data[$search]]));
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function delete(string $cond, string $column, string $id) {
        $stmt = $this->co->prepare($this->requester->delete($this->table,$cond,  [$column], [$id]));
        $stmt->execute();
        return $stmt->rowCount();
    }
}