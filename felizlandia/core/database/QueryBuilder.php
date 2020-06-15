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
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);      
    }

    public function insert($table, $parameters)
    {
        echo $parameters;
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
    public function edit($table, $parameters, $id)
    {
        $size = count(array_keys($parameters));
        $sql = "update {$table} set" ;
        for ($i = 0; $i < ($size); $i++) 
        {   
            $sql = $sql . ' ' .(array_keys($parameters)[$i] ).'='. "'". (array_values($parameters)[$i]) . "'";
            if($i < $size-1)
                $sql = $sql . ', ';

        }     
        
        $sql = $sql . " where id='{$id}'";
        
        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
 
        } catch(Exception $e){

           $e->getMessage();
        }   
    }

    public function delete($table,$id)
    {
        $sql = "delete from {$table} where id = " .$id;
        try{
           $stmt = $this->pdo->prepare($sql);

           $stmt->execute();
           return 1;

        } catch(Exception $e){

          $e->getMessage();
       }
    }

    public function read($table, $id)
    {
        $sql = "select * from " . $table . " where id =" . $id;

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
  
        } catch(Exception $e) {
  
            $e->getMessage();
        }     
    }
}
