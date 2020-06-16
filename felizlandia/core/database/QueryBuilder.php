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


    public function selectAllCategoria($table)
    {
        
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
      
    }

    public function insert($table, $parameters)
    {
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
            //
        }
    }
         
    public function edit()
    {
      
         
    }
    public function delete()
    {
      
         
    }

    public function read(){


    }




    // funcoes categorias!

    public function readCategoria($table, $ID)
    {
        $sql = sprintf("SELECT * FROM %s WHERE ID = '%s' ", 
        $table,  
        $ID
       );

       try{

           $statement = $this->pdo->prepare($sql);

           $statement->execute();

           $categoria = $statement->fetchAll(PDO::FETCH_CLASS); 


           return $categoria;

       } catch (Exception $e) {
           die($e->getMessage());
       }

         
    }

    public function deleteCategoria($table, $ID)
    {
        $sql = sprintf("DELETE FROM %s WHERE ID = '%s' ", 
        $table,  
        $ID
        
       );


       try{

           $statement = $this->pdo->prepare($sql);

           $statement->execute();


       } catch (Exception $e) {
           die($e->getMessage());
       }

         
    }


    public function editCategoria($table, $parameters, $ID){

        $sql = "UPDATE $table SET categoria = '$parameters' WHERE ID = $ID";
    
       // die(var_dump($sql));
    
        try{    
    
            $statement = $this->pdo->prepare($sql);
    
            $statement->execute();
    
    
        } catch (Exception $e) {
            die($e->getMessage());
        }
       }
}
