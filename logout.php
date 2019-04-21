<?php

/* 
 * Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
 */

session_start();

session_destroy();

header('location: userLogin.php');