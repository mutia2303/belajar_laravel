<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function edit_nilai(Request $request, $id_siswa)
    {
    	$siswa = \App\Siswa::find($id_siswa);
    	$siswa->mapel()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
    }
}
