<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $guarded = [] ;

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable')->withPivot('id');
    }

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable')->withPivot('id');
    }
}
