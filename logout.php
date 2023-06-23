<?php

session_start();
if(isset($_SESSION['logined'])){
  session_unset();
}
echo ("<script LANGUAGE='JavaScript'>
window.alert('Logged out Successfully');
window.location.href='login-form.php';
</script>");
?>