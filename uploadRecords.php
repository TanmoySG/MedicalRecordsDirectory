<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload Reports</title>
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
        <div class="col-lg-offset-1 col-lg-10 box" style="vertical-align: middle; padding: 20px">
            <form enctype="multipart/form-data" class="content-section" action="uploadRecords.php" method="POST">
                <h1 style="font-size: 50px; "><i class="fas fa-file-medical"></i> Upload Reports</h1>
                <input type="file" name="uploaded_file"><br />
                <input type="submit" value="Upload" class="form-button-one" style="border-color: #00cf7a; color: #00cf7a">
            </form>
        </div>
    </body>
</html>
<?PHP
include 'connection.php';
session_start();
if (isset($_SESSION['logged_in'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email ='$email'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $mln = $row['mln'];

    if (!empty($_FILES['uploaded_file'])) {
        $path = $mln . "/";

        $path = $path . basename($_FILES['uploaded_file']['name']);
        if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
            echo "The file " . basename($_FILES['uploaded_file']['name']) .
            " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }
}
?>
