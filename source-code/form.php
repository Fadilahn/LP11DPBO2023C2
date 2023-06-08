<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.php");
include_once("model/DB.php");
include_once("presenter/PasienPresenter.php");
include_once("view/pasien/PasienViewForm.php");

$tp = new PasienViewForm();

if (isset($_POST['add'])) {
    $tp->add($_POST);
    echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
}
else if (isset($_POST['update'])) {
    $tp->update($_POST['id'], $_POST);
    echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
        </script>";
}

if (!isset($_GET['id'])) {
    $data = $tp->tampil();
} 
else if (isset($_GET['id'])) {
    $data = $tp->tampil($_GET['id']);
}