<?php

use App\Http\Controllers\ProfileController;
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




});
