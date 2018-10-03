<?php
    session_start();
    try{
        if(!empty($_SESSION['username'])){
            require 'database.php';
            $conn = new PDO("mysql:host=$severname; dbname=$db", $username, $password);

            $query = "SELECT * FROM tbl_student";
            $table = $conn->prepare($query);
            $table->execute();

            $results = $table->fetchAll();
        }else{
            echo "<div class='red display-2'>YOU'RE NOT ALLOWED TO VIEW THIS PAGE</div>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Students</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>        
        <div class="col-lg-10 right">
            <div class="display-3 center">Student Database</div><br/>
            <div class="container">
                <?php if($results && $table->rowCount()>0){ ?>
                <table class="table">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col">Profile image</th>
                            <th scope="col">ID</th>
                            <th scope="col">Surname</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Other Names</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Email</th>
                            <th scope="col">Campus</th>
                            <th scope="col">Course</th>
                            <th scope="col">Hall of Residence</th>
                            <th scope="col">Year of Entrance</th>
                            <th scope="col">Year of Completion</th>
                            <th scope="col">Gaurdians Number</th>
                            <
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($results as $row){ ?>
                        <tr>
                            <th scope="col"><?php echo escape($row["image"]); ?></th>
                            <th scope="col"><?php echo escape($row["id"]); ?></th>
                            <th scope="col"><?php echo escape($row["surname"]); ?></th>
                            <th scope="col"><?php echo escape($row["first_name"]); ?></th>
                            <th scope="col"><?php echo escape($row["othernames"]); ?></th>
                            <th scope="col"><?php echo escape($row["gender"]); ?></th>
                            <th scope="col"><?php echo escape($row["cellnumber"]); ?></th>
                            <th scope="col"><?php echo escape($row["DOB"]); ?></th>
                            <th scope="col"><?php echo escape($row["email"]); ?></th>
                            <th scope="col"><?php echo escape($row["campus"]); ?></th>
                            <th scope="col"><?php echo escape($row["course"]); ?></th>
                            <th scope="col"><?php echo escape($row["hallofresidence"]); ?></th>
                            <th scope="col"><?php echo escape($row["yearofentrance"]); ?></th>
                            <th scope="col"><?php echo escape($row["yearofcompletion"]); ?></th>
                            <th scope="col"><?php echo escape($row["gaudiansnumber"]); ?></th>
                         </tr>   
                        <?php } ?>
                    </tbody>
                </table>        
                <?php }else { ?>
                    <div class="display-4">THERE ARE NO RESULTS TO BE DISPLAYED!</div>
                <?php } ?>
            </div>
        </div>
        <?php include 'side.php'; ?>
    </body>
</html>