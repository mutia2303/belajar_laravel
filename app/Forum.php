<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use Sluggable;

    protected $table = 'forum';
    protected $guarded = ['id'];
    // protected $fillable = ['user_id', 'judul', 'slug', 'konten'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function komentar()
    {
    	return $this->hasMany(Komentar::class);
    }
}
