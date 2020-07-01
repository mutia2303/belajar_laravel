<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable =['user_id', 'nama', 'telepon', 'alamat', 'avatar'];

    public function getAvatar()
    {
    	if(!$this->avatar) {
    	    return asset('images_guru/default.jpg');
        }

        return asset('images_guru/'.$this->avatar);
    }

    public function mapel()
    {
    	return $this->hasMany(Mapel::class);
    }
}
