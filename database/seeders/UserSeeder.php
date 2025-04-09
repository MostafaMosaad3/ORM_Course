<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->count(10)->create();

        /**
         * override attribute can be used through passing array to make , create function
         * or using the state itself
         */
//        UserFactory::new()->adminAccount()->count(2)->create(['name' => 'admin']);
//        UserFactory::new()->adminAccount()->count(2)->make(['name' => 'admin']);
//        UserFactory::new()->adminAccount()->count(2)->state(['name' => 'admin'])->create();


        /**
         * factory sequence can be used through state and passing new sequence
         * or using the sequence direct
         */

//        UserFactory::new()->adminAccount()->count(2)->state(new sequence(
//            ['is_admin' => 2],
//            ['is_admin' => 3]
//        ))->create();
//
//        UserFactory::new()->adminAccount()->count(2)->sequence(
//            ['is_admin' => 2],
//            ['is_admin' => 3]
//        )->create();
//

        /**
         * disable the timestamps for specific row
         */
//        $user = User::withoutTimestamps(function() {
//            User::create([
//
//            ]);
//        });



    }
}
