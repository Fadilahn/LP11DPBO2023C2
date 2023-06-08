<?php

interface KontrakPasienViewForm{
	public function tampil();
	public function add($data);
	public function update($id, $data);
}