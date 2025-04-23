<?php

use App\Http\Controllers\ProfileController;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Serial;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

//    // using the save method
//    $user = new User ;
//    $user->name = 'mosaad' ;
//    $user->email = 'mosaad@gmail.com' ;
//    $user->password = 'password' ;
//
//    $user->save();

    // the insert method
//    $user = User::insert([
//        'name' => "John Doe 1",
//        'email' => "john1@doe.com",
//        'password' => 'password'
//    ]);
//    $user = User::insertGetId([
//        'name' => "John Doe 1",
//        'email' => "john1@doe.com",
//        'password' => 'password'
//    ]);
//
//    dd($user);

    // UpdateOrCreate vs UpdateOrInsert
//    $user = User::updateOrCreate(['email' => 'admin@admin.com'] , [
//        'name' => 'admin updated',
//        'password' => 'password'
//    ]);

//    $user = User::updateOrInsert(['email' => 'admin@admin.com'] , [
//        'name' => 'admin 1',
//        'password' => 'password'
//    ]);

    //updateOrInsert for query builder as it is not working for the orm
//    $user = DB::table('users')->updateOrInsert(['email' => 'admin@admin.com'] , [
//        'name' => 'admin 2',
//        'password' => 'password'
//    ]);
//
//    dd($user);


    // firstOrCreate vs firstOrNew
    /*
     * firstOrCreate search for the condition it is true return the row else create it
     */
//    $user = User::firstOrCreate(['email' => 'admin1@admin.com'] , ['name' => 'admin', 'password' =>'password']);
//    dd($user);

    /*
     * firstOrNew is the same but it is not making the object in the db rather than catch it only
     */

//    $user = User::firstOrNew(['email' => 'admin2@admin.com'] , ['name'=> 'admin','password' => 'admin']);
//    dd($user);


    /*
     * internal attribute state
     */
    $user = User::find(1) ;
//    $state = $user->isClean() ;
//    $state = $user->isClean('name');
//    $state = $user->isDirty() ;
//    $user->name = 'ali' ;
//    $state = $user->isDirty();
//    $state = $user->getOriginal();
//    $user->name = 'ali' ;
//    $user->save();
//    $state = $user->wasChanged();
//    dd($state) ;


    /*
     * upsert function
     */

//    $users = [
//        ['name' => 'ali' , 'email' => 'ali@ali.com' , 'password' =>'update_password'] ,
//        ['name' => 'ali12' , 'email' => 'ali12@ali.com' , 'password' =>'password'] ,
//    ];
//
//    User::upsert($users,['email'] ,['password'] ) ;

    /*
     * retrieval
     */

    // all function
//    $users = User::all();
//    $users = User::all(['name as alias' , 'email']);
//    dd($users);

    /*
     * get function the difference between it and the all is get can but condition before it
     */
//    $users  = User::where('id' , 1 )->get();

    /*
     * select function
     */
//    $users = User::where('id', 1)->select('id', 'name');

    /*
     * find function
     */
//    $users = User::find([1 , 2]);
//    $users = User::findOr(20 , function (){
//        dd('user not found');
//    });

//    $user = User::findOrFail(20) ;
//    $users = User::find([1 , 2]);


    /*
     * first function is like the find
     */


    /*
     * pluck to return the data of specific column
     */
//    $users = User::pluck('id' , 'name')->toArray();

    /*
     * value function to return the value of attribute
     */

//    $email = User::where('id',1)->value('email');
//    dd($email);


    /*
     * aggregates function
     */

//    $users = User::count();
//    $users = User::where()->sum();
//    $users = User::where()->avg();
//    $users = User::where()->min();
//    $users = User::where()->max();
//
//    dd($users);


    /*
     * constraint with the where condition
     */

    // whereStrict that check for the type and the value , work with collections only not query
//    $user = User::get() ;
//    dd($user->whereStrict('id' , '1')) ;

    //whereBetween
//    $users = User::whereBetween('wallet' , [100 , 300])->get() ;
//    dd($users) ;

    //whereIn
//    $users = User::whereIn('id', [1,2,3])->get();
//    dd($users);

    // whereNull
//    $users = User::whereNull('wallet')->get();
//    dd($users);

    // firstWhere
//    $users = User::firstWhere('id', 3);
//    dd($users);

    // whereColumn
////    $users = User::whereWallet(730)->get();
//    $users  = User::whereColumn('wallet' , '>' , 'wallet2')->get() ;
//    dd($users);

    // whereAny , whereAll
//    $users = User::whereAll(['name' , 'email'] , 'like' , '%Mostafa%')->get();
//    $users = User::whereAny(['name' , 'email'] , 'like' , '%Mostafa%')->get();
//    dd($users);

    // when
    $is_admin = 100 ;
//    $users = User::when($is_admin > 50 ,
//        function ($query) { return $query->where('is_admin', 100); }  ,
//        function ($query) { return $query->where('is_admin', 0); })
//    ->get();
//    dd($users);

//    $users = User::whereNull('wallet')->get() ;
//    $users->whenEmpty( function() {
//        dump('there is no data') ; } ,
//        function () {
//        dump('there is data') ;
//        }
//    );
//

    /*
     * Ordering , Grouping the data
     */

//    $users = User::orderBy('id' , 'Desc')->pluck('id');
//    $users  = User::orderByRaw('Length(email) Desc')->pluck('email') ;
//    dd($users) ;

    // oldest , latest
//        $users = User::oldest('id')->pluck('id');
//        $users = User::latest('id')->pluck('id');


    //reOrder , inRandomOrder
//    $users = User::orderBy('created_at')->get();
//    $reorderedUsers = User::orderBy('created_at')->reorder('email', 'asc')->get('email') ;
//    dd($reorderedUsers) ;

    // groupBy , Limit , Take , Offset , Skip
//    $users = User::groupBy('is_admin')->get();
//    dd($users) ;


    /*
     * relational retrieving
     */
//    $users = User::with('posts')->get() ;
//    dd($users) ;


//    $users = User::has('posts' , '>' , 2)->get() ;
//    dd($users);

//    $user = User::whereHas('posts' , function($query) {
//        $query->where('likes' , '>' , 90);
//    })->get();
//    dd($user);

//    $user = User::withCount('posts as alias')->get() ;
//    dd($user) ;


    /*
     * advanced concepts
     */

//    $users = User::chunk(3 , function($users) {
//        dump($users) ;
//    });

//    $users = User::chunkById(3, function ($users) {
//        foreach ($users as $user) {
//            $user->update(['is_admin' => 1]);
//        }
//    });
//
//    dd($users);


//    $users = User::addSelect(['last_post' => Post::select('title')
//        ->whereColumn('user_id' , 'users.id')
//        ->orderByDesc('id')
//        ->take(1)])
//        ->get() ;
//    dd($users) ;


    /*
     * Delete Section
     */

//    $user = User::find(1)->delete() ;
//    dd($user) ; // the single delete return boolean value
//
//
//    $users = User::whereIn('id', [1,2,3])->delete();
//    dd($users) ; // when the mass delete return the number of deleted objects

//    // the destroy is static function
//    $user = User::destroy(5) ;
//    dd($user); // return the number of deleted object

//    $users = User::destroy([6 , 7 , 8]) ;
//    dd($users) ; // the mass delete in the destroy case return the number of deleted objects and the hooks is not applied

//    User::truncate() ;

//    User::destroy(1) ;

    /*
     * Soft Delete Options
     */
//
//    $user = User::onlyTrashed()->get() ;
//    dd($user);

//    $users = User::withTrashed()->get() ;
//    dd($users) ;
//
//    $user = User::onlyTrashed()->restore() ;
//    dd($user) ;
//
//    $user = User::find(1)->forceDelete();

//    $user = User::create([
//        'name' =>'test' ,
//        'email' =>'test@test.com',
//        'password' =>Hash::make('password') ,
//        'is_admin' => 0 ,
//        'wallet' => 100 ,
//        'wallet2' => 200
//    ]) ;
//
//    $admin = $user->replicate(['wallet'])->fill(['email'=>'test@admin.com'])->save() ;
//    dd($admin) ;


    /*
     * Query Scopes
     */


//    $users = User::active()->get();
//    $users = User::type('user')->pluck('is_admin' , 'name')->toArray();
//    dd($users) ;
//
//    $users = User::withoutGlobalScopes(['active'])->get() ;
//    dd($users) ;

    // mute events
//    $user = User::withoutEvents(function (){
//        User::create([
//            'name' =>'test' ,
//            'email' =>'test1234@test.com',
//            'password' =>Hash::make('password') ,
//            'is_admin' => 0 ,
//            'wallet' => 100 ,
//            'wallet2' => 200
//        ]) ;
//    });

//    $user = new User ;
//    $user->name = 'admin';
//    $user->email = 'admin0@gmail.com';
//    $user->password = Hash::make('12345678') ;
//    $user->saveQuietly() ;

    // make custom quietly function
//    User::createQuietly([
//        'name' =>'test' ,
//        'email' =>'test000@test.com',
//        'password' =>Hash::make('password') ,
//    ]) ;

//    $user = User::find(1) ;
//    dd($user->phone) ;
//

    /*
     * Retrieving Relation Rule
     */

    // dynamic property
//    $phone = Phone::find(1) ;
//    dd($phone->user->wallet);


    // query builder collection
//    $phone = Phone::find(1) ;
//    $sum = $phone->user()->sum(DB::raw('wallet + wallet2')) ;
//    dd($sum) ;



    // one to many relation
//    $post = Post::find(1) ;
//    dd($post->user->name);

    // belongs to function
//    $user = User::find(1) ;
//    $post = Post::whereBelongsTo($user)->get() ;
//    dd($post) ;

    /*
     * has one to many relation
     */

//    $user = User::find(1) ;
//    dd($user->latestPost) ;

    /*
     * has one through
     */
//
//    $user = User::find(1) ;
//    dd($user->phone->serial->serial_number);

//    dd($user->serial) ;

    /*
     * has many through
     */

//    $user = User::find(1) ;
//    foreach ($user->posts as $post) {
//        dd($post->comments->pluck('id')->toArray());
//    }

    $user = User::find(1) ;
    dd($user->comments->pluck('comment')->toArray());
});


