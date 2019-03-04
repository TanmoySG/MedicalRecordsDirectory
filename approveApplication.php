<?php

/*
 * Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
 */

include 'connection.php';

if (isset($_POST['submit'])) {
    if ($_POST['verification_status'] === 'VERIFIED') {
        $sql1 = "INSERT INTO `users`(`mln`,`name`, `dob`, `gender`, `city`, `state`, `country`, `residence`, `uid_type`, `uid_no`, `phone`, `email`) VALUES "
                . "('" . $_POST['mln'] . "','" . $row['name'] . "', '" . $row['dob'] . "', '" . $row['gender'] . "', '" . $row['city'] . "', '" . $row['state'] . "',"
                . " '" . $row['country'] . "', '" . $row['residence'] . "'"
                . ", '" . $row['uid_type'] . "', '" . $row['uid_no'] . "', '" . $row['phone'] . "',"
                . " '" . $row['email'] . "')";
        $sql2 = "UPDATE `user_reg_req` SET  `verification_status` = 'VERIFIED' ";
        $pdo->exec($sql1);
        $pdo->exec($sql2);
        echo 'Registration Request ACCEPTED after UID Verification';
    } else if ($_POST['verification_status'] === 'REJECTED') {
        echo 'Registration Request DENAIED as the UID was found to be faulty.';
        $sql3 = "UPDATE `user_reg_req` SET  `verification_status` = 'REJECTED' WHERE sl=  '" . $row['sl'] . "' ";
        $pdo->exec($sql3);
    } else {
        echo 'Registration Request PENDING';
        $sql4 = "UPDATE `user_reg_req` SET  `verification_status` = 'PENDING' WHERE sl=  '" . $row['sl'] . "' ";
        $pdo->exec($sql4);
    }
}