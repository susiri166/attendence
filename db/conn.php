<?php 
    //devlopment connection
    //$host="localhost";
    //$db="attendence_db";
    ///$user="root";
    //$pass="";
    
    //remote database connection
    $host="remotemysql.com";
    $db="VqOJpQEYAz";
    $user="VqOJpQEYAz";
    $pass="MVmVf3sM5u";

    $dsn="mysql:host=$host;dbname=$db";

    try {
        $pdo=new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    
    require_once 'crud.php';
    $crud=new crud($pdo);
?>