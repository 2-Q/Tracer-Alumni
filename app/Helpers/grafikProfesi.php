<?php
use App\Models\Profession;

function countProfesi($jurusan,$tahun)
{
	if ($jurusan=='semua') {
        $kuliah=Profession::where([
        	['profession', '=', 'Melanjutkan Belajar'],
        	['lastUpdate', '=', $tahun]
        ])->withTrashed()->count();

        $bekerja=Profession::where([
        	['profession', '=', 'Bekerja'],
        	['lastUpdate', '=', $tahun]
        ])->withTrashed()->count();
        $wirausaha=Profession::where([
        	['profession', '=', 'Menjadi Wirausaha'],
        	['lastUpdate', '=', $tahun]
        ])->withTrashed()->count();
        $profession=[$bekerja,$kuliah,$wirausaha];
    }else{
        $kuliah=Profession::where([
        	['profession', '=', 'Melanjutkan Belajar'],
        	['lastUpdate', '=', $tahun],
        	['jurusan', '=', $jurusan]
        ])->withTrashed()->count();

        $bekerja=Profession::where([
        	['profession', '=', 'Bekerja'],
        	['lastUpdate', '=', $tahun],
        	['jurusan', '=', $jurusan]
        ])->withTrashed()->count();
        $wirausaha=Profession::where([
        	['profession', '=', 'Menjadi Wirausaha'],
        	['lastUpdate', '=', $tahun],
        	['jurusan', '=', $jurusan]
        ])->withTrashed()->count();
        $profession=[$bekerja,$kuliah,$wirausaha];
    }
    return $profession;
}


 ?>