<?php

session_start();

include "../../database/koneksi.php";
$hasil = '';
$output='';

// $username = $_SESSION['username'];
$temanObrolan = $_POST['temanObrolan'];
$username = $_SESSION['id'];


$output = '';
$hasil = array();

// Mencari Data teman obrolan
$cari = "SELECT * FROM user WHERE user = '$temanObrolan'";
$dapat = mysqli_query($conn, $cari);
$data = mysqli_fetch_array($dapat);
$gambarTemanObrolan = $data['gambar'];

// Mencari Data histori obrolan
$sql = "SELECT * FROM chat WHERE 
        (pengirim = '$username' AND penerima = '$temanObrolan') 
        OR 
        (pengirim = '$temanObrolan' AND penerima = '$username')
        ORDER BY id ASC";

$query = mysqli_query($conn, $sql);

while ( $data = mysqli_fetch_array($query) ){

        $id = $data['id'];
        $penerima = $data['penerima'];
        $pengirim = $data['pengirim'];
        $chat = $data['chat'];
        $chatTime = $data['chatTime'];
        $gambarTemanObrolan = $gambarTemanObrolan;
        // $temanObrolan = $temanObrolan;


if($pengirim == $temanObrolan){
    $output.= '<div class="incoming_msg">
        <div class="incoming_msg_img"> <img src="'.$gambarTemanObrolan.'" alt="sunil"> </div>
        <div class="received_msg">
            <div class="received_withd_msg">
                <p>'.$chat.'</p>
                <span class="time_date">'.$chatTime.'</span>
            </div>
        </div>
    </div>';

    } else if ($pengirim == $username) {
   
   $output.= '<div class="outgoing_msg">
        <div class="sent_msg">
        <p>'.$chat.'</p>
            <span class="time_date">'.$chatTime.'</span>
        </div>
    </div>';

} 
}
echo $output;
mysqli_free_result($query);      
mysqli_close($conn);
