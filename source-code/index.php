<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.php");
include_once("model/DB.php");
// include_once("model/pasien/Pasien.php");
// include_once("model/pasien/PasienDB.php");
include_once("presenter/PasienPresenter.php");
include_once("view/pasien/PasienView.php");

$tp = new PasienView();

if(isset($_GET['id'])){
    $tp->delete($_GET['id']);
}

$data = $tp->tampil();