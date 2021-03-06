<?php
require_once 'token.php';
session_start();

if(!isset($_SESSION['id'])){
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Double Submit Cookie Pattern - Result</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="style.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">

                <div class="fadeIn first">
                <img src="csrf.jpg" id="icon" alt="User Icon" /><br>
                <h3><b>DOUBLE SUBMIT COOKIE PATTERN</h3>
                </div>
                <?php

                    /*  compareTokens() method of the token class is called which will compare the recieved token in the body with the 
                        token received in the cookie
                    */ 
                    if(token::compareTokens($_POST['token'], $_COOKIE['tokenCookie'])){
                        echo "<h3><b><font color='green'> Valid request. Status Updated Successfully! : <br>".$_POST['status']."</h3>";		
                    }
                    else{
                       echo "<h3><b><font color='red'> Invalid request. CSRF tokens do not match! </h3>";
                    }
                ?>
                <br><br>

                <div id="formFooter">
                <a href="logout.php"><input type="button" class="fadeIn fourth" name="logout" value="Log out"></a>
                </div>
                
            </div>
        </div>
    </body>
</html>