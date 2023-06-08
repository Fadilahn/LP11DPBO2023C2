<?php

interface KontrakPasienView{
	public function tampil();
	public function delete($id);
}

interface KontrakPasienViewForm{
	public function tampil();
	public function add($data);
	public function update($id, $data);
}

interface KontrakPasienPresenter{
	public function prosesDataPasien();
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
	function addPasien($pasien);
    function updatePasien($index, $pasien);
    function deletePasien($index);
}

