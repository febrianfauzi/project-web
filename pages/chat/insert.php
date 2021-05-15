<?php
session_start();
$pengirim = $_SESSION['id'];

include "../../database/koneksi.php";

// if( isset($_POST['message']) ){
  
  $message = $_POST['pesan'];
  $penerima = $_POST['temanObrolan'];
  
  $sql = "INSERT INTO chat (pengirim, penerima, chat, file) VALUES ('$pengirim', '$penerima', '$message', '') ";

  if (mysqli_query($conn, $sql) === TRUE){
      $output = 1;
  }else{
      $output = 0;
  }
  echo $output;

// }
?>