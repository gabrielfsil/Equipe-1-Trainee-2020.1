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

    public function read($table,$id_name, $id)
    {
        $sql = "select * from " . $table . " where {$id_name} =" . $id;

        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        }catch(Exception $e){

        $e->getMessage();
        }
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

    public function edit($table, $parameters,$id_name, $id)
    {
        $size = count(array_keys($parameters));
        $sql = "update {$table} set" ;
        for ($i = 0; $i < ($size); $i++) 
        {   
            $sql = $sql . ' ' .(array_keys($parameters)[$i] ).'='. "'". (array_values($parameters)[$i]) . "'";
            if($i < $size-1)
                $sql = $sql . ', ';

        }     
        
        $sql = $sql . " where {$id_name} ='{$id}'";
        
        
        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
 
        } catch(Exception $e){

           $e->getMessage();
        }   
    }

    public function delete($table,$id_name,$id)//passar nome do id e o conteudo
    {
        $sql = "delete from {$table} where {$id_name} = " . $id;
        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
 
        }catch(Exception $e){

           $e->getMessage();
        }
    }

    public function checkExistence($table, $parameters=[], $id_name){
        //verifica se ja existe uma ocorrencia na base de dados
        //serve para criação e edição, se for criação não passamos id
        //se for edição passamos o id no vetor de parametros
        $sql = "select * from {$table} where {$parameters['campo']} = '{$parameters['conteudo']}'";
        if(array_key_exists('id',$parameters))//aqui verifica se foi passado um id ou não pra não dar erro de sintaxe
        {
            $sql = $sql . " and {$id_name} <> '{$parameters['id']}'";
            //como ao editar a pessoa pode não modificar os campos e enviá-los como antes
            //então ela vai colocar um valor que já existe, por isso testamos se o id
            //é de quem pertence esse valor ou não
        }
        $buscar = $this->pdo->prepare($sql);
        $buscar->execute();
        $result= $buscar->fetchAll(PDO::FETCH_CLASS);
    
        if(count($result)!=0){
            return "erro";
        }
    }

    public function selectFromManyTables($action=[], $tables=[],$parameters, $id1, $id2)
    {
       $sql = sprintf('select %s ', implode(", ", array_keys($parameters)));
        
        $sql = $sql . sprintf('from %s ', implode(", ", array_values($tables)));

        $sql = $sql . "where {$id1} = {$id2}";

        if($action['metodo'] != 'all')
        {
            
            if($action['metodo']=='last'){
                    $sql = $sql . " ORDER BY {$action['orderbyfield']} {$action['direction']}";
            }
            $sql = $sql . " limit {$action['quantidade']}";
        }

       // die(var_dump($sql));
        try{
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        }catch(Exception $e){

        $e->getMessage();
        }

        
    }
}
