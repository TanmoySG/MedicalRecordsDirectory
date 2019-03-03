<?php

/* 
 * Universal Copier
 * Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
 */

  try {
  $pdo = new PDO('mysql:host=localhost;dbname=medical_records_directory', 'root', '');
  } catch (PDOException $e) {
  exit('Database Error');
  } 
?>



