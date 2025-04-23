<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\UserEvent;
use App\Models\Scopes\UserActiveScope;
use App\Observers\UserObserver;
use Database\Factories\AdminFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

//#[ScopedBy([UserActiveScope::class])]
#[ObservedBy(UserObserver::class)]
class User extends Authenticatable
{
    /**
     * make the model use uuid
     */
//    use HasUuids ;
//    use HasUlids ;
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes , Prunable ;

    public function prunable() :Builder
    {
        return static::where('wallet'  ,'<'  , 200) ;
    }

    public function pruning()
    {
        Log::info('this is the pruning user model' . $this->id);
    }


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
        'wallet',
        'wallet2' ,
        'is_admin'
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

//    protected $attributes = [
//        'is_admin' => 100 ,
//    ] ;



    public function scopeActive(Builder $query){
        $query->where([
            ['wallet' , '>' , 500] ,
            ['wallet2' , '>' , 500] ,
        ]) ;
    }


    public function scopeType(Builder $query , $type = 'user'){
        $is_admin = $type == 'user' ? 0 : 1;
        $query->where('is_admin' , $is_admin);
    }

    protected static function booted(){
//        static::addGlobalScope(new UserActiveScope);

//        static::addGlobalScope('active', function (Builder $builder) {
//            $builder->where([
//                ['wallet' , '>' , 500] ,
//                ['wallet2' , '>' , 500] ,
//            ]) ;
//        });

//        static::creating(function (User $user) {
//            Log::info('this is message from creating event' . $user->name) ;
//        });
    }
//
//    protected $dispatchesEvents = [
//        'creating' => UserEvent::class
//    ] ;

//    protected static function createQuietly(array $array){
//        $user = new static ( $array );
//        $user->password = Hash::make($array['password']);
//        $user->saveQuietly();
//    }

    public function phone(){
        return $this->hasOne(Phone::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function latestPost(){
        return $this->hasOne(Post::class)->latestOfMany('likes');
//        return $this->hasOne(Post::class)->ofMany('likes' , 'min');
//        return $this->posts()->one();

        // this way return collection
//        return $this->posts()->latest('likes')->take(1);
    }


    public function serial(){
//        return $this->hasOneThrough(Serial::class,phone::class);
//        return $this->through('phone')->has('serial');
        return $this->throughPhone()->hasSerial() ;
    }

    public function comments(){
//        return $this->hasManyThrough(Comment::class, Post::class);
//        return $this->through('posts')->has('comments');
        return $this->throughPosts()->hasComments() ;
    }
}

