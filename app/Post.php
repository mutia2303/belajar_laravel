<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;

    protected $fillable = ['user_id', 'title', 'content', 'slug', 'thumbnail'];
    protected $date = ['created_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

     public function thumbnail()
    {
    	// if(!$this->thumbnail) {
    	//     return asset('images_thumbnail/no-thumbnail.jpg');
     //    }
     //    return asset('images_thumbnail/'.$this->thumbnail);

        return !$this->thumbnail ? asset('images_thumbnail/no-thumbnail.jpg') : asset('images_thumbnail/'.$this->thumbnail);
    }
}
