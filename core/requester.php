<?php

class Requester {

    public function __construct(){
        if (method_exists($this, "__init")) {
            $this->__init();
        }

    }

    private function whatSearch(array $search, int $times){
        if (count($search) != $times) {
            $what = [];
            for ($i = 0; $i < $times; $i++) {
                if (count($search) <= $i){
                    $what[$i] = $search[0];
                }
                else{
                    $what[$i] = $search[$i];
                }
            }
            return $what;
        }
        else{
            return $search;
        }
    }

    private function formWhere(string $cond, array $search, array $quoi){
        $searchF = $this->whatSearch($search, count($quoi));
        $where = [];
        $where[0] = $searchF[0] ." like '" . $quoi[0] . "'";
        $lenQuoi = count($quoi);
        if ($lenQuoi > 0 || $cond != "null") {
            for ($i = 1; $i < $lenQuoi; $i++ ){
                $where[$i] = " " .$cond . " " .$searchF[$i] ." like '" . $quoi[$i] ."'";
            }
        }
        return $where;
    }

    public function where(string $cond = "null", array $search, array $quoi){
        if ($cond == "null" and (count($quoi) == 0 or $quoi[0] == "")) {
            return "";
        }
        $form = " WHERE ";
        $where = $this->formWhere($cond, $search, $quoi);
        foreach($where as $q) {
            $form = $form .$q;
        }
        return $form;
    }

    public function find(string $table, string $column = '*', array $search, array $quoi, string $cond = "null"){
        $request = "SELECT " .$column ." FROM " .$table .$this->where( $cond, $search, $quoi);
        return $request;
    }

    public function insert(string $table, string $column, string $data){
        $request = "INSERT INTO " .$table  ."($column) VALUES ($data)";
        return $request;
    }

    public function update(string $table,array $data, array $search, array $quoi, string $cond = "null"){
        $set = "";
        foreach ($data as $key => $value) {
            $set .= $key ." = '" .$value ."', ";
        }
        $set = rtrim($set, ", ");
        $request = "UPDATE " .$table ." SET " .$set ." ".$this->where($cond, $search, $quoi);
        return $request;
    }

    public function delete(string $table, string $cond, array $search, array $quoi){
        $request = "DELETE FROM " .$table ." " .$this->where($cond, $search, $quoi);
        return $request;
    }


}