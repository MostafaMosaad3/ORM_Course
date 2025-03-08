<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\AdminFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    /**
     * make the model use uuid
     */
//    use HasUuids ;
//    use HasUlids ;
    use HasApiTokens, HasFactory, Notifiable;



//    /**
//     * Generate a new UUID for the model.
//     */
//    public function newUniqueId(): string
//    {
//        return (string) Uuid::uuid4();
//    }

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
//    public function uniqueIds(): array
//    {
//        return ['id', 'is_admin'];
//    }


    /**
     * here we make the user model use another factory
     */
    protected static function newFactory()
    {
        return AdminFactory::new();
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * disable the timestamps
     */
//    public $timestamps = false;


    /**
     * customize the timestamps columns name
     */

//    const CREATED_AT = 'created';
//    const UPDATED_AT = 'updated';


    /**
     * default attribute value
     */

    protected $attributes = [
        'is_admin' => 100 ,
    ] ;



}

