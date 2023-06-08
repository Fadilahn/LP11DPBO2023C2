<?php


// include("templates/skin.html");
include("view/pasien/KontrakPasienView.php");

class PasienView implements KontrakPasienView
{
    private $prosespasien; // presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        // konstruktor
        $this->prosespasien = new PasienPresenter();
    }

    function tampil()
    {
        $this->prosespasien->prosesDataPasien();
        $data = null;

        // Semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
            $no = $i + 1;
            $data .= 
			"<tr>
				<td>" . $no . "</td>
				<td>" . $this->prosespasien->getNik($i) . "</td>
				<td>" . $this->prosespasien->getNama($i) . "</td>
				<td>" . $this->prosespasien->getTempat($i) . "</td>
				<td>" . $this->prosespasien->getTl($i) . "</td>
				<td>" . $this->prosespasien->getGender($i) . "</td>
				<td>" . $this->prosespasien->getEmail($i) . "</td>
				<td>" . $this->prosespasien->getTelp($i) . "</td>
				<td>
					<a href='form.php?id=" . $i . "'><button class='btn btn-warning'>Edit</button></a>
					<a href='index.php?id=" . $this->prosespasien->getId($i) . "'><button class='btn btn-danger'>Delete</button></a>
				</td>
            </tr>";
        }
        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function delete($id){
        $this->prosespasien->deletePasien($id);
    }
}

?>
