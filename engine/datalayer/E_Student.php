<?php
    session_start();
    if($_SESSION['username']){
        if(isset($_GET['search'])){
            try{
                require 'database.php';
                $conn = new PDO("mysql:host=$severname; dbname=$db", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "SELECT * from tbl_studentinfo WHERE id=:id";
                
                $id = $_GET['id'];

                $statement = $conn->prepare($sql);
                $statement->bindParam(':location', $id, PDO::PARAM_STR);
                $statement->execute();

                $result = $statement->fetchAll();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }else{
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>        
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>                
        <div class="col-lg-9 right">
            <?php if(!isset($_GET['id'])){ ?>            
                <div class="center display-4">Enter ID to search for Student.</div><br/>
                <form action="#" method="get" class="col-lg-3">
                    <label for="search"><b>ID:&nbsp;</b></label>
                    <input placeholder="Search" name="id" type="text" class="form-control"><br/>
                    <input type="submit" name="search" value="Search" class="btn btn-primary right">
                </form>
            <?php }else{ include'edit.php'; } ?>
                
        </div>
        <?php include 'side.php'; ?>
    </body>
</html>