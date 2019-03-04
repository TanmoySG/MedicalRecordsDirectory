<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Approval List</title>
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
        <div style="padding-right: 5%; padding-left: 5%;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box" style="padding-right: 2%; padding-left: 2%;">
                    <h1 style="font-size: 40px;  font-family: 'Varela Round'; ">REGISTRATION REQUEST LIST</h1>
                    <hr>
                    <br>
                    <?php
                    include 'connection.php';

                    //error_reporting(error_reporting() & ~E_NOTICE);
                    $rows = array();
                    $query = $pdo->prepare("SELECT * FROM user_reg_req WHERE verification_status = 'PENDING'");
                    $query->execute();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        $rows[] = $row;
                    }
                    foreach ($rows as $row) {
                        ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span style="font-size: 25px; color: #1e78ff"><?php echo $row['name']; ?></span><br><br>
                                <div class="row">
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">DOB: <?php echo $row['dob']; ?> </span>
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">GENDER: <?php echo $row['gender']; ?> </span>
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">EMAIL: <?php echo $row['email']; ?> </span>
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">PHONE: <?php echo $row['phone']; ?> </span>
                                </div>
                                <br>
                                <div class="row">
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">ADDRESS: <?php echo $row['residence']; ?> </span>
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">CITY: <?php echo $row['city']; ?> </span>
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">STATE: <?php echo $row['state']; ?> </span>
                                    <span class="col-lg-3 col-md-3 col-sm-12 col-xs-12">COUNTRY: <?php echo $row['country']; ?> </span>
                                </div>
                                <br>
                                <div class="row">
                                    <span class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> UID TYPE: <?php echo $row['uid_type']; ?></span>
                                    <span class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> UID NUMBER: <?php echo $row['uid_no']; ?></span>
                                </div>
                                <br>
                                <a href="registrationApproval.php?sl=<?php echo $row['sl']; ?>">Go to Request</a>
                                <hr>
                                <br>
                            </div> 
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>
