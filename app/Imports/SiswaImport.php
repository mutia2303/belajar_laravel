<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use App\Siswa;
use App\User;

class SiswaImport implements ToCollection
{
	public $user_id;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
        	if ($key >= 1) {
        		$user = User::create([ 
        			'role' => 'siswa',
        			'name' => $row[1],
        			'email' => $row[6],
        			'password' => bcrypt('rahasia'),
        			'remember_token' => Str::random(60),
        		]);
        		$user->save();
         		
         		// $tanggal_lahir = ($row[6] - 25569) * 86400;

        		Siswa::create([

	        		'user_id' => $this->user_id = $user->id,
	        		'nama_depan' => $row[1],
	        		'nama_belakang' => $row[2],
	        		'jenis_kelamin' => $row[3],
	        		'agama' => $row[4],
	        		'alamat' => $row[5],
	        		// 'tgl_lahir' => gmdate('Y-m-d', $tgl_lahir),
	        	]);
        	}
        }

    }
}
