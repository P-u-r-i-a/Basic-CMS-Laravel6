<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
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

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return'slug';
    }

    /**
     * Many to many relationship between posts and categories
     *
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories() 
    {
        return $this->belongsToMany(Category::class);
    }

}
