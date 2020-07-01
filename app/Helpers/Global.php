<?php

use App\Siswa;
use App\Guru;

function ranking_5_besar()
{
	$siswa = Siswa::all();
	$siswa->map(function($s) {
		$s->rata_rata = $s->rata_rata();
		return $s;
	});
	$siswa = $siswa->sortByDesc('rata_rata')->take(5);
	return $siswa;
}

function total_siswa()
{
	return Siswa::count();
}

function total_guru()
{
	return Guru::count();
}