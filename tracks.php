<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>CarsProject - Garage</title>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        
        <script>
            function openRegisterForm() {
                closeForm();
                document.getElementById("register-form").style.display = "block";
                document.getElementById("btn-cancel").style.display = "block";   
                document.getElementById("autorization-login").style.borderBottom = "2px solid #7F7F7F";
                document.getElementById("autorization-register").style.borderBottom = "4px solid #7F7F7F";
            }
            function openLoginForm() {
                closeForm();
                document.getElementById("login-form").style.display = "block";
                document.getElementById("btn-cancel").style.display = "block";  
                document.getElementById("autorization-login").style.borderBottom = "4px solid #7F7F7F";
                document.getElementById("autorization-register").style.borderBottom = "2px solid #7F7F7F";
            }
            

            function closeForm() {
                document.getElementById("register-form").style.display = "none";
                document.getElementById("login-form").style.display = "none";
                document.getElementById("btn-cancel").style.display = "none";
            }
            
        </script>     
        
    </head>
    <body class="bg-img" background="images/background3.jpg">
        <header>
            <a href="index.php" id="logo" align="left">
                        <img height=119px src="images/logo.png">
                        CarsProject
            </a>
            <ul class="nav">
                <li><a class='button' href="adding.php">Add vehicle</a></li>
                <li><a class='button' href="tracks.php">Tracks</a></li>
                <li><a class='button' href="garage.php">My garage</a></li>
                <?php
                    if($_COOKIE['user'] == ''):
                ?>
                    <li><a class='button' id="login" onclick="openLoginForm()" ><img height=80px width=80px src="images/login-ico.png"></a></li>
                <?php else: ?>
                
                <li><a class='button' id="login" href="php/logout.php"><img height=80px width=80px src="images/logout-ico.png"></a></li>
                <?php endif;?>
            </ul>
        </header>
        <div class='content'>
            <button type="submit" id="btn-cancel" onclick="closeForm()">close</button>
            <div class="form-popup" id='register-form'>
                <form action="/register.php" class="form-container">
                    <div>
                        <ul id='autorization-header'>
                            <li id='autorization-login' onclick="openLoginForm()">Login</li>
                            <li id='autorization-register' onclick="openRegisterForm()">Register</li>
                        </ul>
                    </div>
                    
                    <label for="email"><b>E-mail</b></label>
                    <br>
                    <input type="text" placeholder="e-mail" name="email" required>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <br>
                    <input type="password" placeholder="********" name="psw" required>
                    <br>
                    <label for="cnfrmpsw"><b>Confirm password</b></label>
                    <br>
                    <input type="password" placeholder="********" name="cnfrmpsw" required>
                    <br>
                    <button type="submit" class="btn">Register</button>
                </form>
            </div>
            <div class="form-popup" id='login-form'>
                <form action="/login.php" class="form-container">
                    <div>
                        <ul id='autorization-header'>
                            <li id='autorization-login' onclick="openLoginForm()">Login</li>
                            <li id='autorization-register' onclick="openRegisterForm()">Register</li>
                        </ul>
                    </div>
                    
                    <label for="email"><b>E-mail</b></label>
                    <br>
                    <input type="text" placeholder="e-mail" name="email" required>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <br>
                    <input type="password" placeholder="********" name="psw" required>
                    <br>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
            <h1>Coming soon...</h1>
        
        </div>
        <footer>
            <p>&nbsp;&nbsp;Support: support@email.com</p>
            <p>&nbsp;&nbsp;CarsProject</p>
            <a href="https://www.instagram.com/dmitriy_787878/" id="inst" align="left" target="_blank"> &nbsp;&nbsp;
                <img height=40px src="images/instagram.png">
            </a> 
        </footer>
    </body> 