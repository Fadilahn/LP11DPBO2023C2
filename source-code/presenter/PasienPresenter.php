<?php

include("presenter/KontrakPasienPresenter.php");
include("model/pasien/PasienDB.php");
include("model/pasien/Pasien.php");
include("constant.php");

class PasienPresenter implements KontrakPasienPresenter
{
    private $tabelpasien;
    private $data = [];

    function __construct()
    {
        // Konstruktor
        try {
            $this->tabelpasien = new PasienDB(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name); // Instansi TabelPasien
            $this->data = array(); // Instansi list untuk data Pasien
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function prosesDataPasien()
    {
        try {
            // Mengambil data dari tabel pasien
            $this->tabelpasien->open();
            $this->tabelpasien->getPasien();
            while ($row = $this->tabelpasien->getResult()) {
                // Ambil hasil query
                $pasien = new Pasien(); // Instansiasi objek pasien untuk setiap data pasien
                $pasien->setId($row['id']); // Mengisi id
                $pasien->setNik($row['nik']); // Mengisi nik
                $pasien->setNama($row['nama']); // Mengisi nama
                $pasien->setTempat($row['tempat']); // Mengisi tempat
                $pasien->setTl($row['tl']); // Mengisi tl
                $pasien->setGender($row['gender']); // Mengisi gender
                $pasien->setEmail($row['email']); // Mengisi email
                $pasien->setTelp($row['telp']); // Mengisi telp

                $this->data[] = $pasien; // Tambahkan data pasien ke dalam list
            }
            // Tutup koneksi
            $this->tabelpasien->close();
        } catch (Exception $e) {
            // Memproses error
            echo "Error: " . $e->getMessage();
        }
    }

    function getId($i)
    {
        // Mengembalikan id Pasien dengan indeks ke i
        return $this->data[$i]->getId();
    }

    function getNik($i)
    {
        // Mengembalikan nik Pasien dengan indeks ke i
        return $this->data[$i]->getNik();
    }

    function getNama($i)
    {
        // Mengembalikan nama Pasien dengan indeks ke i
        return $this->data[$i]->getNama();
    }

    function getTempat($i)
    {
        // Mengembalikan tempat Pasien dengan indeks ke i
        return $this->data[$i]->getTempat();
    }

    function getTl($i)
    {
        // Mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
        return $this->data[$i]->getTl();
    }

    function getGender($i)
    {
        // Mengembalikan gender Pasien dengan indeks ke i
        return $this->data[$i]->getGender();
    }
	
    function getEmail($i)
    {
        // Mengembalikan Email Pasien dengan indeks ke i
        return $this->data[$i]->getEmail();
    }

	function getTelp($i)
    {
        // Mengembalikan Telp Pasien dengan indeks ke i
        return $this->data[$i]->getTelp();
    }

    function getSize()
    {
        return sizeof($this->data);
    }

    // Implementasi operasi CRUD

    function addPasien($pasien)
    {
        try {
            // Panggil method di TabelPasien untuk menambahkan pasien ke database
            $this->tabelpasien->open();
            $this->tabelpasien->addPasien($pasien);
            $this->tabelpasien->close();

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function updatePasien($index, $pasien)
    {
        try {
            // Panggil method di TabelPasien untuk memperbarui data pasien di database
            $this->tabelpasien->open();
            $this->tabelpasien->updatePasien($index, $pasien);
            $this->tabelpasien->close();

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function deletePasien($id)
    {
        try {
            // Panggil method di TabelPasien untuk menghapus data pasien dari database
            $this->tabelpasien->open();
            $this->tabelpasien->deletePasien($id);
            $this->tabelpasien->close();
            
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

