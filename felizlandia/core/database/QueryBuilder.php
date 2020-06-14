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

           die("erro");
     }
         
    }
    public function edit($table,$parameters,$id)
    {  
     
        $tamanho = count(array_keys($parameters))-1;
        $cont = 0;
        $sql = "update {$table} set " ;
        for ($i = 0; $i <=($tamanho); $i++) 
        {
            if(!((array_values($parameters)[$i]) == ""))
            {
                $cont++;
               if($cont>1)
                $sql = $sql . ',';
                
                $sql = $sql . (array_keys($parameters)[$i] ).'='. "'". (array_values($parameters)[$i]). "'" ;
            
            } 
        }      
        
       $sql = $sql . " where id='{$id}'";
        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
 
        }catch(Exception $e){

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
 
        }catch(Exception $e){

           $e->getMessage();
     }
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
