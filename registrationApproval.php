<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Approval</title>
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
                    <h1 style="font-size: 40px;  font-family: 'Varela Round'; ">APPROVAL</h1>
                    <hr>
                    <br>
                    <?php
                    include 'connection.php';

                    //error_reporting(error_reporting() & ~E_NOTICE);

                    if (isset($_GET['sl'])) {
                        $member_id = $_GET['sl'];
                        $rows = array();
                        $query = $pdo->prepare("SELECT * FROM user_reg_req WHERE sl = '$member_id'");
                        $query->execute();
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            $rows[] = $row;
                        }
                        foreach ($rows as $row) {

                            if (isset($_POST['submit'])) {
                                if ($_POST['verification_status'] === 'VERIFIED') {
                                    $sql = "UPDATE `user_reg_req` SET  `verification_status` = 'VERIFIED' WHERE sl=  '" . $member_id . "'";
                                    $pdo->exec($sql);
                                    echo 'Registration Request ACCEPTED after UID Verification';
                                } else if ($_POST['verification_status'] === 'REJECTED') {
                                    echo 'Registration Request DENAIED as the UID was found to be faulty.';
                                    $sql3 = "UPDATE `user_reg_req` SET  `verification_status` = 'REJECTED' WHERE sl=  '" . $member_id . "' ";
                                    $pdo->exec($sql3);
                                } else {
                                    echo 'Registration Request PENDING';
                                    $sql4 = "UPDATE `user_reg_req` SET  `verification_status` = 'PENDING' WHERE sl=  '" . $member_id . "' ";
                                    $pdo->exec($sql4);
                                }
                            }
                            ?>
                            <form action="registrationApproval.php?sl=<?php echo $row['sl']; ?>" method="POST">
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
                                        <br>
                                        <div class="row">
                                            <label class="col-lg-4 col-md-4 col-sm-12 col-xs-12">MEDICAL LEGACY NUMBER: </label>
                                            <input type="text" name="mln" class="input-box col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <center>
                                                    <button type="button" name="generate" class="form-button-one">Generate MLN</button>
                                                </center>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">VERIFICATION STATUS:</label>
                                            <select name="verification_status" class="input-box col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <option value="VERIFIED" style="color: #00cf7a; font-family: 'Valera Round' ;">VERIFIED</option>
                                                <option value="REJECTED" style="color: #ff0043; font-family: 'Valera Round' ;">REJECTED</option>
                                                <option value="PENDING" style="color: #3b00ff; font-family: 'Valera Round' ;">PENDING</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="row" >
                                            <button type="submit" name="submit" class="form-button-one" style="border-color: #00cf7a; color: #00cf7a"> Submit </button>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                    </div> 
                                </div>
                            </form>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
