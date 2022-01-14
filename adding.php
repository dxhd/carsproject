<!DOCTYPE HTML>
<html lang="eng">
    <head>
        <title>CarsProject - MainPage</title>
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
            
            function constraint() {
                const checked = document.querySelector('input[name = "carType"]:checked');
                const manufacturer = document.getElementById('manufacturer');
                const body = document.getElementById('body');
                const color = document.getElementById('color');
                const engineType = document.getElementById('engineType');
                const enginePower = document.getElementById('enginePower');
                const engineMass = document.getElementById('engineMass') ;  
                switch (checked.value) {
                    case "Passeger car":
                        manufacturer.disabled = false;
                        body.disabled = false;
                        color.disabled = false;
                        engineType.disabled = false;
                        engineMass.disabled = false;
                        enginePower.disabled = false;
                        break;
                    case "Truck":
                        manufacturer.disabled = false;
                        body.disabled = true;
                        color.disabled = false;
                        engineType.disabled = false;
                        engineMass.disabled = false;
                        enginePower.disabled = false;
                        break;
                    case "Motorcycle":
                        manufacturer.disabled = false;
                        body.disabled = true;
                        color.disabled = false;
                        engineType.disabled = false;
                        engineMass.disabled = false;
                        enginePower.disabled = false;
                        break;
                    case "Bicycle":
                        manufacturer.disabled = true;
                        body.disabled = true;
                        color.disabled = false;
                        engineType.disabled = true;
                        engineMass.disabled = true;
                        enginePower.disabled = true;
                        break;
                }
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
<!-- форма авторизации -->
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
            <h1>Adding vehicle</h1>
            <div class='adding'>
                <form method="post" action="/php/add-car.php">
                <table class='adding-table'>
                    <tr>
                        <td>
                            <h2>Type</h2>
                            <div class="form_radio_group">
                                <div class="form_radio_group-item" onchange="constraint()">
                                    <input id="radio-1" type="radio" name="carType" value="PassegerCar" checked>
                                    <label for="radio-1">Passeger car</label>
                                </div>
                                <div class="form_radio_group-item" onchange="constraint()">
                                    <input id="radio-2" type="radio" name="carType" value="Truck">
                                    <label for="radio-2">Truck</label>
                                </div>
                                <div class="form_radio_group-item" onchange="constraint()">
                                    <input id="radio-3" type="radio" name="carType" value="Motorcycle">
                                    <label for="radio-3">Motorcycle</label>
                                </div>
                                <div class="form_radio_group-item" onchange="constraint()">
                                    <input id="radio-4" type="radio" name="carType" value="Bicycle">
                                    <label for="radio-4">Bicycle</label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h2>Manufacturer</h2>
                            <div>
                                <select id='manufacturer' name='carManufacturer'>
                                    <option value="Audi">Audi</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Porsche">Porsche</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <h2>Body</h2>
                            <div>
                                <select id='body' name='carBody'>
                                    <option value="SportCar">SportCar</option>
                                    <option value="Coupe">Coupe</option>
                                    <option value="Sedan">Sedan</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <h2>Color</h2>
                            <div>
                                <select id='color' name='carColor'>
                                    <option value="White">White</option>
                                    <option value="Red">Red</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Blue">Blue</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <h2>Engine</h2>
                            <div id='choosing-engine-options'>
                                    <label>Type of engine</label>
                                    <select id='engineType' name='engineType'>
                                        <option value="Electric">Electric</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="ICE">ICE</option>
                                    </select>
                                    <label>Power</label>
                                    <input id='enginePower' type='number' name='enginePower' placeholder="222" required>
                                    <label>Mass</label>
                                    <input id='engineMass' type='number' name='engineMass' placeholder="188" required>
                            </div>
                        </td>
                        <td id='submit-adding'>
                            <input type="submit" value='Add' class='button'>
                        </td>


                    </tr>

                </table>
                </form>
            </div>
        </div>
        <footer>
            <p>&nbsp;&nbsp;Support: support@email.com</p>
            <p>&nbsp;&nbsp;CarsProject</p>
            <a href="https://www.instagram.com/dmitriy_787878/" id="inst" align="left" target="_blank"> &nbsp;&nbsp;
                <img height=40px src="images/instagram.png">
            </a> 
        </footer>
    </body> 