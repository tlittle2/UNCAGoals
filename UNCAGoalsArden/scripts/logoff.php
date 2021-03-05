<?php
session_set_cookie_params(0);
session_start();
#session_unset();

if(!isset($_SESSION['userlogin'])){
    session_destroy();
    echo "Session is destroyed";
    echo $_SESSION['userlogin'];
    
}else{
    $_SESSION = array(); // Clear the variables.
    session_destroy(); // Destroy the session itself.
    setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
}
echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/loginForm.html"</script>"';

#echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/BulldogGoals.php"</script>';
#echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/loginForm.html"</script>';





?>