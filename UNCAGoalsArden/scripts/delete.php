
<?php
//set our connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
    
}



//find the thing we want to remove
$id= $_GET['id'];




//perform the query
$query= $con->prepare("DELETE FROM `uncagoals` WHERE id= ?");
$query->bind_param("s", $id);
$query->execute();



//Find a way to delete the row without redirecting a different page (or redirect to a different page)

//check to make sure the query worked
if(mysqli_errno($con)!= 0){
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
    
}else{
    echo "<script type= text/javascript> window.location= 'https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/BulldogGoals.php'</script>";
    //echo "You just deleted a record";
    //echo "SQL is...<br>";
    //echo $query;
    //echo "<br> Rows affected: ";
    //echo mysqli_affected_rows($con);
}



mysqli_close($con);

?>
