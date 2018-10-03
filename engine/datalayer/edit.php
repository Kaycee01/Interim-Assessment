<?php
    if(isset($_SESSION['username'])){
        $id = $surname = $first_name = $othernames = $gender = $cellnumber = $dob = $email = $campus = $image = $course = $hallofresidence = $yearofentry = $yearofcompletion = $gaudiansnumber = $weight = '';

        $idrequired = $snrequired = $fnrequired = $onrequired = $grequired = $pnrequired = $dobrequired = $erequired = $crequired = $prequired = $prrequired = $rrequired = $endrequired = $exdrequired = $hrequired = $wrequired = '';
        
        $notfound = '';
        $notfound = '<div class="alert alert-danger center" role="alert">ID CANNOT BE FOUND!</div>';

        try{
            if(empty($_POST["id"])){
                $idrequired = "This field is required";
            }else{
                $id = test_input($_POST["id"]);
            }

            if(empty($_POST["surname"])){
                $snrequired = "This field is required";
            }else{
                $surname = test_input($_POST["surname"]);
            }

            if(empty($_POST["first_name"])){
                $fnrequired = "This field is required";
            }else{
                $first_name = test_input($_POST["first_name"]);
            }

            if(empty($_POST["othernames"])){
                $onrequired = "";
                $othernames = "";
            }else{
                $othernames = test_input($_POST["othernames"]);
            }

            if(empty($_POST["gender"])){
                $grequired = "This field is required";
            }else{
                $gender = test_input($_POST["gender"]);
            }

            if(empty($_POST["cellnumber"])){
                $pnrequired = "This field is required";
            }else{
                $cellnumber = test_input($_POST["cellnumber"]);
            }

            if(empty($_POST["dob"])){
                $dobrequired = "This field is required";
            }else{
                $dob = test_input($_POST["dob"]);
            }

            if(empty($_POST["email"])){
                $erequired = "This field is required";
            }else{
                $email = test_input($_POST["email"]);
            }

            if(empty($_POST["campus"])){
                $crequired = "";
                $campus = "";
            }else{
                $campus = test_input($_POST["campus"]);
            }

            if(empty($_POST["image"])){
                $prequired = "";
                $image = "";
            }else{
                $image = test_input($_POST["image"]);
            }

            if(empty($_POST["course"])){
                $prrequired = "This field is required";
            }else{
                $course = test_input($_POST["course"]);
            }

            if(empty($_POST["hallofresidence"])){
                $rrequired = "This field is required";
            }else{
                $hallofresidence = test_input($_POST["hallofresidence"]);
            }

            if(empty($_POST["yearofentry"])){
                $endrequired = "This field is required";
            }else{
                $yearofentry = test_input($_POST["yearofentry"]);
            }

            if(empty($_POST["yearofcompletion"])){
                $exdrequired = "This field is required";
            }else{
                $yearofcompletion = test_input($_POST["yearofcompletion"]);
            }

            if(empty($_POST["gaudiansnumber"])){
                $hrequired = "";
                $gaudiansnumber = "";
            }else{
                $gaudiansnumber = test_input($_POST["gaudiansnumber"]);
            }

           
            $search_id = '';
            $search_id = escape($_GET['id']);

            $sql = "SELECT * FROM tbl_student WHERE id=:search_id";
            
            $statement = $conn->prepare($sql);
            $statement->bindParam(':search_id', $search_id, PDO::PARAM_STR);
            $statement->execute();

            $results = $statement->fetchAll();
            

            if(isset($_POST['submit'])){
                if($idrequired || $snrequired || $fnrequired || $grequired || $pnrequired || $dobrequired || $erequired || $prrequired || $rrequired || $endrequired || $exdrequired){
                    $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
                }else{
                    $sql = "INSERT INTO tbl_student(id, surname, first_name, othernames, gender, cellnumber, dob, email, campus, image, course, hallofresidence, yearofentry, yearofcompletion, gaudiansnumber, weight) VALUES ('$id', '$surname', '$first_name', '$othernames', '$gender', '$cellnumber', '$dob', '$email', '$campus', '$image', '$course', '$hallofresidence', '$yearofentry', '$yearofcompletion', '$gaudiansnumber', '$weight')";
                    $conn->exec($sql);
                    $reply = '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
                }
            }            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        header('location: home.php');
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
        <div class="col-lg-12 right">
            <?php foreach($results as $result){ if($results && $statement->rowCount()>0){ ?>
            <h3 class="center">Edit Student Data.</h3>
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="id"><b>ID:&nbsp;</b></label>
                        <input value="<?php echo escape($result["id"]); ?>" type="text" name="id" class="col-lg-3 form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="surname"><b>Surname:&nbsp;</b></label>
                        <input value="<?php echo escape($result["surname"]); ?>" type="text" name="surname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="first_name"><b>First Name:&nbsp;</b></label>
                        <input value="<?php echo escape($result["first_name"]); ?>" type="text" name="first_name" class="form-control">
                    </div>
                    <div class="col">
                        <label for="othernamess"><b>Othernames:&nbsp;</b></label>
                        <input value="<?php echo escape($result["othernames"]); ?>" type="text" name="othernames" class="form-control">
                    </div>
                </div><br/>                
                
                <div class="form-row">
                    <div class="col">
                        <label for="gender"><b>Gender:&nbsp;</b></label>
                        <input value="<?php echo escape($result["gender"]); ?>" type="text" name="gender" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="cellnumber"><b>Phone Number:&nbsp;</b></label>
                        <input value="<?php echo escape($result["cellnumber"]); ?>" type="text"  name="cellnumber" class="form-control">
                    </div>
                        
                    <div class="col">
                        <label for="dob"><b>Date of Birth:&nbsp;</b></label>
                        <input value="<?php echo escape($result["DOB"]); ?>" type="text" name="dob" class="form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="email"><b>Email:&nbsp;</b></label>
                        <input value="<?php echo escape($result["email"]); ?>" type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="campus"><b>Campus:&nbsp;</b></label>
                        <input value="<?php echo escape($result["campus"]); ?>" type="text" name="campus" class="form-control">
                    </div>
                    
                    <div class="col custom-file">
                        <label for="image"><b>Profile Image:&nbsp;</b></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="course"><b>Course:&nbsp;</b></label>
                        <input value="<?php echo escape($result["course"]); ?>" type="text" name="course" class="form-control">
                    </div>

                    <div class="col">
                        <label for="hallofresidence"><b>Hall of Residence:&nbsp;</b></label>
                        <input value="<?php echo escape($result["hallofresidence"]); ?>" type="text" name="hallofresidence" class="form-control">
                    </div>

                    <div class="col">
                        <label for="yearofentrance"><b>Year of Entry:&nbsp;</b></label>
                        <input value="<?php echo escape($result["yearofentrance"]); ?>" type="text" name="yearofentrance" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="yearofcompletion"><b>Year of Exit:&nbsp;</b></label>
                        <input value="<?php echo escape($result["yearofcompletion"]); ?>" type="text" name="yearofcompletion" class="form-control">
                    </div>

                    <div class="col">
                        <label for="gaudiansnumber"><b>Gaurdians Number:&nbsp;</b></label>
                        <input value="<?php echo escape($result["gaudiansnumber"]); ?>" type="text" name="gaudiansnumber" class="form-control">
                    </div>

                </div><br/>

                <input type="submit" name="submit" value="Add To Database" class="btn btn-primary right">
            </form>
            <?php }else{ echo $notfound; } } ?>
        </div>
    </body>
</html>