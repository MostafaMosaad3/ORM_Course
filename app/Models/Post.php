<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    use HasFactory , massPrunable;

    protected $table = 'posts';

    protected $guarded = [] ;


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Author',
        ]);
    }
    public function prunable() :builder {
        return static::where('created_at', '<=', now()->subMonth());
    }

    protected function pruning()
    {
        Log::info('this is pruning post' . $this->id);
    }

    public function image(){
        return $this->morphOne(Image::class , 'imageable');
    }


    public function comments(){
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function latestComment(){
        return $this->morphOne(Comment::class , 'commentable')->latestOfMany();
    }


    public function tags(){
        return $this->morphToMany(Tag::class , 'taggable');
    }


}
