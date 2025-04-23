<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';
    protected $guarded = [] ;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function serial(){
        return $this->hasOne(Serial::class);
    }
}
