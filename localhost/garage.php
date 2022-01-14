<!DOCTYPE HTML>
<html lang="eng">
    <head>
        <title>CarsProject - Garage</title>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/garage.css">
        
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
    <body class="bg-img" background="images/background2.jpg">
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
                <form action="/php/reg.php" method="post" class="form-container">
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
                <form action="/php/login.php" method="post" class="form-container">
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
            <h1>Your garage</h1>
        <!-- В таблице должны быть изображения автомобилей и их характеристики -->  
            <?php
                if($_COOKIE['user'] == ''):
            ?>
            <?php else: ?>
            <?php
                $garage = $_COOKIE['garage'];
                $first = ""; $second = ""; $third = ""; $fourth = ""; $fivth = "";
                if(strpos($garage, "#2")){
                    $two = strpos($garage, "#2");
                    $first = substr($garage, 0, $two - 1);               
                    $garage = substr($garage, $two);
                    $first = explode(" ", $first);  
                    if(strpos($garage, "#3")){
                        $three = strpos($garage, "#3");
                        $second = substr($garage, 0, $three - 1);
                        $garage = substr($garage, $three);
                        $second = explode(" ", $second);
                        if(strpos($garage, "#4")){
                            $four = strpos($garage, "#4");
                            $third = substr($garage, 0, $four - 1);
                            $garage = substr($garage, $four);
                            $third = explode(" ", $third); 
                            if(strpos($garage, "#5")){
                                $five = strpos($garage, "#5");
                                $fourth = substr($garage, 0, $five - 1);
                                $garage = substr($garage, $five);
                                $fivth = $garage;
                                $fourth = explode(" ", $fourth);
                                $fivth = explode(" ", $fivth);
                            }
                            else {
                                $fourth = $garage;
                                $fourth = explode(" ", $fourth);
                            }     
                        }
                        else {
                            $third = $garage;
                            $third = explode(" ", $third);
                        }   
                    }
                    else {
                        $second = $garage;
                        $second = explode(" ", $second);
                    }
                }
                else {
                    $first = $garage;
                    
                    $first = explode(" ", $first);
                }
            ?>
            <table class="garage">
                <tr>
                    <td class="glass">
                        <div id='first-car'>
                            <?php if($first[0]): ?>
                            <img src="images/<?=$first[1].$first[4]?>.png"> 
<!--                            <p class='car-brand'>Lotus</p>-->
                            <p><?=$first[1]." ".$first[2]?></p>
                            <p><?=$first[3]." ".$first[4]?></p>
                            <p><?=$first[5]?></p>
                            <p><?=$first[6]?></p>
                            <p><?=$first[7]?></p>
                            <?php else: ?>
                            <a  class="add-car-link" href="adding.php">Add car</a>
                            <?php endif;?>
                        </div>
                    </td> 
                    <td class="glass">
                        <div id='second-car'>
                            <?php if($second): ?>
                            <img src="images/<?=$second[1].$second[4]?>.png"> 
<!--                            <p class='car-brand'>Lotus</p>-->
                            <p><?=$second[1]." ".$second[2]?></p>
                            <p><?=$second[3]." ".$second[4]?></p>
                            <p><?=$second[5]?></p>
                            <p><?=$second[6]?></p>
                            <p><?=$second[7]?></p>
                            <?php else: ?>
                            <a class="add-car-link" href="adding.php">Add car</a>
                            <?php endif;?>
                        </div>
                    </td>
                    <td class="glass">
                        <div id='third-car'>
                            <?php if($third): ?>
                            <img src="images/<?=$third[1].$third[4]?>.png"> 
<!--                            <p class='car-brand'>Lotus</p>-->
                            <p><?=$third[1]." ".$third[2]?></p>
                            <p><?=$third[3]." ".$third[4]?></p>
                            <p><?=$third[5]?></p>
                            <p><?=$third[6]?></p>
                            <p><?=$third[7]?></p>
                            <?php else: ?>
                            <a  class="add-car-link" href="adding.php">Add car</a>
                            <?php endif;?>
                        </div>
                    </td> 
                    <td class="glass">
                        <div id='fourth-car'>
                            <?php if($fourth): ?>
                            <img src="images/<?=$fourth[1].$fourth[4]?>.png"> 
<!--                            <p class='car-brand'>Lotus</p>-->
                            <p><?=$fourth[1]." ".$fourth[2]?></p>
                            <p><?=$fourth[3]." ".$fourth[4]?></p>
                            <p><?=$fourth[5]?></p>
                            <p><?=$fourth[6]?></p>
                            <p><?=$fourth[7]?></p>
                            <?php else: ?>
                            <a  class="add-car-link" href="adding.php">Add car</a>
                            <?php endif;?>
                        </div>
                    </td> 
                    <td class="glass">
                        <div id='fifth-car'>
                            <?php if($fivth): ?>
                            <img src="images/<?=$fivth[1].$fivth[4]?>.png"> 
<!--                            <p class='car-brand'>Lotus</p>-->
                            <p><?=$fivth[1]." ".$fivth[2]?></p>
                            <p><?=$fivth[3]." ".$fivth[4]?></p>
                            <p><?=$fivth[5]?></p>
                            <p><?=$fivth[6]?></p>
                            <p><?=$fivth[7]?></p>
                            <?php else: ?>
                            <a class="add-car-link"  href="adding.php">Add car</a>
                            <?php endif;?>
                        </div>
                    </td> 
                </tr>
            </table>
            
            
            <?php endif;?>
        </div>
        <footer>
            <p>&nbsp;&nbsp;Support: support@email.com</p>
            <p>&nbsp;&nbsp;CarsProject</p>
            <a href="https://www.instagram.com/dmitriy_787878/" id="inst" align="left" target="_blank"> &nbsp;&nbsp;
                <img height=40px src="images/instagram.png">
            </a> 
        </footer>
    </body> 