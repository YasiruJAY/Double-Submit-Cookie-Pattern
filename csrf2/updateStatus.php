<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Double Submit Cookie Pattern - Update Status</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="style.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Javascript to obtain the CSRF token from the cookie add it to the hidden input field -->
        <script>

            $(document).ready(function(){
	
            var token = "";
            var decodedCookie = decodeURIComponent(document.cookie);
            var allCookies = decodedCookie.split(';');
            var tokenOnly = decodedCookie.split(';')[2];
            
            if(tokenOnly.split('=')[0] = "tokenCookie" ){
                token = tokenOnly.split('tokenCookie=')[1];
                document.getElementById("token_to_be_added").setAttribute('value', token) ;
            }
            });
            
        </script>

    </head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
  
                <div class="fadeIn first">
                <img src="csrf.jpg" id="icon" alt="User Icon" /><br>
                <h3><b>DOUBLE SUBMIT COOKIE PATTERN</h3>
                </div>

                <br><h4><b>Write a Status</h4>
                <form action="result.php" method="POST">
                <input type="text" id="status" class="fadeIn second" name="status" placeholder="write something...">
                <input type="hidden" name="token" value="" id="token_to_be_added"/>   <!-- token will be added to this field-->
                <br><br>

                <div id="formFooter">
                <input type="submit" class="fadeIn fourth" name="submit" value="Submit!">
                </form>
                
                <a href="logout.php"><input type="button" class="fadeIn fourth" name="logout" value="Log out"></a>

                </div>
            </div>
        </div>
    </body>
</html>