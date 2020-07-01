<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable =['user_id', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar'];

    public function getAvatar()
    {
    	if(!$this->avatar) {
    	    return asset('images_siswa/default.jpg');
        }

        return asset('images_siswa/'.$this->avatar);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimestamps();
    }

    public function total()
    {
        $total = 0;
        // $hitung = 0;
        foreach ($this->mapel as $mapel) {
            $total += $mapel->pivot->nilai;
            // $hitung++;

        }
        return $total;
    }

    public function rata_rata()
    {
        $total = 0;
        $hitung = 0;
        $rata = 0;
        if ($this->mapel->isNotEmpty()) {
            foreach ($this->mapel as $mapel) {
                $total += $mapel->pivot->nilai;
                $hitung = $mapel->count();
            }
            $rata = round($total / $hitung, 2);
        } 
        else {
            $rata = 0;
        }
        return $rata;
    }

    public function nama_lengkap()
    {
        if ($this->nama_belakang == '-') {
            $nama_lengkap = $this->nama_depan;
        }
        else {
            $nama_lengkap = $this->nama_depan.' '.$this->nama_belakang;
        }
        return $nama_lengkap;
    }
}
