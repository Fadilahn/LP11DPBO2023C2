<?php

// include("model/DB.php");
class PasienDB extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasien($data)
	{
		// Membaca data dari form
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tgl_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql tambah data pasien
		$query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp)
				VALUES ('$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function updatePasien($id, $data)
	{
		// Membaca data dari form
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tgl_lahir'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql ubah data pasien berdasarkan ID
		$query = "UPDATE pasien
				SET nik = '$nik', nama = '$nama', tempat = '$tempat', tl = '$tl', gender = '$gender', email = '$email', telp = '$telp'
				WHERE id = '$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql hapus data pasien berdasarkan ID
		$query = "DELETE FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}
}
 