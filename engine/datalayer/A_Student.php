 <?php
    session_start();
    if(isset($_SESSION['username'])){
        $id = $surname = $first_name = $othernames = $gender = $cellnumber = $dob = $email = $campus = $image = $course = $hallofresidence = $yearofentrance = $yearofcompletion = $gaudiansnumber = '';

        $idrequired = $snrequired = $fnrequired = $onrequired = $grequired = $pnrequired = $dobrequired = $erequired = $crequired = $prequired = $prrequired = $rrequired = $endrequired = $exdrequired = $hrequired = '';

        try{
            require 'database.php';
            $conn = new PDO("mysql:host=$severname; dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(empty($_POST["id"])){
                $idrequired = "This field is required";
            }else{
                $id = overlook($_POST["id"]);
            }

            if(empty($_POST["surname"])){
                $snrequired = "This field is required";
            }else{
                $surname = overlook($_POST["surname"]);
            }

            if(empty($_POST["first_name"])){
                $fnrequired = "This field is required";
            }else{
                $first_name = overlook($_POST["first_name"]);
            }

            if(empty($_POST["othernames"])){
                $onrequired = "";
                $othernames = "";
            }else{
                $othernames = overlook($_POST["othernames"]);
            }

            if(empty($_POST["gender"])){
                $grequired = "This field is required";
            }else{
                $gender = overlook($_POST["gender"]);
            }

            if(empty($_POST["cellnumber"])){
                $pnrequired = "This field is required";
            }else{
                $cellnumber = overlook($_POST["cellnumber"]);
            }

            if(empty($_POST["dob"])){
                $dobrequired = "This field is required";
            }else{
                $dob = overlook($_POST["dob"]);
            }

            if(empty($_POST["email"])){
                $erequired = "This field is required";
            }else{
                $email = overlook($_POST["email"]);
            }

            if(empty($_POST["campus"])){
                $crequired = "";
                $campus = "";
            }else{
                $campus = overlook($_POST["campus"]);
            }

            if(empty($_POST["image"])){
                $prequired = "";
                $image = "";
            }else{
                $image = overlook($_POST["image"]);
            }

            if(empty($_POST["course"])){
                $prrequired = "This field is required";
            }else{
                $course = overlook($_POST["course"]);
            }

            if(empty($_POST["hallofresidence"])){
                $rrequired = "This field is required";
            }else{
                $hallofresidence = overlook($_POST["hallofresidence"]);
            }

            if(empty($_POST["yearofentrance"])){
                $endrequired = "This field is required";
            }else{
                $yearofentrance = overlook($_POST["yearofentrance"]);
            }

            if(empty($_POST["yearofcompletion"])){
                $exdrequired = "This field is required";
            }else{
                $yearofcompletion = overlook($_POST["yearofcompletion"]);
            }

            if(empty($_POST["gaudiansnumber"])){
                $hrequired = "";
                $gaudiansnumber = "";
            }else{
                $gaudiansnumber = overlook($_POST["gaudiansnumber"]);
            }

        
            
            if(isset($_POST['submit'])){
                if($idrequired || $snrequired || $fnrequired || $grequired || $pnrequired || $dobrequired || $erequired || $prrequired || $rrequired || $endrequired || $exdrequired){
                    $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
                }else{
                    $sql = "INSERT INTO tbl_student(id, surname, first_name, othernames, gender, cellnumber, dob, email, campus, image, course, hallofresidence, yearofentrance, yearofcompletion, gaudiansnumber) VALUES ('$id', '$surname', '$first_name', '$othernames', '$gender', '$cellnumber', '$dob', '$email', '$campus', '$image', '$course', '$hallofresidence', '$yearofentrance', '$yearofcompletion', '$gaudiansnumber')";
                    $conn->exec($sql);
                    $reply = '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
                }
            }            
        }catch(PDOException $e){
            echo $sql . "<br/>" . $e->getMessage();
        }
    }else{
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>        
        <div class="col-lg-9 right wksp">
            <h3 class="center">Fill The Form To Add Student Data.</h3>
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="id"><b>ID:&nbsp;</b><span class="red">*<?php echo $idrequired;?></span></label>
                        <input value="<?php echo $id; ?>" type="text" name="id" class="col-lg-3 form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="surname"><b>Surname:&nbsp;</b><span class="red">*<?php echo $snrequired;?></span></label>
                        <input value="<?php echo $surname;?>" type="text" name="surname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="first_name"><b>First Name:&nbsp;</b><span class="red">*<?php echo $fnrequired;?></span></label>
                        <input value="<?php echo $first_name; ?>" type="text" name="first_name" class="form-control">
                    </div>
                    <div class="col">
                        <label for="othernamess"><b>Othernames:&nbsp;</b><span class="red"><?php echo $onrequired;?></span></label>
                        <input value="<?php echo $othernames; ?>" type="text" name="othernames" class="form-control">
                    </div>
                </div><br/>                
                
                <div class="form-row">
                    <div class="col">
                        <label for="gender"><b>Gender:&nbsp;</b><span class="red">*<?php echo $grequired;?></span></label><br/>
                        <input value="<?php echo $gender; ?>" type="text" name="gender" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="cellnumber"><b>Phone Number:&nbsp;</b><span class="red">*<?php echo $pnrequired;?></span></label>
                        <input value="<?php echo $cellnumber; ?>" type="text"  name="cellnumber" class="form-control">
                    </div>
                        
                    <div class="col">
                        <label for="dob"><b>Date of Birth:&nbsp;</b><span class="red">*<?php echo $dobrequired;?></span></label>
                        <input value="<?php echo $dob; ?>" type="date" name="dob" class="form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="email"><b>Email:&nbsp;</b><span class="red">*<?php echo $erequired;?></span></label>
                        <input value="<?php echo $email; ?>" type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="campus"><b>Campus:&nbsp;</b><span class="red"><?php echo $crequired;?></span></label>
                        <input value="<?php echo $campus; ?>" type="text" name="campus" class="form-control">
                    </div>
                    
                    <div class="col custom-file">
                        <label for="image"><b>Profile Image:&nbsp;</b><span class="red"><?php echo $prequired;?></span></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="course"><b>Course:&nbsp;</b><span class="red">*<?php echo $prrequired;?></span></label>
                        <input value="<?php echo $course; ?>" type="text" name="course" class="form-control">
                    </div>

                    <div class="col">
                        <label for="hallofresidence"><b>Hall of residence:&nbsp;</b><span class="red">*<?php echo $rrequired;?></span></label>
                        <input value="<?php echo $hallofresidence; ?>" type="text" name="hallofresidence" class="form-control">
                    </div>

                    <div class="col">
                        <label for="yearofentrance"><b>Year of Entrance:&nbsp;</b><span class="red">*<?php echo $endrequired;?></span></label>
                        <input value="<?php echo $yearofentrance; ?>" type="text" name="yearofentrance" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="yearofcompletion"><b>Year of Completion:&nbsp;</b><span class="red">*<?php echo $exdrequired;?></span></label>
                        <input value="<?php echo $yearofcompletion; ?>" type="text" name="yearofcompletion" class="form-control">
                    </div>

                    <div class="col">
                        <label for="gaudiansnumber"><b>Gaurdians Number:&nbsp;</b><span class="red"><?php echo $hrequired;?></span></label>
                        <input value="<?php echo $gaudiansnumber; ?>" type="text" name="gaudiansnumber" class="form-control">
                    </div>

                
                </div><br/>

                <input type="submit" name="submit" value="Add To Database" class="btn btn-primary right">
            </form>        
        </div>
        <?php
            include 'side.php';
        ?>
        
    </body>
</html>