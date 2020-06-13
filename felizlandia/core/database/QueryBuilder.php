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
            return 1;
 
        }catch(Exception $e){

           $e->getMessage();
     }
         
    }
    public function edit($table,$parameters,$id)
    {  
        //tentando monstar uma query poque essa tem erro de sintaxe
        $tamanho = count(array_keys($parameters));
        $sql = "update {$table} set " ;

        for ($i = 0; $i <=($tamanho-1); $i++) 
        {
           $sql = $sql . (array_keys($parameters)[$i] ).'='. "'". (array_values($parameters)[$i]). "'" ;
           if($i!= $tamanho -1){
            $sql = $sql . ", ";
           }
        }
        /*   foreach( $parameters as $key => $value) {
                if($value != ''){
             $sql = $sql . "`" . $key . "`" . '=' . "'" . $value . "'". ' ';
                }*/
       $sql = $sql . " where id='{$id}'";


      // $sql = sprintf('update %s set (%s) values(%s) where id = (%s)', $table, implode(", ", array_keys($parameters)),
       // "'" . implode("', '", array_values($parameters)), $id  . "");
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
