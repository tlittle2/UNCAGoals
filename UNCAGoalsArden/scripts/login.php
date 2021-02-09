<?php

include("dbinfo.inc.php");

$con = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
        
}
    
    $password = $_POST['user_pass'];
   
    $query = "SELECT * FROM users WHERE password= '$password'";  
    
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) == 1){
        //echo "Correct password";
        session_start();
        $_SESSION['userlogin'] = 1;
        #$value= $_SESSION['userlogin'];
        #echo $_SESSION['userlogin'];
        #echo "<script>alert('$value')</script>";
        echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/BulldogGoals.php"</script>';
        exit;
    }else{
        session_unset();
        session_destroy();
        echo '<script>alert("Incorrect Password")</script>';
        echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/loginForm.html"</script>';

    }

?>