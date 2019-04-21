<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $mln = strtoupper(uniqid('MLD'));
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = md5($password);
    $query = "INSERT INTO users (`mln`, `name`, `dob`, `gender`, `state`, `phone`, `email`, `password`) 
  			  VALUES('$mln' , '$name', '$dob', '$gender', '$state', '$phone','$email','$password')";

    mysqli_query($db, $query);

    $query_table = "CREATE TABLE `$mln` ( `sl` INT NOT NULL AUTO_INCREMENT , `symptoms` VARCHAR(255) NOT NULL , `diagnosis` VARCHAR(255) NOT NULL , `date` DATE NOT NULL , `dr` VARCHAR(255) NOT NULL , `trtmnt` VARCHAR(500) NOT NULL , `medicines` VARCHAR(200) NOT NULL , PRIMARY KEY (`sl`))";
    mysqli_query($db, $query_table);

    mkdir($mln, 0777);
    
    $mln_generated = "Registration Successful.<br>Your Medical Legacy Number is <b>" . $mln . "</b>.<br> Please note it down for future use. Proceed to <a href='userLogin.php'>Login</a>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register | MLD</title>
        <link rel="icon" href="favicon.ico" sizes="20x20" type="image/png">  
        <link rel="stylesheet" type="text/css" href="styling/dashboard.css">
        <link rel="stylesheet" type="text/css" href="styling/flexboxgrid.css">
        <link rel="stylesheet" type="text/css" href="styling/forms.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.typekit.net/sgr8dvc.css">
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Oswald|Raleway|Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    </head>
    <body style=" height:  100%; background-color: #f5f5f5; padding-bottom: 10px;">
        <div class="dashboard-navbar-light">
            <div class="dashboard-navbar-options-light nav-title" style="width: 100%;">
                <center>
                    <span>
                        <a href="index.php" style="float: left; padding-left: 50px; color: black">Medical Legacy Directory</a>
                    </span>
                    <span style="float: right;">
                        <a href="login.php" style="color:#252525"><i class="fas fa-sign-in-alt"></i></a>  
                    </span> 
                </center>
            </div>
        </div>
        <div>
            <div>
                <div class="col-lg-offset-1 col-lg-10 box" style="vertical-align: middle; padding: 20px">
                    <form action="register.php" class="content-section" method="POST">
                        <h1 style="font-size: 50px; ">REGISTER</h1>
<?php
if (isset($mln_generated)) {
    echo $mln_generated;
}
?>
                        <div class="row form-input-group">
                            <label style="float: left; vertical-align: middle;" class="col-lg-2">Name</label><input name="name" type="text" class="input-box col-lg-10">
                        </div>
                        <div class="row form-input-group">
                            <label style="float: left; vertical-align: middle;" class="col-lg-2">DOB</label><input name="dob" type="date" class="input-box col-lg-4">
                            <label style="text-align: center" class="col-lg-2">Gender</label>
                            <select name="gender" class="input-box col-lg-4">
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-input-group">
                            <div class="row">
                                <label style="float: left" class="col-lg-2">State</label>
                                <select name="state" class="input-box col-lg-4">
                                    <option value="">Select State</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Orissa">Orissa</option>
                                    <option value="Pondicherry">Pondicherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttaranchal">Uttaranchal</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                                <label style="text-align: center; vertical-align: middle;" class="col-lg-2">Phone</label><input name="phone" type="text" class="input-box col-lg-4">
                            </div>
                        </div>
                        <div class="row form-input-group">
                            <label style="text-align: left" class="col-lg-2">Email</label><input name="email" type="text" class="input-box col-lg-4">
                            <label style="text-align: center" class="col-lg-2">Password</label><input name="password" type="password" class="input-box col-lg-4">
                        </div>
                        <button type="submit" name="submit" class="form-button-one" style="border-color: #00cf7a; color: #00cf7a">Send registration Request</button>
                    </form>
                </div>
            </div> 
        </div>
    </body>
</html>