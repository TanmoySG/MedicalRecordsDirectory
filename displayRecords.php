<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<?php
include 'connection.php';
session_start();
if (isset($_SESSION['logged_in'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email ='$email'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $mln = $row['mln'];
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Medical Records</title>
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
                            <a href="userHome.php" style="color:#252525"><i class="fas fa-home"></i></a>  
                            <a href="logout.php" style="color:#252525"><i class="fas fa-sign-out-alt" ></i></a>
                        </span> 
                    </center>
                </div>
            </div>
            <div class="content-section" style="font-family:'Varela Round' ">
                <?php
                include 'connection.php';

                //error_reporting(error_reporting() & ~E_NOTICE);
                $query = "SELECT * FROM $mln ";
                $result = mysqli_query($db, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                }
                foreach ($rows as $row) {
                    ?>
                    <div class="box col-lg-offset-1 col-lg-10" style="padding: 50px">
                        <div class="row">
                            <div class="col-lg-3">
                                <div>
                                    <span style="font-size: 25px; color: #1e78ff">Date of Diagnosis</span>
                                    <p> <?php echo $row['date']; ?></p>  
                                </div>
                                <div>
                                    <span style="font-size: 25px; color: #1e78ff">Expert Consulted</span>
                                    <p> <?php echo $row['dr']; ?></p>  
                                </div>
                            </div>   
                            <div class="col-lg-9">
                                <div>
                                    <span style="font-size: 25px; color: #1e78ff">Symptoms</span>
                                    <p> <?php echo $row['symptoms']; ?></p>   
                                </div>
                                <div>
                                    <span style="font-size: 25px; color: #1e78ff">Diagnosis</span>
                                    <p> <?php echo $row['diagnosis']; ?></p>   
                                </div>
                                <div>
                                    <span style="font-size: 25px; color: #1e78ff">Treatment Procedure</span>
                                    <p> <?php echo $row['trtmnt']; ?></p>   
                                </div>
                                <div>
                                    <span style="font-size: 25px; color: #1e78ff">Prescribed Medication</span>
                                    <p> <?php echo $row['medicines']; ?></p>   
                                </div>
                            </div> 
                        </div>                
                    </div> 
                <?php } ?>
            </div>
        </body>
    </html>
    <?php
}?>