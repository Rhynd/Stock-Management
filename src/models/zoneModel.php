<?php

class zoneModel extends Model{
    
    public function __innit(){
        $this->table = "zone";
        $this->addField("id",[
            "type" => "int",
            "size" => 11,
            "primary_key" => true,
            "auto_increment" => true,
            "relation" => ["type" => "OneToOne",
                "entity" => "user",
                "foreign_key" => "id"]
        ]);
        $this->addField("libelle", [
            "type" => "varchar",
            "size" => 20
        ]);
        $this->addField("rue", [
            "type" => "varchar",
            "size" => 50
        ]);
        $this->addField("cp", [
            "type" => "int",
            "size" => 5
        ]);
        $this->addField("ville", [
            "type" => "varchar",
            "size" => 50
        ]);
    }
}