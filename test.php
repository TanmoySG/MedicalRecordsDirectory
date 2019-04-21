<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Upload your files</title>
    </head>
    <body>
        <form enctype="multipart/form-data" action="test.php" method="POST">
            <p>Upload your file</p>
            <input type="file" name="uploaded_file"><br />
            <input type="submit" value="Upload">
        </form>
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
        echo $path;
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