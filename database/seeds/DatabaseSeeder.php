<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
//        $this->call('UsersTableSeeder');
    }

}

class UsersTableSeeder extends Seeder{

    public function run()
    {

        DB::table('users')->delete();
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");

            \App\User::create([
            'name' => 'Kawsar Ahmed',
            'email' => 'kawsar@log.com',
            'password' => bcrypt('111111'),

        ]);
    }
}
