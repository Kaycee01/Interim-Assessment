<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="col-lg-3 sidebar">
            <div class="right">&nbsp;<a class="logout wl" href="logout.php">Logout</a></div>
            <?php
                if(isset($_SESSION['username'])){
                    echo "<div class='wl'>Welcome, <b>".$_SESSION['username']."</b>.</div>"; 
                }else{
                    header('location: home.php');
                }
            ?>
            <br/><br/>
            <ul>
                <li>
                    <h2>Dashboard</h2>
                </li>
                <li>
                    <a href="A_Student.php">Add Student</a>
                </li>
                <li>
                    <a href="E_Student.php">Edit Student</a>
                </li>
                <li>
                    <a href="D_Student.php">Delete Student</a>
                </li>
                <li>
                    <a href="V_Student.php">View Student</a>
                </li>
            </ul>
        </div>
    </body>
</html>