session_start();
$_SESSION["email"] = $email;
$_SESSION["password"] = $password; 
header("Location: profile.php");
