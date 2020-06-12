<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{

    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;

    }


    public function selectAll($table)
    {
        $stmt = $this->pdo->prepare("select * from {$table}");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)//tabela e vetor de parametros
    {
        
        $sql = sprintf('insert into %s (%s) values(%s)', $table, implode(", ", array_keys($parameters)),
        "'" . implode("', '", array_values($parameters)) . "'");

        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
 
        }catch(Exception $e){

           $e->getMessage();
     }
         
    }
    public function edit($table,$parameters,$id)
    {  
        //tentando monstar uma query poque essa tem erro de sintaxe
        $sql = "update {$table} set " ;
       foreach( $parameters as $key => $value) {
           if($value != ''){
        $sql = $sql . "`" . $key . "`" . '=' . "'" . $value . "'". ' ';
           }

       }
       $sql = $sql . "where `id`='{$id}'";

      // $sql = sprintf('update %s set (%s) values(%s) where id = (%s)', $table, implode(", ", array_keys($parameters)),
       // "'" . implode("', '", array_values($parameters)), $id  . "");
        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
 
        }catch(Exception $e){

           $e->getMessage();
        }
         
    }
    public function delete()
    {
      
         
    }
    public function read($table, $id)
    {
      $sql = "select * from " . $table . " where id =" . $id;

      try{
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }catch(Exception $e){

       $e->getMessage();
 }

    }
}
