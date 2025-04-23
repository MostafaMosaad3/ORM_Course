<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    use HasFactory;
    protected $table = 'serials';

    protected $primaryKey = 'serial_id';
    protected $guarded = [] ;


    public function phone(){
        return $this->belongsTo(Phone::class);
    }
}

