<?php

include("view/pasien/KontrakPasienViewForm.php");

class PasienViewForm implements KontrakPasienViewForm
{
    private $prosespasien; // presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        // konstruktor
        $this->prosespasien = new PasienPresenter();
    }

    function tampil($index = -1)
    { 
        $id = '';
        $nik = '';
		$nama = '';
		$tempat = '';
		$tl = '';
		$gender = '';
		$email = '';
		$telp = '';

        $process = "add";
        $title = "Tambah";
        
        if($index >= 0){
            $this->prosespasien->prosesDataPasien();

            $id = $this->prosespasien->getId($index);
            $nik = $this->prosespasien->getNik($index);
            $nama = $this->prosespasien->getNama($index);
            $tempat = $this->prosespasien->getTempat($index);
            $tl = $this->prosespasien->getTl($index);
            $gender = $this->prosespasien->getGender($index);
            $email = $this->prosespasien->getEmail($index);
            $telp = $this->prosespasien->getTelp($index);
            
            $process = "update";
            $title = "Ubah";
        }
        
        $data = "
            <div class='form-group'>
                <label for='nik'>NIK</label>
                <input type='text' class='form-control' id='nik' name='nik' value='$nik' required />
            </div>
            <div class='form-group'>
                <label for='nama'>Nama</label>
                <input type='text' class='form-control' id='nama' name='nama' value='$nama' required />
            </div>
            <div class='form-group'>
                <label for='tempat'>Tempat</label>
                <input type='text' class='form-control' id='tempat' name='tempat' value='$tempat' required />
            </div>
            <div class='form-group'>
                <label for='tgl_lahir'>Tanggal Lahir</label>
                <input type='date' class='form-control' id='tgl_lahir' name='tgl_lahir' value='$tl' required />
            </div>
            <div class='form-group'>
                <label for='gender'>Gender</label>
                <select class='form-control' id='gender' name='gender' required>
                    <option value='Laki-laki' " . ($gender == 'Laki-laki' ? 'selected' : '') . ">Laki-laki</option>
                    <option value='Perempuan' " . ($gender == 'Perempuan' ? 'selected' : '') . ">Perempuan</option>
                </select>
            </div>
            <div class='form-group'>
                <label for='email'>Email</label>
                <input type='email' class='form-control' id='email' name='email' value='$email' required />
            </div>
            <div class='form-group'>
                <label for='Telp'>Telp</label>
                <input type='tel' class='form-control' id='Telp' name='telp' value='$telp' required />
            </div>
                
            <input type='text' class='form-control' id='id' name='id' value='$id' hidden />
            <button type='submit' class='btn btn-primary' name='$process'>$title</button>
        ";

        // Membaca template skin.html
        $this->tpl = new Template("templates/form.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_FORM", $data);
        $this->tpl->replace("TITLE", $title);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function add($data){
        $this->prosespasien->addPasien($data);
    }
    
    function update($id, $data){
        $this->prosespasien->updatePasien($id, $data);
    }
}

?>
